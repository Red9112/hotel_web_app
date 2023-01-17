<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Room;
use App\Helpers\Helper;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    
    public function index(Request $request)
    {
        $payments=Payment::orderBy('id','DESC');
        $customers=Customer::orderBy('id', 'ASC');
        if (!empty($request->search)) { 
      $customers = $customers->where('name', 'LIKE', '%' . $request->search . '%');
        } 
        $customers = $customers->get();
        $transactions=Transaction::orderBy('id','DESC');
        if (!empty($request->search)) { 
            $transactions = $transactions->whereIn('customer_id',$customers);
              } 
              $transactions = $transactions->get();
              if (!empty($request->search)) { 
                $payments = $payments->whereIn('transaction_id',$transactions);
                  } 
                  
              $payments = $payments->paginate(10);
        return view('Payment.index',[
            'payments'=>$payments,
               ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(Transaction $transaction)
    {
        $helper=new Helper();
       
        return view('Payment.create', compact('transaction','helper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Transaction $transaction, Request $request)
    {
        
        $dept=$transaction->getDeptnbr($transaction->room->price,$transaction->check_in,$transaction->check_out);
        $request->validate([
            'pay' => 'required|numeric|lte:' . $dept
        ]);
        $price=$request->pay;
        Payment::create([
            'user_id' => Auth()->user()->id,
            'transaction_id' => $transaction->id,
            'price' => $price, 
    
        $request->session()->flash('status','a Payment was created !!'.' for Room '. $transaction->room->number .',' . ' ' . $request->pay . 'DH   paid' );
        return redirect()->route('transaction.index');
    }
    
    
    public function invoice(Payment $payment)
    {
        $helper=new Helper;
        return view('Payment.invoice', [
            'payment'=>$payment,
            'helper'=>$helper, 
               ]);
    }

    public function pdf(Payment $payment)
    {
        $helper=new Helper;
        
        view()->share([
            'payment'=>$payment,
            'helper'=>$helper, 
          
        ]);
        
        $pdf = PDF::loadView('Payment.invoicepdf',compact('payment','helper')); 
        return $pdf->download('invoice.pdf');
    }
    
    
   
    
}
