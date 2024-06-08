<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use App\Models\Order;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VeterConsultationController extends Controller
{

    private $currentDateTime;
    public function __construct()
    {
        $this->currentDateTime = Carbon::now();
    }
    public function index(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->limit(3)
        ->get();

        $onGoingOrders = Order::where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', 'On going')
        ->where('service_category' , 'consultation')
        ->orderBy('order_date', 'asc')
        ->get();

        $latestOrders = Order::with('user')
        ->where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', '!=', 'On going')
        ->where('service_category' , 'consultation')
        ->orderBy('order_date', 'desc')
        ->limit(3)
        ->get();

        // dd($latestOrders);

        return view('pages.veterinarian.consultation.index', compact('serviceSchedules', 'onGoingOrders', 'latestOrders'));
    }

    public function showAllConsultationSchedules(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->paginate(15);

        return view('pages.veterinarian.consultation.schedule.index', compact('serviceSchedules'));
    }

    public function createSchedule(){
        return view('pages.veterinarian.consultation.schedule.create');
    }

    public function createScheduleSubmit(Request $request){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);
    
            $data= $request->all();
            
            ServiceSchedule::create([
                'veterinarian_id'=> Auth::guard('veterinarian')->user()->id,
                'schedule_start'=> $data['datetime-start'],
                'schedule_end'=> $data['datetime-end'],
                'service_category' => 'consultation',
            ]);
            request()->session()->flash('success','Successfully add new online consultation schedule');
            return redirect()->back();
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editServiceSchedule($id){
        try{
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            return view('pages.veterinarian.consultation.schedule.edit', compact('serviceSchedule'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function editServiceScheduleSubmit(Request $request, $id){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);

            $serviceSchedule = ServiceSchedule::findOrFail($id);
            $data= $request->all();

            $serviceSchedule->update([
                'schedule_start' => $data['datetime-start'],
                'schedule_end' => $data['datetime-end']
            ]);
            request()->session()->flash('success','Successfully edit online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during editing the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteServiceSchedule($id){
        try {
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            
            $serviceSchedule -> delete();
            request()->session()->flash('success','Successfully cancel online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during deleting the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editConsultationStatus(Request $request, $id) {
        try {
            // dd($request['status']);
            $this->validate($request, [
                'status'=>'string|required|in:On going,Complete,Cancel'
            ]);

            $consultationOrder = Order::findOrFail($id);
            $data= $request->all();

            $consultationOrder->update([
                'order_status' => $data['status']
            ]);

            $serviceSchedule = ServiceSchedule::findOrFail($consultationOrder->schedule_id);
            $serviceSchedule->update([
                'is_reserved' => false
            ]);

            request()->session()->flash('success','Successfully edit online consultation status');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during editing the status :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function getConsultationOrderDetails($id){
        try {
            $order = Order::with('user')->findOrFail($id);
            return view('pages.veterinarian.consultation.order.detail',compact('order'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Medication;
use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VeterConsultationController extends Controller
{

    private $currentDateTime;
    public function __construct()
    {
        $this->currentDateTime = Carbon::now();
    }
    public function index(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->limit(3)
        ->get();

        $onGoingOrders = Order::where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', 'On going')
        ->orderBy('order_date', 'asc')
        ->get();

        $latestOrders = Order::where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', '!=', 'On going')
        ->where('service_category' , 'consultation')
        ->orderBy('order_date', 'desc')
        ->limit(3)
        ->get();

        return view('pages.veterinarian.consultation.index', compact('serviceSchedules', 'onGoingOrders', 'latestOrders'));
    }

    public function showAllConsultationSchedules(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->paginate(15);

        return view('pages.veterinarian.consultation.schedule.index', compact('serviceSchedules'));
    }

    public function createSchedule(){
        return view('pages.veterinarian.consultation.schedule.create');
    }

    public function createScheduleSubmit(Request $request){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);
    
            $data= $request->all();
            
            ServiceSchedule::create([
                'veterinarian_id'=> Auth::guard('veterinarian')->user()->id,
                'schedule_start'=> $data['datetime-start'],
                'schedule_end'=> $data['datetime-end'],
                'service_category' => 'consultation',
            ]);
            request()->session()->flash('success','Successfully add new online consultation schedule');
            return redirect()->back();
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editServiceSchedule($id){
        try{
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            return view('pages.veterinarian.consultation.schedule.edit', compact('serviceSchedule'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function editServiceScheduleSubmit(Request $request, $id){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);

            $serviceSchedule = ServiceSchedule::findOrFail($id);
            $data= $request->all();

            $serviceSchedule->update([
                'schedule_start' => $data['datetime-start'],
                'schedule_end' => $data['datetime-end']
            ]);
            request()->session()->flash('success','Successfully edit online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during editing the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteServiceSchedule($id){
        try {
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            
            $serviceSchedule -> delete();
            request()->session()->flash('success','Successfully cancel online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during deleting the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editConsultationStatus(Request $request, $id) {
        try {
            // dd($request['status']);
            $this->validate($request, [
                'status'=>'string|required|in:On going,Complete,Cancel'
            ]);

            $consultationOrder = Order::findOrFail($id);
            $data= $request->all();

            $consultationOrder->update([
                'order_status' => $data['status']
            ]);

            $serviceSchedule = ServiceSchedule::findOrFail($consultationOrder->schedule_id);
            $serviceSchedule->update([
                'is_reserved' => false
            ]);

            request()->session()->flash('success','Successfully edit online consultation status');
            return redirect()->back();
        }catch (\Exception $e) {
            request()->session()->flash('error','An error occurred during editing the status :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function getConsultationOrderDetails($id){
        try {
            $order = Order::with('user')->findOrFail($id);
            $medicine = Medication::where('order_id', $order->id)->get();
            if ($medicine->contains('order_status', 'Complete')) {
                $order->medicine = "Complete";
            }
            return view('pages.veterinarian.consultation.order.detail',compact('order'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function createMedicine(string $id){
        $orderId = $id;
        return view('pages.veterinarian.consultation.medicine.create', compact('orderId'));
    }

    public function storeMedicine(Request $request){
        try{
            $order = Order::find($request->orderId);
            $user = User::find($order->user_id);
            
            for ($i = 1; $i <= $request->myNumber; $i++){
                $total = $request->input("quantity{$i}") * $request->input("price{$i}");
                $address = "";
                if($user->address){
                    $address = $user->address;
                }
                Medication::create([
                    'order_id' => $request->orderId,
                    "medicine" => $request->input("medicine{$i}"),
                    "quantity" => $request->input("quantity{$i}"),
                    "price" => $total,
                    "address" => $address,
                    "order_status" => "On going"
                    
                ]);
            }
            return redirect()->route('veterinarian.consultation.order.detail', ['id' => $request->orderId]);
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred during storing the medicine :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function detailMedicine(string $id){
        $medicine = Medication::where('order_id', $id)->get();
        $isComplete = false;
        if ($medicine->contains('order_status', 'Complete')) {
            $isComplete = true;
        }
        $orderId = $id;
        return view('pages.veterinarian.consultation.medicine.detail', compact('medicine', 'orderId', 'isComplete'));
    }

    public function editMedicine(string $id){
        $medicine = Medication::where('order_id', $id)->get();
        $orderId = $id;
        
        return view('pages.veterinarian.consultation.medicine.edit', compact('medicine', 'orderId'));
    }
    
    public function updateMedicine(Request $request){
        try{
            $medicine = Medication::where('order_id', $request->orderId)->get();
            foreach($medicine as $data){
                $data->update([
                    'medicine' =>  $request->input("medicine{$data->id}"),
                    'quantity' =>  $request->input("quantity{$data->id}"),
                    'price' =>  $request->input("price{$data->id}"),
                ]);
            }

            $order = Order::find($request->orderId);
            $user = User::find($order->user_id);
            
            for ($i = 1; $i <= $request->myNumber; $i++){
                $total = $request->input("newQuantity{$i}") * $request->input("newPrice{$i}");
                $address = "";
                if($user->address){
                    $address = $user->address;
                }
                Medication::create([
                    'order_id' => $request->orderId,
                    "medicine" => $request->input("newMedicine{$i}"),
                    "quantity" => $request->input("newQuantity{$i}"),
                    "price" => $total,
                    "address" => $address,
                    "order_status" => "On going"
                    
                ]);
            }

            return redirect()->route('veterinarian.consultation.medicine.detail', ['id' => $request->orderId])->with('success', "Berhasil update");
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred during storing the medicine :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroyMedicine(Request $request){
        try{
            Medication::where('order_id', $request->orderId)->delete();
            return redirect()->route('veterinarian.consultation.order.detail', ['id' => $request->orderId]);
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred during storing the medicine :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function sendMedicine(Request $request){
        try{

            $medicine = Medication::where('order_id', $request->orderId)->get();
            foreach($medicine as $data){
                $data->update([
                    "order_status" => "Complete"
                ]);
            }
            return redirect()->back()->with('success', "Berhasil Send");
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred during storing the medicine :  ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
