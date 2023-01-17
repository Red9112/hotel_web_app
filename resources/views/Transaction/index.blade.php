@extends('layout')
@section('header')
@include('includes/header')
@endsection
@section('menu')
@include('includes/menu')
@endsection
@section('content')
@include('Transaction/Modal') 
 
 <!--Search Bar  -->
 <div class="search"> 
    <div class="search-box">
        <form class="d-flex" method="GET" action="{{ route('transaction.index') }}">
        <button class="btn-search" type="submit"><svg   id="SvgjsSvg1031" width="50" height="30" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><defs id="SvgjsDefs1032"></defs><g id="SvgjsG1033"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="30"><g data-name="Layer 2" fill="#ffffff" class="color000 svgShape"><g data-name="search" fill="#ffffff" class="color000 svgShape"><rect width="24" height="24" opacity="0" fill="#ffffff" class="color000 svgShape"></rect><path d="M20.71 19.29l-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z" fill="#ffffff" class="color000 svgShape"></path></g></g></svg></g></svg></button>
        <input type="text" class="input-search" type="search" placeholder="Search by Customer name " aria-label="Search"
        id="search" name="search" value="{{ request()->input('search') }}">
    </form>
    </div>
    </div>
     <!--END-->
<a href="{{route('payment.index')}}" class="btnListPayment">List of Payments</a>
<div class="titre_header">List of Reservations :</div>
<div class="transactionTable "> 
    <span id="spinner" class="spinner-grow text-success"></span>
    <h3 id="spinner">Active Reservations :</h3>
        <table class="  table table-bordered ">
                      <thead class="theadTransactionAndex">
                          <tr>

                              <th>ID</th>
                              <th>Customer</th>
                              <th>Room</th>
                              <th>Check In</th>
                              <th>Check Out</th>
                              <th>Days</th>
                              <th>Total Price</th>
                              <th>Paid Off</th>
                              <th>Debt</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                          
                    
                      <tbody class="tbodyTransactionAndex">
                          @forelse ($activeTransactions as $activeTransaction)
                              <tr>
                                  <td>{{$activeTransaction->id}}</td>
                                  <td>{{$activeTransaction->customer->name}}</td>
                                  <td>{{$activeTransaction->room->number}}</td>
                                  <td>{{$activeTransaction->check_in}}</td>
                                  <td>{{$activeTransaction->check_out}}</td>
                                  <td>{{$activeTransaction->getDaysForm()}}</td>
                                  <td>{{$activeTransaction->getTotalPrice($activeTransaction->room->price,$activeTransaction->check_in,$activeTransaction->check_out)}}</td> 
                                  <td>{{$activeTransaction->getPaidOff()}}</td>
                                  <td>{{$activeTransaction->getDept($activeTransaction->room->price,$activeTransaction->check_in,$activeTransaction->check_out)}}</td>
                                  <td><a href="{{route('transaction.payment.create',['transaction'=>$activeTransaction->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="40" viewBox="0 0 48 48"><path d="M 24 0 C 10.75109 0 0 10.7511 0 24 C 0 37.2489 10.75109 48 24 48 C 37.248912 48 48 37.2489 48 24 C 48 10.7511 37.248912 0 24 0 z M 24 1 C 36.708472 1 47 11.2916 47 24 C 47 36.7085 36.708472 47 24 47 C 11.29153 47 1 36.7085 1 24 C 1 11.2916 11.29153 1 24 1 z M 10 15 C 8.90064 15 8 15.9006 8 17 L 8 31 C 8 32.0993 8.90064 33 10 33 L 38 33 C 39.099359 33 40.000001 32.0993 40 31 L 40 17 C 40.000001 15.9006 39.099359 15 38 15 L 10 15 z M 10 16 L 38 16 C 38.562662 16 39.000001 16.4373 39 17 L 39 31 C 39 31.5626 38.562662 32 38 32 L 10 32 C 9.43734 32 9 31.5626 9 31 L 9 17 C 9 16.4373 9.43734 16 10 16 z M 13 17 L 13 17.5 C 13 18.8866 11.88664 20 10.5 20 L 10 20 L 10 28 L 10.5 28 C 11.88664 28 13 29.1133 13 30.5 L 13 31 L 35 31 L 35 30.5 C 35.000005 29.1133 36.113367 28 37.5 28 L 38 28 L 38 20 L 37.5 20 C 36.113367 20 35.000005 18.8866 35 17.5 L 35 17 L 13 17 z M 13.898438 18 L 20.398438 18 C 18.362437 19.2253 17 21.4543 17 24 C 17 26.5463 18.362438 28.775 20.398438 30 L 13.898438 30 C 13.670757 28.4889 12.51106 27.329263 11 27.101562 L 11 20.898438 C 12.51106 20.670738 13.670758 19.511 13.898438 18 z M 23.980469 18 C 27.305831 18 30 20.685 30 24 C 30 27.3162 27.305841 30 23.980469 30 C 20.654009 30 18 27.3198 18 24 C 18 20.6814 20.654019 18 23.980469 18 z M 27.556641 18 L 34.101562 18 C 34.329247 19.511 35.488939 20.670737 37 20.898438 L 37 27.101562 C 35.488939 27.329262 34.329249 28.4889 34.101562 30 L 27.576172 30 C 29.622024 28.7753 31 26.5474 31 24 A 0.50004994 0.50004994 0 0 0 30.960938 23.804688 C 30.888068 21.340987 29.541009 19.1935 27.556641 18 z M 23.509766 19 L 23.509766 20.189453 C 23.130676 20.254453 22.762079 20.394359 22.443359 20.630859 C 21.740999 21.125559 21.372363 22.028919 21.632812 22.886719 C 21.929483 23.920819 22.945279 24.5178 23.943359 24.5 L 24.064453 24.5 A 0.50004994 0.50004994 0 0 0 24.076172 24.5 C 24.647322 24.489 25.262079 24.871978 25.410156 25.392578 A 0.50004994 0.50004994 0 0 0 25.414062 25.402344 C 25.536068 25.799644 25.336766 26.308241 24.980469 26.556641 A 0.50004994 0.50004994 0 0 0 24.966797 26.566406 C 24.366237 27.014606 23.319486 26.893609 22.884766 26.287109 C 22.756676 26.110609 22.682934 25.890288 22.683594 25.679688 L 21.683594 25.679688 C 21.682594 26.113987 21.824469 26.532153 22.074219 26.876953 C 22.429949 27.372053 22.950616 27.670969 23.509766 27.792969 L 23.509766 29 L 24.509766 29 L 24.509766 27.8125 C 24.883136 27.7465 25.244503 27.6081 25.558594 27.375 C 26.260257 26.8807 26.628447 25.978394 26.369141 25.121094 C 26.0725 24.086994 25.055061 23.487459 24.056641 23.505859 L 23.9375 23.505859 A 0.50004994 0.50004994 0 0 0 23.925781 23.505859 C 23.354301 23.515859 22.739897 23.133681 22.591797 22.613281 A 0.50004994 0.50004994 0 0 0 22.589844 22.603516 C 22.467884 22.206316 22.665344 21.697519 23.021484 21.449219 A 0.50004994 0.50004994 0 0 0 23.035156 21.439453 C 23.635636 20.991153 24.682517 21.11205 25.117188 21.71875 C 25.245437 21.89545 25.319209 22.115972 25.318359 22.326172 L 26.318359 22.326172 C 26.320159 21.891172 26.177354 21.473506 25.927734 21.128906 C 25.575662 20.638406 25.062796 20.340144 24.509766 20.214844 L 24.509766 19 L 23.509766 19 z M 14 23 C 13.45364 23 13 23.4536 13 24 C 13 24.5463 13.45364 25 14 25 C 14.54636 25 15 24.5463 15 24 C 15 23.4536 14.54636 23 14 23 z M 34 23 C 33.453638 23 33.000001 23.4536 33 24 C 33 24.5463 33.453638 25 34 25 C 34.546363 25 35 24.5463 35 24 C 35 23.4536 34.546363 23 34 23 z " color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/></svg></a></td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="10" class="text-center">
                                      There's no Active Guests in this table
                                  </td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                  <span id="spinner" class="spinner-grow text-danger"></span>
                  <h3 id="spinner">Expired Reservations :</h3>
                  <table class="  table table-bordered ">
                    <thead class="theadTransactionAndex">
                        <tr>

                            <th>ID</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Days</th>
                            <th>Total Price</th>
                            <th>Paid Off</th>
                            <th>Debt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        
                  
                    <tbody class="tbodyTransactionAndex">
                        @forelse ($transactionsExpireds as $transactionsExpired)
                            <tr>
                                <td>{{$transactionsExpired->id}}</td>
                                <td>{{$transactionsExpired->customer->name}}</td>
                                <td>{{$transactionsExpired->room->number}}</td>
                                <td>{{$transactionsExpired->check_in}}</td>
                                <td>{{$transactionsExpired->check_out}}</td>
                                <td>{{$transactionsExpired->getDaysForm()}}</td>
                                <td>{{$transactionsExpired->getTotalPrice($transactionsExpired->room->price,$transactionsExpired->check_in,$transactionsExpired->check_out)}}</td> 
                                <td>{{$transactionsExpired->getPaidOff()}}</td>
                                <td>{{$transactionsExpired->getDept($transactionsExpired->room->price,$transactionsExpired->check_in,$transactionsExpired->check_out)}}</td>
                                <td><a href="{{route('transaction.payment.create',['transaction'=>$transactionsExpired->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="40" viewBox="0 0 48 48"><path d="M 24 0 C 10.75109 0 0 10.7511 0 24 C 0 37.2489 10.75109 48 24 48 C 37.248912 48 48 37.2489 48 24 C 48 10.7511 37.248912 0 24 0 z M 24 1 C 36.708472 1 47 11.2916 47 24 C 47 36.7085 36.708472 47 24 47 C 11.29153 47 1 36.7085 1 24 C 1 11.2916 11.29153 1 24 1 z M 10 15 C 8.90064 15 8 15.9006 8 17 L 8 31 C 8 32.0993 8.90064 33 10 33 L 38 33 C 39.099359 33 40.000001 32.0993 40 31 L 40 17 C 40.000001 15.9006 39.099359 15 38 15 L 10 15 z M 10 16 L 38 16 C 38.562662 16 39.000001 16.4373 39 17 L 39 31 C 39 31.5626 38.562662 32 38 32 L 10 32 C 9.43734 32 9 31.5626 9 31 L 9 17 C 9 16.4373 9.43734 16 10 16 z M 13 17 L 13 17.5 C 13 18.8866 11.88664 20 10.5 20 L 10 20 L 10 28 L 10.5 28 C 11.88664 28 13 29.1133 13 30.5 L 13 31 L 35 31 L 35 30.5 C 35.000005 29.1133 36.113367 28 37.5 28 L 38 28 L 38 20 L 37.5 20 C 36.113367 20 35.000005 18.8866 35 17.5 L 35 17 L 13 17 z M 13.898438 18 L 20.398438 18 C 18.362437 19.2253 17 21.4543 17 24 C 17 26.5463 18.362438 28.775 20.398438 30 L 13.898438 30 C 13.670757 28.4889 12.51106 27.329263 11 27.101562 L 11 20.898438 C 12.51106 20.670738 13.670758 19.511 13.898438 18 z M 23.980469 18 C 27.305831 18 30 20.685 30 24 C 30 27.3162 27.305841 30 23.980469 30 C 20.654009 30 18 27.3198 18 24 C 18 20.6814 20.654019 18 23.980469 18 z M 27.556641 18 L 34.101562 18 C 34.329247 19.511 35.488939 20.670737 37 20.898438 L 37 27.101562 C 35.488939 27.329262 34.329249 28.4889 34.101562 30 L 27.576172 30 C 29.622024 28.7753 31 26.5474 31 24 A 0.50004994 0.50004994 0 0 0 30.960938 23.804688 C 30.888068 21.340987 29.541009 19.1935 27.556641 18 z M 23.509766 19 L 23.509766 20.189453 C 23.130676 20.254453 22.762079 20.394359 22.443359 20.630859 C 21.740999 21.125559 21.372363 22.028919 21.632812 22.886719 C 21.929483 23.920819 22.945279 24.5178 23.943359 24.5 L 24.064453 24.5 A 0.50004994 0.50004994 0 0 0 24.076172 24.5 C 24.647322 24.489 25.262079 24.871978 25.410156 25.392578 A 0.50004994 0.50004994 0 0 0 25.414062 25.402344 C 25.536068 25.799644 25.336766 26.308241 24.980469 26.556641 A 0.50004994 0.50004994 0 0 0 24.966797 26.566406 C 24.366237 27.014606 23.319486 26.893609 22.884766 26.287109 C 22.756676 26.110609 22.682934 25.890288 22.683594 25.679688 L 21.683594 25.679688 C 21.682594 26.113987 21.824469 26.532153 22.074219 26.876953 C 22.429949 27.372053 22.950616 27.670969 23.509766 27.792969 L 23.509766 29 L 24.509766 29 L 24.509766 27.8125 C 24.883136 27.7465 25.244503 27.6081 25.558594 27.375 C 26.260257 26.8807 26.628447 25.978394 26.369141 25.121094 C 26.0725 24.086994 25.055061 23.487459 24.056641 23.505859 L 23.9375 23.505859 A 0.50004994 0.50004994 0 0 0 23.925781 23.505859 C 23.354301 23.515859 22.739897 23.133681 22.591797 22.613281 A 0.50004994 0.50004994 0 0 0 22.589844 22.603516 C 22.467884 22.206316 22.665344 21.697519 23.021484 21.449219 A 0.50004994 0.50004994 0 0 0 23.035156 21.439453 C 23.635636 20.991153 24.682517 21.11205 25.117188 21.71875 C 25.245437 21.89545 25.319209 22.115972 25.318359 22.326172 L 26.318359 22.326172 C 26.320159 21.891172 26.177354 21.473506 25.927734 21.128906 C 25.575662 20.638406 25.062796 20.340144 24.509766 20.214844 L 24.509766 19 L 23.509766 19 z M 14 23 C 13.45364 23 13 23.4536 13 24 C 13 24.5463 13.45364 25 14 25 C 14.54636 25 15 24.5463 15 24 C 15 23.4536 14.54636 23 14 23 z M 34 23 C 33.453638 23 33.000001 23.4536 33 24 C 33 24.5463 33.453638 25 34 25 C 34.546363 25 35 24.5463 35 24 C 35 23.4536 34.546363 23 34 23 z " color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/></svg></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">
                                    There's no Expired Reservations
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
              </div>
  


            






@endsection