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
</div>
 
<div class="container">
<div class="container-fluid mt-3">
    <h1 id="listTitre" class="text-success">List of Available Rooms :({{$countRooms}} Rooms)</h1>
    <div class="info alert alert-success">
       <strong><b id="titre">For :</b>{{$nbrPersonnes}} {{Str::plural('Guest',$nbrPersonnes)}} <b id="titre">  on  
            Check_in :</b>  {{$helper->dateDayFormat($check_in)}}         
            <b id="titre">  to Check_out :</b> {{$helper->dateDayFormat($check_out)}}</strong> 
      </div>
    @foreach ($rooms as $room)
   <div class="listRooms row">
 <div class="col-sm-4 p-3 bg-light ">
   <div><h3 id="text">Room number : {{$room->number}}</h3> 
 <h4 class="badge rounded-pill bg-info"> Capacity : {{$room->capacity}}</h4><br>
 <h4 class="badge rounded-pill bg-success"> Price : {{$room->price}}/Day</h4> <br>
 <h4 id="text">Type : {{$room->type->name}}</h4>
 <h4 id="text">Status : {{$room->roomstatus->name}}</h4>
 <button> <a  href="{{ route('transaction.confirmation', ['customer' => $customer->id, 'room' => $room->id, 'from' => $check_in,'to' => $check_out]) }}" class="custom-btn btn-4"><span>Choose Room</span></a></button>

</div>
</div> 

  <div  class="col-sm-8 p-3 -md-4 bg-light ">
    <div id="roomPic" class="card" style="width:300px">
       <a href="{{$room->getFirstImage()}}" target="_blank">
          <img class="img-fluid rounded"  src="{{$room->getFirstImage()}}" alt="Lights" style="width:100%">
         </a></div>
              </div>
           
      </div>
      
      @endforeach
     
</div>
 </div>
 
                                         
  




    

 @endsection