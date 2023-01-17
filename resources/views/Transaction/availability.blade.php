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
  
  </div>
<div class="createForm ">
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border">
                <div class="card-header">
                    <h2>Availability :</h2>
                </div>
                <div class="card-body p-3">
    <form method="GET" action="{{ route('transaction.chooseRoom',['customer' => $customer]) }}">
      
          <div class="form-group"> 
          
          <label for="nbrPersonnes" class="form-label">Number of persons :</label>
          <input type="text" class="form-control @error('nbrPersonnes') is-invalid @enderror" id="nbrPersonnes" name="nbrPersonnes" value="">
              
          @error('nbrPersonnes')
              <div class="text-danger mt-1">
                  {{ $message }}
              </div>
          @enderror
      </div>
     
      <div class=" col-md-6">
          <label for="check_in" class="form-label">Check_in:</label>
          <input type="date" class="form-control @error('check_in') is-invalid @enderror" id="check_in" name="check_in" value="">
          @error('check_in')
              <div class="text-danger mt-1">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class=" col-md-6">
        <label for="check_out" class="form-label">Check_out:</label>
        <input type="date" class="form-control @error('check_out') is-invalid @enderror" id="check_out" name="check_out" value="">
        @error('check_out')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>
     
      
     
          
           
  
    <button id="next" class="btn btn-block btn-primary"  type="submit" > Next </button>
       
                    </form>
               </div>
             </div>
          </div>
       </div>
    </div>




@endsection