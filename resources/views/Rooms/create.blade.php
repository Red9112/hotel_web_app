@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')


<div class="createForm ">
<div class="row justify-content-md-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border">
            <div class="card-header">
                <h2>Add Room</h2>
            </div>
            <div class="card-body p-3">
<form method="POST" action="{{route('room.store')}}" enctype="multipart/form-data">
      @csrf
     <!-- for Room Type -->
      <div class=" col-md-12">
        <label for="type_id" class="form-label">Type</label>
        <select id="type_id" name="type_id" class="form-select @error('type_id') is-invalid @enderror">
            <option selected disabled hidden>Choose...</option>
            @forelse ($types as $type)
            <option value="{{$type->id}}" @if (old('type_id') == '{{$type->id}}') selected @endif>{{$type->name}}</option>
            @endforeach
        </select>
        @error('type_id')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>
     <!-- End  -->

     <!-- for RoomStatus -->
     <div class=" col-md-12">
        <label for="room_status_id" class="form-label">Status</label>
        <select id="room_status_id" name="room_status_id" class="form-select @error('room_status_id') is-invalid @enderror">
            <option selected disabled hidden>Choose...</option>
            @forelse ($roomstatus as $roomstatu)
            <option value="{{$roomstatu->id}}" @if (old('room_status_id') == '{{$roomstatu->id}}') selected @endif>{{$roomstatu->name}}</option>
            @endforeach
        </select>
        @error('room_status_id')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>
     <!-- End  -->
                <!-- for Room Nunber -->
      <div class="col-md-12">
         <label for="number" class="form-label">Room Number</label>
         <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"
             name="number" value="{{old('number')}}" placeholder="ex: 1A">
              @error('number')
                <div class="text-danger mt-1">
                 {{ $message  }}
                 </div>
                 @enderror
                    </div>
            <!-- End  -->
             <!-- for Capacity -->
                    <div class="col-md-12">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="text" class="form-control @error('capacity') is-invalid @enderror" id="capacity"
                            name="capacity" value="{{old('capacity')}}" placeholder="ex: 4">
                        @error('capacity')
                        <div class="text-danger mt-1">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                     <!-- End  -->
                      <!-- for Price -->
                    <div class="col-md-12">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{old('price')}}" placeholder="ex: 500000">
                        @error('price')
                        <div class="text-danger mt-1">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                      <!-- End  -->
                     
                      <!-- for View -->
                    <div class="col-md-12">
                        <label for="view" class="form-label">View</label>
                        <textarea class="form-control" id="view" name="view" rows="3" placeholder="ex: window see beach">{{old('view')}}</textarea>
                        @error('view')
                        <div class="text-danger mt-1">
                            {{ $message  }}
                        </div>
                        @enderror
                    </div>
                     <!-- End  -->
    <!-- Add Image  -->      
  <!-- .form-group>label+input:file.form-control-file#picture   --> 
    <div class="form-group">
    <label for="picture">Image</label>
    <input type="file" name="picture" id="picture" class="mt-3 form-control-file "></div>
 <!-- End  -->
 
     <button class="btn btn-block btn-primary" type="submit" >Add </button>
                </form>
           </div>
         </div>
      </div>
   </div>
</div>
     
      
@endsection

