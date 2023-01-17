
@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')
<div class="progress">
    <div class="gh progress-bar bg-info progress-bar-striped active" role="progressbar"
    aria-valuenow="70" aria-valuemin="0" aria-valuemax="400" style="width:25%;">
      IDENTITY CARD
    </div>
    <div class="gh progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="70" aria-valuemin="0" aria-valuemax="400" style="width:25%;">
      CAPACITY / DATE
    </div>
    <div class="gh progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="70" aria-valuemin="0" aria-valuemax="400" style="width:25%; background-color: #34495e;">
      PICK A ROOM
    </div>
    <div class="gh progress-bar bg-success progress-bar-striped active" role="progressbar"
    aria-valuenow="70" aria-valuemin="0" aria-valuemax="400" style="width:25%;">
    CONFIRMATION
    </div>
       
    
      </div>
<div class="container mt-3">
    <div class="row justify-content-md-center">
        <div class="col-md-8 mt-2">
            <div class="card shadow-sm border">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row mb-3">

    <h1>  Confirmation : </h1>
    
    <div class="row mb-3">
        <label for="room_number" class="col-sm-2 col-form-label">Room</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="room_number" name="room_number"
                placeholder="col-form-label" value="{{ $room->number }} " readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="type" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="type" name="type"
                placeholder="col-form-label" value="{{ $room->type->name}} " readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="capacity" class="col-sm-2 col-form-label">Capacity</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="capacity" name="capacity"
                placeholder="col-form-label" value="{{ $room->capacity }} " readonly>
        </div>
    </div> <div class="row mb-3">
        <label for="room_price" class="col-sm-2 col-form-label">Price /Day</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="room_price" name="room_price"
                placeholder="col-form-label" value="{{ $room->price }} " readonly>
        </div>
    </div>
<!-- !!!form -->
    <form method="POST"  action="{{ route('transaction.payDownPayment', ['customer' => $customer->id, 'room' => $room->id]) }}">
        @csrf
        <div class="row mb-3">
        <label for="check_in" class="col-sm-2 col-form-label">Check_in</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="check_in" name="check_in"
                placeholder="col-form-label" value="{{ $check_in }} " readonly>
        </div>
    </div> <div class="row mb-3">
        <label for="check_out" class="col-sm-2 col-form-label">Check_out</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="check_out" name="check_out"
                placeholder="col-form-label" value="{{ $check_out }} " readonly>
        </div>
    </div> <div class="row mb-3">
        <label for="getDays" class="col-sm-2 col-form-label">Total Days</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="getDays" name="getDays"
                placeholder="col-form-label" value="{{$helper->getDays($check_in,$check_out)}} " readonly>
        </div>
    </div> <div class="row mb-3">
        <label for="totalPrice" class="col-sm-2 col-form-label">Total Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="totalPrice" name="room_number"
                placeholder="col-form-label" value="{{$totalPrice}} " readonly>
        </div>
    </div> <div class="row mb-3">
        <label for="minimumPayment" class="col-sm-2 col-form-label">Advance</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="minimumPayment" name="minimumPayment"
                placeholder="col-form-label" value="{{ $minimumPayment }} " readonly>
        </div>
    </div> 
    <div class="row mb-3">
        <label for="minimumPayment" class="col-sm-2 col-form-label">Payment</label>
        <div class="col-sm-10">
            <input type="text"
                class="form-control @error('minimumPayment') is-invalid @enderror"
                id="minimumPayment" name="minimumPayment" placeholder="Input payment here"
                value="{{ old('minimumPayment') }}">
            @error('minimumPayment')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

  <div id="btnConfirm">                         
<button class=" custom-btn btn-12"><span>Save !</span><span>Pay DownPayment</span></button>
</div> 
</form>







  </div> </div> </div> </div> </div> </div> </div> </div>




  @endsection