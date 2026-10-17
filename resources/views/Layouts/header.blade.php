<header role="banner">
    <nav class="navbar navbar-expand-lg navbar-light" aria-label="Navigation principale">
        <a class="navbar-brand py-0" href="{{route('accueil')}}" title="INTER-GROUPE — Accueil">
            <img id="logo" src="{{asset('img/itg.png')}}" alt="INTER-GROUPE — Cabinet d'ingénierie informatique et formation" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Afficher ou masquer le menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-lg-center">
                @hasSection('menu')
                    @yield('menu')
                @else
                    <li class="nav-item {{ request()->routeIs('accueil') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('accueil')}}" {!! request()->routeIs('accueil') ? 'aria-current="page"' : '' !!}>Accueil</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('presentation') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('presentation')}}" {!! request()->routeIs('presentation') ? 'aria-current="page"' : '' !!}>Présentation</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('formation*') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('formation')}}" {!! request()->routeIs('formation*') ? 'aria-current="page"' : '' !!}>Formations</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('developpement') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('developpement')}}" {!! request()->routeIs('developpement') ? 'aria-current="page"' : '' !!}>Développement</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('contact')}}" {!! request()->routeIs('contact') ? 'aria-current="page"' : '' !!}>Contact</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('fdfp') ? 'active enCours' : '' }}">
                        <a class="nav-link" href="{{route('fdfp')}}" {!! request()->routeIs('fdfp') ? 'aria-current="page"' : '' !!}>Espace FDFP</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
