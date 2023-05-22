<ul class="nav nav-pills flex-column mb-auto">
    @foreach(collect(Cache::get('navigation:bar'))->sortBy('order_number') as $item)
        <li class="nav-item">
            <a href="{{route($item->route_name)}}"
               class="nav-link @if($item->route_name === Route::currentRouteName()) active @else text-white @endif"
               aria-current="page">
                {{$item->menu_item_name}}
            </a>
        </li>
    @endforeach
</ul>
