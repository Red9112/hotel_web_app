@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')


<div class="container mt-3">
    <div class="row justify-content-md-center">
        <div class="col-md-8 mt-2">
            <div class="card shadow-sm border">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row mb-3">

    <h1>  Create Payment : </h1>
    
    <div class="row mb-3"> 
        <label for="room_number" class="col-sm-2 col-form-label">Room</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="room_number" name="room_number"
                placeholder="col-form-label" value="{{$transaction->room->number}} " readonly>
        </div>
    </div>
     <div class="row mb-3">
        <label for="room_price" class="col-sm-2 col-form-label">Room Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="room_price" name="room_price"
                placeholder="col-form-label" value="{{ $transaction->room->price }} " readonly>
        </div>
    </div>
        <div class="row mb-3">
        <label for="check_in" class="col-sm-2 col-form-label">Check_in</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="check_in" name="check_in"
                placeholder="col-form-label" value="{{ $transaction->check_in }} " readonly>
        </div>
    </div>
     <div class="row mb-3">
        <label for="check_out" class="col-sm-2 col-form-label">Check_out</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="check_out" name="check_out"
                placeholder="col-form-label" value="{{ $transaction->check_out }} " readonly>
        </div>
    </div>
     <div class="row mb-3">
        <label for="getDays" class="col-sm-2 col-form-label">Total Days</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="getDays" name="getDays"
                placeholder="col-form-label" value="{{$helper->getDays($transaction->check_in,$transaction->check_out)}} " readonly>
        </div>
    </div>
     <div class="row mb-3">
        <label for="totalPrice" class="col-sm-2 col-form-label">Total Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="totalPrice" name="totalPrice"
                placeholder="col-form-label" value="{{$transaction->getTotalPrice($transaction->room->price,$transaction->check_in,$transaction->check_out)}} " readonly>
        </div>
    </div> 
    <div class="row mb-3">
        <label for="paidOff" class="col-sm-2 col-form-label">Paid Off</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="paidOff" name="paidOff"
                placeholder="col-form-label" value="{{$transaction->getPaidOff()}} " readonly>
        </div>
    </div> 
    
    <div class="row mb-3">
        <label for="dept" class="col-sm-2 col-form-label">Dept</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="dept" name="dept"
                placeholder="col-form-label" value="{{$transaction->getDept($transaction->room->price,$transaction->check_in,$transaction->check_out)}} " readonly>
        </div>
    </div>

    <form method="POST"  action="{{ route('transaction.payment.store', ['transaction' => $transaction->id]) }}">
        @csrf
    <div class="row mb-3">
        <label for="pay" class="col-sm-2 col-form-label">Pay</label>
        <div class="col-sm-10">
            <input type="text"
                class="form-control @error('pay') is-invalid @enderror"
                id="pay" name="pay" placeholder="Input payment here"
                value="{{ old('pay') }}">
            @error('pay')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

  <div id="btnConfirm">                         
<button class=" custom-btn btn-12"><span>Save !</span><span>Pay</span></button>
</div> 
</form>







  </div> </div> </div> </div> </div> </div> </div> </div>





































@endsection