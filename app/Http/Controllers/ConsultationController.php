<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;
use Carbon\Carbon;
use Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Order;


class ConsultationController extends Controller
{
    private $breadcrumbs;
    private $currentDateTime;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Consultation', 'url' => route('user.consultation')],
        ];
        $this->currentDateTime = Carbon::now();
    }
    public function index()
    {
        $now = $this->currentDateTime;
        
        $veterinariansRecommendation = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->where('veterinarians.is_accepted', true)
        ->groupBy('veterinarians.id')
        ->orderBy('service_schedules_count', 'desc')
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->orderBy('veterinarians.id', 'desc') // Order by veterinarian id descending
        ->limit(2) // Limit the result to 2 veterinarians
        ->get();
        
        $veterinariansBySpecialist = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->where('veterinarians.is_accepted', true)
        ->groupBy('veterinarians.id')
        ->orderBy('veterinarians.specialist')
        ->orderBy('service_schedules_count', 'desc') 
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->get()
        ->groupBy('specialist')
        ->map(function ($group) {
            return $group->take(3); // Limit to 3 veterinarians per specialist
        });


        return view('pages.user.consultation.index', compact('veterinariansRecommendation', 'veterinariansBySpecialist'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function getDoctorBySpecialist($specialist)
    {
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => $specialist, 'url' => route('user.consultation.specialist' , ['specialist' => $specialist])]));

        $now = $this->currentDateTime;

        $veterinarians = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->where('veterinarians.is_accepted', true)
        ->where('veterinarians.specialist', $specialist)
        ->groupBy('veterinarians.id')
        ->orderBy('service_schedules_count', 'desc') 
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->paginate(15);

        return view('pages.user.consultation.specialist', compact('veterinarians', 'specialist'))->with('breadcrumbs', $this->breadcrumbs);
    }
    private function prepareVeterinarianView($id, $viewName)
    {
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => 'Veterinarian Details', 'url' => route('user.consultation.veterinarian', ['id' => $id])]));

        $now = $this->currentDateTime;
        $veterinarians = Veterinarian::with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->where('veterinarians.is_accepted', true)
        ->where('id',$id)
        ->get();
        return view($viewName, compact('veterinarians'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function getVeterinarianDetails($id)
    {
        return $this->prepareVeterinarianView($id, 'pages.user.consultation.veterinarian');
    }

    public function getVeterinarianOrderDetails($id)
    {
        return $this->prepareVeterinarianView($id, 'pages.user.consultation.order');
    }

    private $orderId;
    public function createConsultationOrder(Request $request){
        try{
            $this->validate($request,[
                'payment_proof' => 'required|file|mimes:png,jpeg,jpg|max:4096'
            ]);
            
            $userName = Auth::guard('user')->user()-> name;
    
            $latestOrder = Order::latest()->first();
            if (!$latestOrder) {
                $orderId = 1;
            }else {
                $orderId = $latestOrder->id;
            }
            
            $proofFile = $request->file('payment_proof')->getRealPath();
            // Set the file name
            $proofFileName = 'Order-' . $orderId . '_' . $userName . '_' . $this->currentDateTime;
    
            $imageUrl = cloudinary()->upload($proofFile, [
                'public_id' => $proofFileName,
                'folder' => 'payment_proofs', 
            ])->getSecurePath();
    
            $veterinarian = Veterinarian::findOrFail($request->veterinarian_id);
            
            Order::create([
                'user_id' => Auth::guard('user')->user()-> id,
                'veterinarian_id' => $veterinarian->id,
                'cust_name' => $userName,
                'cust_phone_number' => Auth::guard('user')->user()-> phone_number,
                'veter_phone_number' => $veterinarian->phone_number,
                'payment_proof' => $imageUrl,
                'appointment_date' => $this->currentDateTime,
                'category' => $veterinarian->specialist,
                'service_category' => 'consultation',
                'order_status' => 'On going',
                'order_date' => $this->currentDateTime,
                'price' => $veterinarian -> consultation_price,
            ]);
            request()->session()->flash('success','Online Consultation Order created sucessfully!');
            return redirect()->back();
        }catch(\Exception $e) {
            request()->session()->flash('error','An error occurred during the payment :  ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
}
