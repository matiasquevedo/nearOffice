<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom admin sticky-top" style="background-color: #282828 !important; height: 70px; max-width: 100% !important;min-width: 100% !important; box-shadow: 0 15px 15px -15px #333; border-color: #1f1f1f !important; color:white !important;border-left: 1px solid white;">
   
   <button type="button" id="sidebarCollapse" class="btn btn-outline-light">
       <i class="fas fa-align-left"></i>
   </button>
   <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <i class="fas fa-align-justify"></i>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">           
           
     </ul>
       <div class="form-inline">
         
           
       <ul class="navbar-nav mr-auto" style="color: white !important;">
         <li class="nav-item" ><a class="nav-link" href="/">Página Principal</a></li>         
         @guest
             <li class="nav-item"><a class="nav-link" href="{{route('register')}}">
               Registro
             </a></li>
             <li class="nav-item"><a class="nav-link" href="{{route('login')}}">
               <i class="fas fa-sign-in-alt"></i>
             </a></li>
         @else
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle bar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>          
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   @if(Auth::user()->type == "admin")
                       <a class="dropdown-item" href="{{route('user.perfil')}}">{{\Auth::user()->name}} {{\Auth::user()->lastname}}</a>
                   @else                                    
                      
                   @endif
                 <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                             Cerrar Sesion
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                 </form>
               </div>
             </li>
         @endguest
       </ul>            
       </div>
   </div>

</nav>