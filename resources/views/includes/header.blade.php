<div class="head">
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container-fluid">
          <img class="header_view" src="{{asset('/img/logo/HotelLogo1.png')}}" href="#" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="acv" >
        <div class="dropdown">
          <a  class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Account</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/user/profile"><svg xmlns="http://www.w3.org/2000/svg"width="70%" height="40" viewBox="0 0 64 64"><g data-name="Layer 3"><path d="M32,3A29,29,0,0,0,12.28,53.24l1.9-1c2.92-1.56,7.71-4.12,8.69-4.73a3.22,3.22,0,0,0,1.69-2.23V42.06a19.42,19.42,0,0,1-3.35-6.79.37.37,0,0,0-.12-.2,3.46,3.46,0,0,1-1.34-2.34l0-5.08a4.57,4.57,0,0,1,.75-1.52.81.81,0,0,0,.16-.34V20.16A8,8,0,0,1,23,14.41c2.09-2,5.1-3.06,9-3.06s6.85,1,9,3.06a8,8,0,0,1,2.35,5.75v5.63a.81.81,0,0,0,.18.36,4.17,4.17,0,0,1,.73,1.5l0,.25v4.83a3.49,3.49,0,0,1-1.36,2.36.35.35,0,0,0-.09.16,19.34,19.34,0,0,1-3.36,6.81v3.23a3.25,3.25,0,0,0,1.69,2.23c1,.61,5.77,3.16,8.71,4.72l1.89,1A29,29,0,0,0,32,3Z"/><path d="M40.06,49.21a5.07,5.07,0,0,1-2.63-3.92v-4l.26-.28a16.79,16.79,0,0,0,3.16-6.29,2.41,2.41,0,0,1,.68-1.13,2.32,2.32,0,0,0,.71-.9V28a2,2,0,0,0-.33-.65,2.61,2.61,0,0,1-.61-1.6V20.16a6,6,0,0,0-1.74-4.31c-1.71-1.66-4.26-2.5-7.56-2.5s-5.85.84-7.56,2.5a6,6,0,0,0-1.75,4.31v5.63a2.55,2.55,0,0,1-.59,1.58,2.41,2.41,0,0,0-.35.67v4.69a2.41,2.41,0,0,0,.69.86,2.35,2.35,0,0,1,.7,1.16A16.89,16.89,0,0,0,26.31,41l.25.28v4a5.08,5.08,0,0,1-2.63,3.92c-1,.6-5.12,2.84-8.08,4.41l-1.94,1a28.92,28.92,0,0,0,36.19,0l-1.94-1C45.2,52,41,49.81,40.06,49.21Z"/></g></svg></a></li>
            <li><form method="POST" action="{{ route('logout') }}">
              <a class="dropdown-item" href=href="route('logout')"
              onclick="event.preventDefault();
          this.closest('form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="80%" height="40" viewBox="0 0 32 32"><path d="M29.71,16.71l-4,4-1.42-1.42L26.59,17H21a3,3,0,0,1-3-3V5a1,1,0,0,0-1-1H5A1,1,0,0,0,4,5V27a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V20h2v7a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H17a3,3,0,0,1,3,3v9a1,1,0,0,0,1,1h5.6l-2.26-2.28,1.42-1.41,3.95,4A1,1,0,0,1,29.71,16.71Z" data-name="44 Log out, Basic, Essential"/></svg> 
              @csrf
             </a></form></li>
          </ul>
        </div> </div>
        
       
      </div>
    </nav>
  </div>
    