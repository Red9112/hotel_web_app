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
                <h2>Edit Type</h2>
            </div>
            <div class="card-body p-3">
        <form method="POST" action="{{route('type.update',['type'=>$type->id])}}">
            @method('PUT')
            @csrf
      <div class="form-group">
          <label for="name"> Name :</label>
          <input class="form-control" name="name"  id="name" type="text" value="{{old('name',$type->name ?? null)}}">
      </div>
      <div class="form-group">
          <label for="description"> Description :</label>
          <input class="form-control" name="description" id="description" type="text" value="{{old('description',$type->description ?? null )}}">
      </div>
      
      
          @if ($errors->any())
          <ul>
              
          @foreach ($errors->all() as $error)
         <li style="color:red "> {{$error}} </li>
          @endforeach
          </ul>
          @endif

          <button class="btn btn-block btn-warning" type="submit" >Update Post </button>
       
                </form>
            
           </div>
         </div>
      </div>
   </div>
</div>














@endsection