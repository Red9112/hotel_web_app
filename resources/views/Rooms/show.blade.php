@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')

<div class="Pictures"> 
<div class="container">
<div class="panel active" style="background-image: url('{{$room->getFirstImage()}}')">
 
</div>
      @foreach ($room->image as $image )
      @if ($image)
      <div class="panel" style="background-image: url('{{$image->getRoomImage()}}')">
        
      </div>
    @endif
    @endforeach
</div>


  <div class="roomView mt-4 p-5  text-white rounded" >
    <h1>View</h1> 
    <p>{{$room->view}}
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
       ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
       ullamco laboris nisi ut aliquip ex ea commodo consequat..</p> 
    
       
  </div>
 

</div>















@endsection