@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')


<div class="<div class="container">
<div class="Custumerindex">
<!-- (1): plus icon for add Type-->
<div class="addCustomerIcon"> 
  <div class="col-lg-6 mb-2">
  <div class="d-grid gap-2 d-md-block">
      <a href="{{ route('customer.create') }}" class="btn btn-sm shadow-sm myBtn border rounded">
          <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
              viewBox="0 0 24 24" stroke="black">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
      </a>
  </div>
</div>
</div>
<!--Search Bar  -->
<div class="search">
  <div class="search-box">
      <form class="d-flex" method="GET" action="{{ route('customer.index') }}">
      <button class="btn-search" type="submit"><svg   id="SvgjsSvg1031" width="50" height="30" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1032"></defs><g id="SvgjsG1033"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="30"><g data-name="Layer 2" fill="#ffffff" class="color000 svgShape"><g data-name="search" fill="#ffffff" class="color000 svgShape"><rect width="24" height="24" opacity="0" fill="#ffffff" class="color000 svgShape"></rect><path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" fill="#ffffff" class="color000 svgShape"></path></g></g></svg></g></svg></button>
      <input type="text" class="input-search" type="search" placeholder="Search by name" aria-label="Search"
      id="search" name="search" value="{{ request()->input('search') }}">
  </form>
  </div>
  </div>
      <!--END-->
     <h1 id="customersTitle">List of Customers:</h1> 
    <div class="customersTable">
  <table class="  table table-bordered ">

    <thead>
      <tr>
          <th>Id</th>
        <th>Name</th>
        <th>Adress</th>
        <th>CIN</th>
        <th>Num_passport</th>
        <th>Gender</th>
        <th>Actions</th>
      </tr> 
    </thead>
   
    <tbody class="customerTdTable"> 
      @forelse ($customers as $customer)  
      <tr>
          <td class="customerName">{{$customer->id}}</td>
        <td class="customerName">{{$customer->name}}</td>
        <td>{{$customer->adress}}</td>
        <td>{{$customer->cne}}</td>
        <td>{{$customer->num_passport}}</td>
        <td>{{$customer->gender}}</td>
        <td><a class="btn btn-warning my-1" href="{{route('customer.edit',['customer'=>$customer->id])}}">Edit</a> 
        <form class=" deleteCustomer form-inline" method="POST" action="{{route('customer.destroy',['customer'=>$customer->id])}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit" >Delete </button>
         </form>
      </tr>
      @endforeach
    </tbody>
    </table>
</div>
<div class="pagination">
   
  {{ $customers->links() }}
  
</div>
</div>
</div>


  @endsection
  