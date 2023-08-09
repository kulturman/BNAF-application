<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-speedometer"></use>
        </svg> Tableau de bord
    </a>
</li>
<li class="nav-group">
    <a class="nav-link nav-group-toggle cil-energy" href="#">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg> Administration </a>
    <ul class="nav-group-items">
        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                Gestion des utilisateurs
            </a>
        </li>
    </ul>
</li>

<li class="nav-group">
    <a class="nav-link nav-group-toggle cil-energy" href="#">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg> Configurations </a>
    <ul class="nav-group-items">
        <li class="nav-item {{ Request::is('subjects*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subjects.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Matières</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('years*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('years.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>@lang('models/years.plural')</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-group">
    <a class="nav-link nav-group-toggle cil-energy" href="#">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg> Elèves et professeurs </a>
    <ul class="nav-group-items">
        <li class="nav-item {{ Request::is('teachers*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('teachers.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Professeurs</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('students*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('students.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>Elèves</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-group">
    <a class="nav-link nav-group-toggle cil-energy" href="#">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('sprites/free.svg') }}#cil-settings"></use>
        </svg> Gestion des classes</a>
    <ul class="nav-group-items">
        <li class="nav-item {{ Request::is('classrooms*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('classrooms.index') }}">
                <i class="nav-icon icon-cursor"></i>
                <span>@lang('models/classrooms.plural')</span>
            </a>
        </li>
    </ul>
</li>
