<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('acceuil') }}" class="brand-link">
        <img src="/acceuil/images/logo_eaux_forrets_chasses.png"
             alt="eForex"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu_left')
            </ul>
        </nav>
    </div>

</aside>
