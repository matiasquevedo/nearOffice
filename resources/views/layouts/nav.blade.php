<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #3498db !important;border:none !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="navbar-header">
        <a class="navbar-brand" href="/">
          <img src="/logo.jpg" class="rounded-circle" width="35"></a>
    </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">           
                
          </ul>
            <div class="form-inline">
              
                
            <ul class="navbar-nav mr-auto">
              @if(count(\App\Album::where('state','1')->get())>0)
                <li class="nav-item"><a class="nav-link" href="">Galeria</a></li>
              @endif
              {{-- @foreach($pages as $page)
                <li class="nav-item"><a class="nav-link" href="{{route('public.page',$page->slug)}}">{{ ucwords($page->title) }}</a></li>
              @endforeach --}}

              @if($public_menu)
                  @foreach($public_menu as $menu)
                    @if( $menu['child'] )
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $menu['label'] }}</span></a>          
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @foreach( $menu['child'] as $child)
                            <a class="dropdown-item" href="/seccion/{{ $menu['link'] }}" title="">{{ $menu['label'] }}</a>
                            <a class="dropdown-item" href="{{ $child['link'] }}">{{ $child['label'] }}</a>
                          @endforeach
                        </div>
                      </li> 
                    @else
                      <li class="nav-item">
                        <a class="nav-link" href="/seccion/{{ $menu['link'] }}" title="">{{ $menu['label'] }}</a>
                      </li>
                    @endif

                  @endforeach
              @endif


              {{-- <li class="nav-item"><a class="nav-link" href="">Contacto</a></li> --}}
              
              @guest
                  <li class="nav-item"><a class="nav-link" href="{{route('register')}}">
                    Registro
                  </a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('login')}}">
                    <i class="fas fa-sign-in-alt"></i>
                  </a></li>
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>          
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      @if(\Auth::user()->type == 'admin')
                        <a class="dropdown-item" href="{{route('home')}}">Panel</a>
                        <a class="dropdown-item" href="{{route('user.perfil')}}">{{\Auth::user()->name}} {{\Auth::user()->lastname}}</a>
                      @else
                        @if(\Auth::user()->commerce != null)
                          <a class="dropdown-item" href="{{route('home')}}">{{\Auth::user()->commerce->name}}</a>
                        @endif
                        <a class="dropdown-item" href="{{route('user.perfil')}}">{{\Auth::user()->name}} {{\Auth::user()->lastname}}</a>

                      @endif
                        
                        {{-- @if(Auth::user()->type == "admin")
                            
                        @else                                    
                           <a class="dropdown-item" href="">Mi Perfil</a>
                        @endif --}}
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
    </div>

</nav>

<div class="pos-f-t border-top">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-white p-4">
      <h5 class="h4">Collapsed content</h5>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
</div>
