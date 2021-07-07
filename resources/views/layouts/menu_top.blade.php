<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">             
            @if(user_web() and user_web()->isSuperOrAdmin())
            <li class="nav-item  user-menu">
               <a href="{{ route('backpack.dashboard') }}" class="nav-link dropdown-toggle">     
                    <span class="d-none d-md-inline">Espace d'administration</span> 
                </a>
            </li>
            @endif
            <li class="nav-item dropdown user-menu">
                @if(user_web())
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
<!--                    <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                         class="user-image img-circle elevation-2" alt="User Image">-->
                    <span class="d-none d-md-inline">{{ Auth::user()->name }} {{ Auth::user()->firstname }}</span>
                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                </a>
                @endif
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
<!--                        <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                             class="img-circle elevation-2"
                             alt="User Image">-->
                        @if(user_web())
                        <p>   
                            {{ Auth::user()->name }} {{ Auth::user()->firstname }}
<!--                            <small>Exportateur</small>-->
                            <small>{{ Auth::user()->email }}</small>
                        </p>
                        @endif
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Se Déconnecter
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            
        </ul>
    </nav>