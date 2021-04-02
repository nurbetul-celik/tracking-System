<nav class=" navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('home-page').submit();">
                {{ __('Anasayfa') }}
            </a>
            <form id="home-page" action="{{ route('get-supervisor-login') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('task').submit();">
                {{ __('Görevler') }}
            </a>
            <form id="task" action="{{ route('get-task-supervisor') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
            <li class=" dropdown-item">
                {{Auth::user()->name}}
            </li>
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('logout').submit();">
                {{ __('Çıkış Yap') }}
            </a>
            <form id="logout" action="{{ route('get-logout') }}" method="get" style="display: none;">
                @csrf
            </form>
        </ul>
    </ul>
</nav>
