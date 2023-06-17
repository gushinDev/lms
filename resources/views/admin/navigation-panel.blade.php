<nav id="sidebarMenu" class="bg-dark col-lg-2" style="height: 100vh">
    <h2 class="text-white mt-3 mb-3"><a class="text-reset text-decoration-none" href="{{route('main')}}">Main page</a></h2>
    <hr style="color: white">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('users.index')}}"
               class="nav-link text-white "
               aria-current="page">
                Users
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('export.index')}}"
               class="nav-link text-white "
               aria-current="page">
                Exports
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.articles.index')}}"
               class="nav-link text-white "
               aria-current="page">
                Articles
            </a>
        </li>
        <li class="nav-item">
            @include('admin.tools.pomodoro')
        </li>
    </ul>
</nav>
