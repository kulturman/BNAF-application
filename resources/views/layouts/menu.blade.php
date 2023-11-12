<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-speedometer"></use>
        </svg>
        Tableau de bord
    </a>
</li>

<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-user"></use>
        </svg>
        <span>Gestion des utilisateurs</span>
    </a>
</li>

<li class="nav-item {{ Request::is('slides*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('slides.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-view-column"></use>
        </svg>
        <span>Gestion des @lang('models/slides.plural')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('siteConfigs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('siteConfigs.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg>
        <span>@lang('models/siteConfigs.plural')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('articles.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-newspaper"></use>
        </svg>
        <span>Gestion des @lang('models/articles.plural')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('flashInfos.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-newspaper"></use>
        </svg>
        <span>Informations flash</span>
    </a>
</li>

<li class="nav-item {{ Request::is('stats*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('stats.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg>
        <span>Gestion des @lang('models/stats.plural')</span>
    </a>
</li>

<li class="nav-group">
    <a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-report-slash"></use>
        </svg>
        Gestion des alertes
    </a>
    <ul class="nav-group-items">
        <li class="nav-item {{ Request::is('reports.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reports.index') }}">
                <span>Toutes les alertes</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('reports.me') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reports.me') }}">
                <span>Vos alertes</span>
            </a>
        </li>
    </ul>
</li>