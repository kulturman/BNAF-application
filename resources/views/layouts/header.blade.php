<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('sprites/free.svg') }}#cil-menu"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('sprites/free.svg') }}#full"></use>
            </svg>
        </a>
        <ul class="header-nav d-none d-md-flex">
            @yield('header-links')
        </ul>
        <ul class="header-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-bell"></use>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-list-rich"></use>
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                    </svg>
                </a>
            </li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md">
                        <i class="cis-accessible"></i>
                        <img class="avatar-img" src="{{ asset('frontend/images/logo_bnaf.jpg') }}" alt="user@email.com">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Mon compte</div>
                    </div>
                    <a class="dropdown-item" href="{{ route('users.change-password') }}">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
                        </svg> Changer de mot de passe
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-account-logout"></use>
                        </svg> Déconnexion
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><span>Accueil</span></a>
                </li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
</header>
