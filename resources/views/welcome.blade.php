<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link rel="stylesheet" href="{{mix('/css/theme.css')}}">
    <title>Document</title>
</head>
<body class="wel">
    <div class="conexion">
        @if (Route::has('login'))
            <div class="ctn-cnx">
                @auth
                       
                        <button type="button"  class="btn btn-primary bg-dark"  onclick="location.href='{{ route('dashboard') }}'">Dashboard</button>
                    @else
                   <a title="Login" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="log-in"><rect width="24" height="24" opacity="0" transform="rotate(-90 12 12)"/><path d="M19 4h-2a1 1 0 0 0 0 2h1v12h-1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zM11.8 7.4a1 1 0 0 0-1.6 1.2L12 11H4a1 1 0 0 0 0 2h8.09l-1.72 2.44a1 1 0 0 0 .24 1.4 1 1 0 0 0 .58.18 1 1 0 0 0 .81-.42l2.82-4a1 1 0 0 0 0-1.18z"/></g></g></svg></a>
                    
                 @endauth
            </div>
        @endif
    </div>
    
  <div>
   <img id="welcome" src="img/welcome1.jpg" >
   </div>
           
    <div class="desc">
        <h1>Booking System</h1>
        
    </div>
    <script src="{{mix('/js/app.js')}}"></script>

    
    
    
</body>
</html>