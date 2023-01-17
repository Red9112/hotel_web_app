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

</div>

<h2 id="customersTitle" >Customers :</h2>
@foreach ($customers as $customer)   
<div class="all"> 
    <div class="container mt-3">
  <div class="card" style="width:300px">
  <img class="card-img-top" src="http://localhost:8000/storage/Images/defaultUser.png" alt="Card image" style="">
    <div class="card-body">
       <h4 class="card-title">{{$customer->name}}</h4>
       <h6 class="card-title">{{$customer->cne}}</h6>
       <h6 class="card-title">{{$customer->num_passport}}</h6>
       <h6 class="card-title">{{$customer->id}}</h6>

       <a href="{{route('transaction.availability',['customer'=>$customer->id])}}"  class=" btn btn-primary ">Choose</a>
       </div> 
        </div>
    </div>
</div>
    @endforeach
    



@endsection
