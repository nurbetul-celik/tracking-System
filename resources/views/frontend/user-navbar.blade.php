<nav class="navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('get-user-login')}}" class="nav-link">Anasayfa</a>
        </li>

        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('get-message')}}" class="nav-link">Mesajlar</a>
            </li>
        </ul>
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


