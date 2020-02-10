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
            <a href="{{route('page.index')}}" class="">Secciones<span class="float-right badge badge-primary">{{ \App\Page::count() }}</span></a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Blog <span class="float-right badge badge-primary">{{ \App\Entry::count() }}</span></a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{route('category.index')}}" class="">Categorias</a>
                </li>
                <li>
                    <a href="{{route('entry.index')}}" class="">Entradas</a>
                </li>
                <li>
                    <a href="{{route('entry.create')}}" class="">Nueva Entrada</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{route('menu.index')}}" class="">Menus<span class="float-right badge badge-primary">{{ count(DB::table('menus')->get())}}</span></a>
            
        </li>

        
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Eventos<span class="float-right badge badge-primary">{{ \App\Event::count() }}</span></a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{route('events.calendar')}}" class="">Calendario</a>
                </li>
                <li>
                    <a href="{{route('event.index')}}" class="">Lista</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('album.index')}}" class="">Albumes<span class="float-right badge badge-primary">{{ \App\Album::count() }}</span></a>
        </li>

        
        <li>
            <a href="{{route('mes.index')}}" class="">Cielo del Mes</a>
        </li>
    </ul>

</nav>