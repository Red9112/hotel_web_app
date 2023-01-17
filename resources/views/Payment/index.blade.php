@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')

<div class="titre_header_payment">List of Payments :</div>
     
 <!--Search Bar  -->
 <div class="searchPayment"> 
    <div class="search-box">
        <form class="d-flex" method="GET" action="{{ route('payment.index') }}">
        <button class="btn-search" type="submit"><svg   id="SvgjsSvg1031" width="50" height="30" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1032"></defs><g id="SvgjsG1033"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="30"><g data-name="Layer 2" fill="#ffffff" class="color000 svgShape"><g data-name="search" fill="#ffffff" class="color000 svgShape"><rect width="24" height="24" opacity="0" fill="#ffffff" class="color000 svgShape"></rect><path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" fill="#ffffff" class="color000 svgShape"></path></g></g></svg></g></svg></button>
        <input type="text" class="input-search" type="search" placeholder="Search by Customer name " aria-label="Search"
        id="search" name="search" value="{{ request()->input('search') }}">
    </form>
    </div>
    </div>
        <!--END-->
<div class="transactionTable ">
   
        <table class="  table table-bordered ">
                      <thead class="theadTransactionAndex">
                          <tr>

                              <th>ID</th>
                              <th>Room</th>
                              <th>Customer</th>
                              <th>Paid</th>
                              <th>Created At</th>
                              <th>Served By</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                           
                    
                      <tbody class="tbodyTransactionAndex">
                          @forelse ($payments as $payment) 
                              <tr>
                                  <td>{{$payment->id}}</td>
                                  <td>{{$payment->transaction->room->number}}</td>
                                  <td>{{$payment->transaction->customer->name}}</td>
                                  <td>{{$payment->price}} DH</td>
                                  <td>{{$payment->created_at}}</td>
                                  <td>{{$payment->user->name}}</td> 
                                  <td><a href="{{ route('payment.invoice', $payment->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Invoice</a></td>
                              </tr> 
                          @empty
                              <tr>
                                  <td colspan="10" class="text-center">
                                      There's no Payments 
                                  </td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                  <div class="pagination">
   
                    {{ $payments->links() }}
                    
                  </div>
              </div>

 















@endsection