<nav class="navbar navbar-expand navbar-white navbar-light ">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('user').submit();">
                {{ __('Kullanıcılar') }}
            </a>
            <form id="user" action="{{ route('get-user') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a class="dropdown-item"
               onclick="event.preventDefault();
                                                     document.getElementById('task').submit();">
                {{ __('Görevler') }}
            </a>
            <form id="task" action="{{ route('get-task') }}" method="get" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
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
</nav>
