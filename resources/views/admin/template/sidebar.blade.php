<nav id="sidebar" class="side-admin">
    <div class="sidebar-header text-center">
        <a class="navbar-brand" href="/">
          <img src="/logo.jpg" class="rounded-circle" width="90"></a>
    </div>

    <ul class="list-unstyled components">
    	<li>
    	    <a href="{{route('admin.panel')}}">Panel</a>
    	</li>
        {{-- <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li> --}}
        {{-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>  --}}
        <li>
            <a href=" {{route('user.index')}} " class="">Usuarios<span class="float-right badge badge-primary">{{ \App\User::count() }}</span></a>
        </li>
        

        
        <li>
            <a href="{{route('office.index')}}" class="">Oficinas</a>
        </li>
    </ul>

</nav>