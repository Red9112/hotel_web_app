<?php

namespace App\Models;

use App\Models\Room;
use App\Helpers\Helper;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests\StoreTransactionRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Transaction extends Model
{
 
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'customer_id',
        'room_id',
        'check_in',
        'check_out',
     ];
   

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

   

    public function getCurrentdate(){
        return $now = now();
    }


    //singular or plural form of the string "day" in difference of days
public function getDaysForm(){
    $difference= new Helper;
    $dif=$difference->getDays($this->check_in,$this->check_out);
    $plural = Str::plural('Day',  $dif);
    $form=$dif." ".$plural;
    return $form;
 }
 

 public function getTotalPrice($roomPrice,$check_in,$check_out){
     $daysnumber= new Helper;
     $tempo=$daysnumber->getDays($check_in,$check_out);
     $totalPrice=  $tempo*$roomPrice;
     $totalPrice=$totalPrice." "."DH";
    return $totalPrice;
}
public function getMinimumPayment($roomPrice,$check_in,$check_out){
    $daysnumber= new Helper;
    $tempo=$daysnumber->getDays($check_in,$check_out);
    $minimumDownPayment = ($roomPrice * $tempo) * 0.20;
   
   return $minimumDownPayment;
}

  
public function getPaidOff(){
        $total=0;
        foreach ($this->payment as $payment) {
        $total+= $payment->price;
        }
        $total=$total." "."DH";
      return  $total;
}

public function getDept($roomPrice,$check_in,$check_out){
   $totalPaid=0;
    foreach ($this->payment as $payment) {
        $totalPaid+= $payment->price;
        }
        $daysnumber= new Helper;
        $tempo=$daysnumber->getDays($check_in,$check_out);
        $totalPrice=  $tempo*$roomPrice;
    $dept=$totalPrice - $totalPaid;
    $total=$dept." "."DH";

return  $total;
}
public function getDeptnbr($roomPrice,$check_in,$check_out){
    $totalPaid=0;
     foreach ($this->payment as $payment) {
         $totalPaid+= $payment->price;
         }
         $daysnumber= new Helper;
         $tempo=$daysnumber->getDays($check_in,$check_out);
         $totalPrice=  $tempo*$roomPrice;
     $dept=$totalPrice - $totalPaid;
     
 
 return  $dept;
 }


public function getRoomsoccupiedId($datedebut,$datefin){
   $occupiedRoomsId=Transaction::where([['check_in', '<=', $datedebut],['check_out', '>=', $datefin]])
                         ->orWhere([['check_in', '>=', $datedebut],['check_in', '<=', $datefin]])
                         ->orWhere([['check_out', '>=', $datedebut],['check_out', '<=', $datefin]])
                         ->pluck('room_id'); 

return   $occupiedRoomsId;
} 


public function getAvailableRoomsId($nbrPersonnes,$occupiedRoomsId){
    $rooms = Room::with('type', 'roomStatus')
    ->where('capacity', '>=',$nbrPersonnes)
    ->whereNotIn('id',$occupiedRoomsId)->orderBy('price')->get();
   
    return  $rooms;
}


public function store($request, Customer $customer, Room $room)
{
    $transaction =Transaction::create([
        'user_id' => auth()->user()->id,
        'customer_id' => $customer->id,
        'room_id' => $room->id,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
    ]);
   

    return $transaction;
}
public function getActiveTransaction(Request $request)
{
    $activeTransactions = Transaction::with('user', 'room', 'customer')->where('check_out', '>=', Carbon::now());
  
     //$transactions =Transaction::with('user', 'room', 'customer')->get();
     $customers=Customer::orderBy('id', 'ASC');
     if (!empty($request->search)) { 
   $customers = $customers->where('name', 'LIKE', '%' . $request->search . '%');
     } 
     $customers = $customers->get();
  
     if (!empty($request->search)) { 
         $activeTransactions = $activeTransactions->whereIn('customer_id',$customers);
           } 
           $activeTransactions=$activeTransactions->orderBy('id', 'DESC')->get();
    return  $activeTransactions;
}

public function getTransactionExpired(Request $request)
{
    $transactionsExpired = Transaction::with('user', 'room', 'customer')->where('check_out', '<', Carbon::now());
    $customers=Customer::orderBy('id', 'ASC');
    if (!empty($request->search)) { 
  $customers = $customers->where('name', 'LIKE', '%' . $request->search . '%');
    } 
    $customers = $customers->get();
 
    if (!empty($request->search)) { 
        $transactionsExpired = $transactionsExpired->whereIn('customer_id',$customers);
          } 
          $transactionsExpired=$transactionsExpired->orderBy('id', 'DESC')->get();
   return $transactionsExpired;
}












}
