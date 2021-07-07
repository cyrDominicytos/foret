<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->


{{-- Dashboard --}}
<!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>-->

{{-- Users, Roles, Permissions --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-group"></i> {{ __('Authentification') }}</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Tous les Utilisateurs</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('forestier') }}"><i class="nav-icon la la-user"></i> <span>Forestiers</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('intervenant') }}"><i class="nav-icon la la-user"></i> <span>Autres Intervenants</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('usager') }}"><i class="nav-icon la la-user"></i> <span>Usagers</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-group"></i> <span>Roles</span></a></li>
        <!--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>-->
    </ul>
</li>

{{-- Configuration --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs"></i>{{ __('Configuration') }}</a>
    <ul class="nav-dropdown-items">
        <li class=nav-item><a class=nav-link href="{{ backpack_url('pay') }}"><i class="nav-icon la la-flag"></i> <span>{{ __('Pays') }}</span></a></li>
        <!--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('etat') }}'><i class='nav-icon la la-flag-o'></i> {{ __('État') }}</a></li>-->
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('departement') }}'><i class='nav-icon la la-flag-o'></i> {{ __('Départements') }}</a></li>
        <!--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('ville') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Ville') }}</a></li>-->
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('commune') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Communes') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('poste') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Postes') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('espece_produit') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Especes produit') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('type_produit') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Types produit') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('grade') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Grade') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('parametre') }}'><i class='nav-icon la la-flag-checkered'></i> {{ __('Paramètres') }}</a></li>
    </ul>
</li>

{{-- Système --}}
@if(user_web() and user_web()->isSuper())
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-server"></i>{{ __('Système') }}</a>
    <ul class="nav-dropdown-items">
        <li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> Backups</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>
        <!--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> Settings</a></li>-->
    </ul>
</li>
@endif
<!--{{-- Système de Gestion de contenu --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-server"></i>{{ __('CMS') }}</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-file-o'></i> <span>Pages</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('menu-item') }}'><i class='nav-icon la la-list'></i> <span>Menu</span></a></li>

        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i>News</a>
            <ul class="nav-dropdown-items">
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('article') }}"><i class="nav-icon la la-newspaper-o"></i> Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-list"></i> Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-tag"></i> Tags</a></li>
            </ul>
        </li>
    </ul>
</li>-->

