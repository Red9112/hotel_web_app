<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Helpers\Helper;
use App\Models\Payment;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreTransactionRequest;

class TransactionController extends Controller
{
    private $reservation;
    public $helper;
 
  
    public function __construct(Transaction $reservation,Helper $helper)
    {
        $this->reservation = $reservation;
        $this->helper = $helper;
      
    }
   

    public function index(Request $request)
    {
        $activeTransactions=$this->reservation->getActiveTransaction($request);
        $transactionsExpireds=$this->reservation->getTransactionExpired($request); 
      //$transactions =Transaction::with('user', 'room', 'customer')->get();
     

        return view('Transaction.index',[
            'activeTransactions'=> $activeTransactions,
            'transactionsExpireds'=>$transactionsExpireds,
               ]);
     }
      
     public function chooseCustomer()
     {
  
      $customers = Customer::all();
         return view('Transaction.chooseCustomer',[
             'customers'=> $customers,
                ]);
      }

      public function createCustomer()
      {
  
          return view('Transaction.createCustomer', [
                 ]);
       }
       public function storeCustomer(StoreCustomerRequest  $request ){
    
        $customer=Customer::create([
            'name' => request('name'),
            'adress' => request('adress'),
            'cne'=> request('cne'),
            'num_passport'=> request('num_passport'),
            'gender'=> request('gender'),
            'user_id' => auth()->id(),
        ]);
        
       
        $request->session()->flash('status','a new Customer was created !!');
        return redirect()->route('transaction.availability',['customer' => $customer->id]);
      
    }

       public function availability(Customer $customer)
       {
      
           return view('Transaction.availability',['customer' => $customer]);
                  
        }

public function chooseRoom(StoreTransactionRequest $request,Customer $customer)
     { 
   
 $check_in=$request->check_in;
 $check_out=$request->check_out;
 $nbrPersonnes=$request->nbrPersonnes;
 $occupiedRoomsId= $this->reservation->getRoomsoccupiedId($check_in,$check_out);
 $rooms= $this->reservation->getAvailableRoomsId($nbrPersonnes,$occupiedRoomsId);
 $countRooms= $rooms->count();
 $helper=$this->helper;
 
         return view('Transaction.chooseRoom',[
             'rooms'=> $rooms,
             'countRooms'=> $countRooms,
             'check_in'=>$check_in,
             'check_out'=>$check_out,
             'nbrPersonnes'=>$nbrPersonnes,
             'helper'=>$helper,
             'customer'=>$customer,
                ]);
      } 


      public function confirmation(Customer $customer,Room $room,$check_in,$check_out) 
     {
        $totalPrice=$this->reservation->getTotalPrice($room->price,$check_in,$check_out);
        $minimumPayment=$this->reservation->getMinimumPayment($room->price,$check_in,$check_out);
        $helper=$this->helper;
         return view('Transaction.confirmation',[
            'room'=> $room,
            'customer'=>$customer,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'helper'=>$helper,
            'totalPrice'=>$totalPrice,
            'minimumPayment'=>$minimumPayment,
           
         ]);
         } 
        
 

         public function payDownPayment(Customer $customer, Room $room,Request $request,Transaction $transaction,Payment $payment)
         {
            
            $minimumPayment=$this->reservation->getMinimumPayment($room->price,$request->check_in,$request->check_out);
            $occupiedRoomId=$transaction->getRoomsoccupiedId($request->check_in,$request->check_out);
            $occupiedRoomIdInArray = $occupiedRoomId->toArray();
            if (in_array($room->id, $occupiedRoomIdInArray)) {
            $request->session()->flash('failed', 'Sorry, room ' . $room->number . ' already occupied !!');
             return redirect()->back();}
             $request->validate([
                'minimumPayment' => 'required|numeric|gte:' . $minimumPayment
                 ]);
           $transaction=$transaction->store($request,$customer,$room);
            $payment->store($request,$transaction);
             $request->session()->flash('status','a Reservation was created !!'.'Room ' . $room->number . ' has been reservated by ' . $customer->name);
           return redirect()->route('transaction.index');
          }
















}
