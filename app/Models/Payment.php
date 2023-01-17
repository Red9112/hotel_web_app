<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_id',
        'price',   
    ];



    

     

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
   



    public function store($request,Transaction $transaction)
    {
        if(!empty($request->minimumPayment)){
            $price = $request->minimumPayment;
        } else {
            $price = $request->payment;
        }
        $payment = Payment::create([
            'user_id' => Auth()->user()->id,
            'transaction_id' => $transaction->id,
            'price' => $price,
        ]);

        return $payment;
    }





}
