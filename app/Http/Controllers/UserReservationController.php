<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use App\Models\ServiceSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OfflineConsultationController;

class UserReservationController extends Controller
{
    private $breadcrumbs;
    private $currentDateTime;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'reservation', 'url' => route('user.reservation')],
        ];
        $this->currentDateTime = Carbon::now();
    }
    public function index(Request $request)
    {
        
        // Ambil nilai specialist dari query string
        $selectedSpecialist = $request->query('specialist');
    
        // Ambil daftar veterinarians sesuai dengan spesialis yang dipilih
        if ($selectedSpecialist) {
            $veterinarians = Veterinarian::with('serviceSchedules')
                ->where('specialist', $selectedSpecialist)
                ->orderBy('name', 'asc') // Anda bisa mengganti 'name' dengan kolom lain sesuai kebutuhan
                ->get();
        } else {
            // Jika tidak ada spesialis yang dipilih, ambil semua daftar veterinarians
            $veterinarians = Veterinarian::with('serviceSchedules')
                ->orderBy('name', 'asc') // Anda bisa mengganti 'name' dengan kolom lain sesuai kebutuhan
                ->get();
        }
    
        // Kirimkan data daftar veterinarians dan spesialis yang dipilih ke view
        return view('pages.user.offlinereservation.index', [
            'veterinarians' => $veterinarians,
        ])->with('breadcrumbs', $this->breadcrumbs);
    }

    public function show_veterinarian_schedule(Request $request)
    {
        $veterinarian = Veterinarian::with('serviceSchedules')->find($request->id);
        return view('pages.user.offlinereservation.create-reservation', [
            'veterinarian' => $veterinarian
        ])->with('breadcrumbs', $this->breadcrumbs);
    }

    public function store(Request $request)
    {
        try {
            $payment_proof = $request->file('payment_proof')->store('payment-proof', 'public');

            $order = new Order;
            $order->user_id = Auth::guard('user')->id();
            $order->veterinarian_id = $request->veterinarian_id;
            $order->cust_name = $request->cust_name;
            $order->order_address = $request->order_address;
            $order->cust_phone_number = $request->cust_phone_number;
            $order->veter_phone_number = $request->veter_phone_number;
            $order->payment_proof = $payment_proof;
            $order->category = $request->category;
            $order->service_category = 'reservation';
            $order->order_status = 'On going';
            $order->price = $request->price;
            $order->schedule_id = $request->schedule_id;
            $order->save();

            // Perbarui status is_reserved pada jadwal
            $schedule = ServiceSchedule::find($request->schedule_id);
            $schedule->is_reserved = 1;
            $schedule->save();

            session()->flash('success', 'Offline Reservation Order created sucessfully!');
            return redirect()->route('confirm_offline_reservation', ['id' => $order->id]);
        } catch (\Throwable $e) {
            
            return back();
        }
    }

    public function confirm_order($id)
    {
            
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => 'confirm order', 'url' => route('confirm_offline_reservation', ['id' => $id])]));
            try {
                $order = Order::findOrFail($id);
                // dd($order);
                $order_status = $order->order_status;
                $order_id = $order->id;
                $order_date = $order->order_date;
                $customer_name = $order->cust_name;
    
                // Create the message
                $message = "Order ID = {$order_id}\nOrder Date = {$order_date}\nCustomer Name = {$customer_name}";
    
                // URL encode the message
                $encoded_message = urlencode($message);
    
                
    
                return view('pages.user.offlinereservation.confirm_order', [
                    'order' => $order,
                    
                ])->with('breadcrumbs', $this->breadcrumbs);
                


            }catch (ModelNotFoundException $e) {
                abort(404);
            }

        }
    
}
