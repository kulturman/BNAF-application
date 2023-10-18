<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img class="app-logo" src="{{ asset('frontend/images/logo_bnaf.jpg') }}" alt="user@email.com">
        {{ config('app.name') }}
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        @include('layouts.menu')
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

