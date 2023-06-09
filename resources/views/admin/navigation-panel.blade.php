<nav id="sidebarMenu" class="bg-dark col-lg-2" style="height: 100vh">
    <h2 class="text-white mt-3 mb-3"><a class="text-reset text-decoration-none" href="{{route('main')}}">Main page</a>
    </h2>
    <hr style="color: white">
    <ul class="nav nav-pills flex-column mb-auto">
        @include('admin.components.navigation-item', ['route' => 'users.index', 'navItemName' => 'Users'])
        @include('admin.components.navigation-item', ['route' => 'export.index', 'navItemName' => 'Exports'])
        @include('admin.components.navigation-item', ['route' => 'admin.posts.index', 'navItemName' => 'Posts'])
        @include('admin.components.navigation-item', ['route' => 'admin.posts.create', 'navItemName' => 'Create post'])
        <li class="nav-item">
            @include('admin.tools.pomodoro')
        </li>
    </ul>
</nav>
