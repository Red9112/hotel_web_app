@extends('layout') 
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')

<div class="dash">
    <section>
    <div id="r1" class="row">
      <div  class="col-md-6 col-lg-3">
          <div id="c1" class="box bg-success p-3">
            
            <h3>{{ count($totalRes) }}</h3>
            <p class="lead">Total Reservations</p>
          </div>
        </div>
      </div>
      <div id="r1" class="row">
      <div  class=" col-md-6 col-lg-3 mb-4 mb-lg-0">
        <div id="c1" class="box bg-primary p-3">
          <h3>{{ count($activeTransactions) }}</h3>
          <p class="lead">Active Reservations</p>
        </div>
      </div>
  </div>
      <div id="r1" class="row">
      <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
        <div id="c1" class="box bg-danger p-3">
          <h3>{{ count($transactionsExpired) }}</h3>
          <p class="lead">Expired Reservations</p>
        </div>
      </div> 
  </div>
      

   
</section>
</div>

  
<div class="dashTable">
    <div class="welcome">
        <div class="row">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">{{ count($Todayguests) }} Guest this day </h1>
        </div>  </div>
      </div>
<div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h3>Today Guests</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Room</th>
                                            <th class="text-center">Stay</th>
                                            <th>Day Left</th>
                                            <th>Debt</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Todayguests as $res)
                                            <tr>
                                                <td>
                                                    <img src="http://localhost:8000/storage/Images/defaultUser.png"
                                                        class="rounded-circle img-thumbnail" width="40" height="40" alt="">
                                                </td>
                                                <td>
                                                   
                                                        {{ $res->customer->name }}
                                                 
                                                </td>
                                                <td class="text-center">
                                                    <h5><span class="badge bg-secondary"> <a id="roomLink" href="{{route('room.show', ['room'=>$res->room->id])}}">
                                                        {{ $res->room->number }}
                                                    </a></span></h5>
                                                   
                                                </td>
                                                <td>
                                                    {{ $res->check_in}} ~
                                                    {{ $res->check_out }}
                                                </td>
                                                <td>{{$res->getDaysForm()}}
                                                </td>
                                                <td>
                                                    {{$res->getDept($res->room->price,$res->check_in,$res->check_out)}}
                                                </td>
                                               
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    There's no data in this table
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- <div class="row justify-content-md-center mt-3">
                                    <div class="col-sm-10 d-flex mx-auto justify-content-md-center">
                                        <div class="pagination-block">
                                            {{ $transactions->onEachSide(1)->links('template.paginationlinks') }}
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection