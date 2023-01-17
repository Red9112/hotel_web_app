@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')


<div class="editForm ">
<div class="row justify-content-md-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border">
            <div class="card-header">
                <h2>Edit Room Status</h2>
            </div>
            <div class="card-body p-3">
              
  <form method="POST" action="{{route('roomstatus.update',['roomstatus'=>$roomstatus->id])}}">
    @method('PUT')
    @csrf
                      
      <div class="form-group">
         <label for="name"> Name :</label>
       <input class="form-control @error('name') is-invalid @enderror" name="name"  id="name" type="text" value="{{old('name',$roomstatus->name ?? null)}}">
          @error('name')
           <div  class="text-danger mt-1">> {{$message}}</div>
         @enderror
       </div>
                  
     <div class="form-group">
      <label for="name"> Code :</label>
         <input class="form-control @error('code') is-invalid @enderror" name="code"  id="code" type="text" value="{{old('code',$roomstatus->code ?? null)}}">
      @error('code')
         <div  class="text-danger mt-1">> {{$message}}</div>
      @enderror
  </div>

     <div class="form-group">
        <label for="information"> Informations :</label>
           <input class="form-control @error('information') is-invalid @enderror" name="information" id="information" type="text" value="{{old('information',$roomstatus->information ?? null )}}">
           @error('information')
           <div  class="text-danger mt-1">> {{$message}}</div>
      @enderror
  </div>

          <button class="btn btn-block btn-warning" type="submit" >Update Post </button>
       
                </form>
               
           </div>
         </div>
      </div>
   </div>
</div>














@endsection