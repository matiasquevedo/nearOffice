<!-- Sidebar -->
<div class="bg-light border-right sidebar-admin" id="sidebar-wrapper">
  <div class="sidebar-heading" style="height: 70px;"><span class="align-middle">Tuvi</span></div>
  <div class="list-group list-group-flush px-2">
  	<a href="/home" class="list-group-item list-group-item-action ">Dashboard</a>
    <a href="{{route('board.index',\Auth::user()->commerce->slug)}}" class="list-group-item list-group-item-action ">Mis Mesas <span class="float-right badge badge-primary">{{count(\Auth::user()->commerce->boards)}}</span></a>
    <a href="{{route('category.index',\Auth::user()->commerce->slug)}}" class="list-group-item list-group-item-action ">Categorias<span class="float-right badge badge-primary">{{count(\Auth::user()->commerce->categories)}}</span></a>
    <a href="{{route('product.index',\Auth::user()->commerce->slug)}}" class="list-group-item list-group-item-action ">Mis Productos<span class="float-right badge badge-primary">{{count(\Auth::user()->commerce->products)}}</span></a>
    <a href="#" class="list-group-item list-group-item-action ">Productos</a>
    <a href="#" class="list-group-item list-group-item-action ">Pedidos</a>
  </div>
</div>

<!-- End Sidebar -->