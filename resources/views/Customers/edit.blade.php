@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')


<div class="row justify-content-md-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border">
            <div class="card-header">
                <h2>Edit Customer</h2>
            </div>
            <div class="card-body p-3">
        <form method="POST" action="{{route('customer.update',['customer'=>$customer->id])}}">
            @method('PUT')
            @csrf
      <div class="form-group">
        <label for="name" class="form-label">Name :</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" 
        id="name" name="name" value="{{ $customer->name }}">
            
        @error('name')
            <div class="text-danger mt-1">
                {{ $message }}
            </div> 
        @enderror
      </div>
      <div class="form-group">
        <label for="adress" class="form-label">Adress :</label>
        <input type="text" class="form-control @error('adress') is-invalid @enderror "  id=" adress"
            name="adress" value="{{ $customer->adress }}">
             @error('adress')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-group"> 
        <label for="cne" class="form-label">CIN :</label>
        <input type="text" class="form-control @error('cne') is-invalid @enderror" id="
            cne" name="cne" value="{{ $customer->cne }}">
        @error('cne')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
    <label for="num_passport" class="form-label">Num_passport :</label>
      <input type="text" class="form-control @error('num_passport') is-invalid @enderror " id="num_passport" name="num_passport" value="{{ $customer->num_passport }}">
      @error('num_passport')
      <div class="text-danger mt-1">
          {{ $message }}
      </div>
  @enderror 
    </div>
      <div class="form-group">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
            <option selected disabled hidden>Choose...</option>
            <option value="{{$customer->gender}}" @if ($customer->gender == 'Male')  selected @endif>Male</option>
            <option value="{{$customer->gender}}" @if ($customer->gender == 'Female') selected @endif>Female</option>
        </select>
        @error('gender')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
    </div>
    
      
         

 <button class="btn btn-block btn-warning" type="submit" >Update User </button>
       
                </form>
               
           </div>
         </div>
      </div>
   </div>
</div>














@endsection