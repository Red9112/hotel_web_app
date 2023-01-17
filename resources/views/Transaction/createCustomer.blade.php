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
<div class="createForm ">
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border">
                <div class="card-header">
                    <h2>Add Customer</h2>
                </div>
                <div class="card-body p-3">
    <form method="POST" action="{{route('transaction.storeCustomer')}}">
          @csrf
        
          <div class="form-group"> 
          
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              
          @error('name')
              <div class="text-danger mt-1">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class="col-md-6">
          <label for="adress" class="form-label">adress</label>
          <input type="text" class="form-control "  id=" adress"
              name="adress" value="{{ old('adress') }}">
          
      </div>
      <div class=" col-md-6">
          <label for="cne" class="form-label">Cne</label>
          <input type="text" class="form-control @error('cne') is-invalid @enderror" id="
              cne" name="cne" value="{{ old('cne') }}">
          @error('cne')
              <div class="text-danger mt-1">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class=" col-md-12">
          <label for="num_passport" class="form-label">Num_passport</label>
          <input type="text" class="form-control " id="num_passport" name="num_passport" value="{{ old('num_passport') }}">
          
      </div>
      <div class=" col-md-12">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option selected disabled hidden>Choose...</option>
            <option value="Male" @if (old('role') == 'Male') selected @endif>Male</option>
            <option value="Female" @if (old('role') == 'Female') selected @endif>Female</option>
        </select>
        @error('gender')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>
     
          
           
    
    <button class="btn btn-block btn-primary" type="submit" >Add Customer </button>
       
                    </form>
               </div>
             </div>
          </div>
       </div>
    </div>
 

@endsection