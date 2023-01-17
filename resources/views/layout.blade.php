<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{mix('/css/theme.css')}}">
   
    
    <title>Hotel</title>
</head>
<body>
   
        
        <div class="head">
         @yield('header')
       </div>
        @yield('menu')
    <div class="main">
      @if (session()->has('status'))
        <h3 class="alert alert-warning ">
         {{session()->get('status')}}  </h3>   
        @endif  
        @if (session()->has('failed')) 
        <h3 class="alert alert-danger ">
  <!--errorIcon--> <span id="errorIcon"><svg xmlns="http://www.w3.org/2000/svg" width="50"; viewBox="-49 141 512 512"><path fill="none" d="M216.2 195.1c-3-5.6-7.7-9.1-12.9-9.1h-.1c-5.2 0-9.9 3.6-12.8 9.3L-6 581.6c-4.4 8.6-2.4 17.5.9 22.8 1.8 2.9 5.7 7.9 12.2 7.9l402 .6c6.5 0 10.4-5 12.1-7.9 3.3-5.4 5.1-14.5.5-23.2L216.2 195.1zM185 302c0-11 9-20 20-20s20 9 20 20v140c0 11-9 20-20 20s-20-9-20-20V302zm20 259.3c-16 0-28.9-12.9-28.9-28.9s12.9-28.9 28.9-28.9 28.9 12.9 28.9 28.9-12.9 28.9-28.9 28.9z"/><linearGradient id="a" x1="-28" x2="447.464" y1="372" y2="372" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FF884B"/><stop offset=".35" stop-color="#FF634C"/><stop offset=".655" stop-color="#FE4A4F"/><stop offset="1" stop-color="#FE4840"/></linearGradient><path fill="url(#a)" d="M205 462c11 0 20-9 20-20V302c0-11-9-20-20-20s-20 9-20 20v140c0 11 9 20 20 20z"/><linearGradient id="b" x1="-28" x2="447.464" y1="532.4" y2="532.4" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FF884B"/><stop offset=".35" stop-color="#FF634C"/><stop offset=".655" stop-color="#FE4A4F"/><stop offset="1" stop-color="#FE4840"/></linearGradient><circle cx="205" cy="532.4" r="28.9" fill="url(#b)"/><linearGradient id="c" x1="-28" x2="447.464" y1="399.7" y2="399.7" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#FF884B"/><stop offset=".35" stop-color="#FF634C"/><stop offset=".655" stop-color="#FE4A4F"/><stop offset="1" stop-color="#FE4840"/></linearGradient><path fill="url(#c)" d="M457 563.2L251.5 176.5c-10-18.9-28-30.1-48.2-30.1h-.5c-20.3.2-38.3 11.7-48.1 30.9L-41.7 563.6c-9.9 19.5-9 43.2 2.4 61.8 10.3 16.8 27.6 27 46.3 27l402 .6h.1c18.9 0 36.2-10.3 46.4-27.3 11.3-18.9 11.9-42.9 1.5-62.5zm-35.8 41.9c-1.7 2.9-5.6 7.9-12.1 7.9l-402-.6c-6.5 0-10.4-4.9-12.2-7.8-3.3-5.4-5.2-14.2-.9-22.8l196.5-386.5c2.9-5.7 7.6-9.3 12.8-9.3h.1c5.2 0 9.9 3.4 12.9 9.1L421.7 582c4.6 8.6 2.7 17.7-.5 23.1z"/></svg></span>
     <span id="errorMessage">{{session()->get('failed')}}</span></h3>   
        @endif 
         @yield('content')
      </div>
    

   

   <script src="{{mix('/js/app.js')}}"></script>
  

</body>
<footer>

</footer>
</html>