<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Medication;
use Auth;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MedicDelivController extends Controller
{
    private $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
            ['label' => 'Buy Medicine', 'url' => 'user.medicdeliv'],
        ];
    }

    public function index()
    {
        $order = Order::with('medications')->findOrFail(28);
        $breadcrumbs = $this->breadcrumbs;

        $totalPrice = $order->medications->sum(function ($medication) {
            return $medication->quantity * $medication->price;
        });
        

        return view('pages.user.medicdeliv.index', compact('order', 'breadcrumbs', 'totalPrice'));
    }

    public function editAddress($id, Request $request)
    {
        try {
            $medication = Medication::findOrFail($id);
        
            $request->validate([
                'address' => 'required|string',
            ]);
            $data= $request->all();
    
            $medication->update([
                'address' => $data['address']
            ]);
    
            request()->session()->flash('success','Successfully edit medication delivery address');
            return redirect()->back();
        }catch (\Exception $e) {
            dd($e->getMessage());
            request()->session()->flash('error','An error occurred during editing medication delivery address :  ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
    
    public function upload($id)
    {
        $medication = Medication::findOrFail($id);
        // $breadcrumbs = array_merge($this->breadcrumbs, [
        //     ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        // ]);
        return view('pages.user.medicdeliv.upload', compact('medication'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function uploadPaymentProof($id, Request $request) {
        try {
            $this->validate($request,[
                'payment_proof' => 'required|file|mimes:png,jpeg,jpg|max:4096'
            ]);

            $userName = Auth::guard('user')->user()-> name;

            $proofFile = $request->file('payment_proof')->getRealPath();
            // Set the file name
            $proofFileName = 'MedicDeliv-' . $id . '_' . $userName . '_' . Carbon::now();
    
            $imageUrl = cloudinary()->upload($proofFile, [
                'public_id' => $proofFileName,
                'folder' => 'payment_proofs', 
            ])->getSecurePath();
            
            $medication = Medication::findOrFail($id);
    
            $medication->update([
                'payment_proof' => $imageUrl,
                'order_status' => 'Paid'
            ]);
            request()->session()->flash('success','Successfully upload the payment proof');
            return redirect()->route('user.medicdeliv.success', ['id' => $id]);
        }catch (\Exception $e) {
            dd($e->getMessage());
            request()->session()->flash('error','An error occurred during uploading the payment proof :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function success($id)
    {
        $medication = Medication::findOrFail($id);

        // $breadcrumbs = array_merge($this->breadcrumbs, [
        //     ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        //     ['label' => 'Payment Success', 'url' => 'user.medicdeliv.success'],
        // ]);
        return view('pages.user.medicdeliv.success', compact('medication'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function status($id)
    {
        $medication = Medication::findOrFail($id);
        // $breadcrumbs = array_merge($this->breadcrumbs, [
        //     ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        //     ['label' => 'Payment Success', 'url' => 'user.medicdeliv.success'],
        //     ['label' => 'Status Order', 'url' => 'user.medicdeliv.status'],
        // ]);
        return view('pages.user.medicdeliv.status', compact('medication'))->with('breadcrumbs', $this->breadcrumbs);
    }
}