<!-- Desktop -->
<ul id="dropdown1" class="dropdown-content">
  <li {!! Request::routeIs('dataemas.index') ? 'class="active"' : '' !!}><a href="{{ route('dataemas.index') }}">Data Emas</a></li>
  <li class="divider"></li>
  <li {!! Request::routeIs('rlb.index') ? 'class="active"' : '' !!}><a href="{{ route('rlb.index') }}">RLB</a></li>
</ul>

<div class="navbar-fixed">
  <nav class="orange darken-1">
    <div class="nav-wrapper container">
      <a href="#!" class="brand-logo">Skripsi</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li {!! Request::routeIs('home') ? 'class="active"' : '' !!}><a href="{{ route('home') }}">Home</a></li>
        <li {!! Request::routeIs('dataemas.index') || Request::routeIs('rlb.index') ? 'class="active"' : '' !!}><a class="dropdown-trigger" href="#!" data-target="dropdown1">Data<i class="material-icons right">arrow_drop_down</i></a></li>
        @auth
          <li {!! Request::routeIs('prediksi.index') ? 'class="active"' : '' !!}><a href="{{ route('prediksi.index') }}">Prediksi</a></li>
        @endauth
        <li {!! Request::routeIs('about.index') ? 'class="active"' : '' !!}><a href="{{ route('about.index') }}">About</a></li>
        @guest
          <li {!! Request::routeIs('login') ? 'class="active"' : '' !!}><a href="{{ route('login') }}">Login</a></li>
          <li {!! Request::routeIs('register') ? 'class="active"' : '' !!}><a href="{{ route('register') }}">Register</a></</li>
        @else
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
        @endguest
      </ul>
    </div>
  </nav>
</div>

<!-- mobile -->
<ul id="dropdown2" class="dropdown-content">
  <li {!! Request::routeIs('dataemas.index') ? 'class="active"' : '' !!}><a href="{{ route('dataemas.index') }}">Data Emas</a></li>
  <li class="divider"></li>
  <li {!! Request::routeIs('rlb.index') ? 'class="active"' : '' !!}><a href="{{ route('rlb.index') }}">RLB</a></li>
</ul>

<!-- Mobile Vers. -->
<ul class="sidenav" id="mobile-demo">
  <li {!! Request::routeIs('home') ? 'class="active"' : '' !!}><a href="{{ route('home') }}">Home</a></li>
  <li {!! Request::routeIs('dataemas.index') || Request::routeIs('rlb.index') ? 'class="active"' : '' !!}><a class="dropdown-trigger" href="#!" data-target="dropdown2">Data<i class="material-icons right">arrow_drop_down</i></a></li>
  @auth
    <li {!! Request::routeIs('prediksi.index') ? 'class="active"' : '' !!}><a href="{{ route('prediksi.index') }}">Prediksi</a></li>
  @endauth
  <li {!! Request::routeIs('about.index') ? 'class="active"' : '' !!}><a href="{{ route('about.index') }}">About</a></li>
  @guest
    <li {!! Request::routeIs('login') ? 'class="active"' : '' !!}><a href="{{ route('login') }}">Login</a></li>
    <li {!! Request::routeIs('register') ? 'class="active"' : '' !!}><a href="{{ route('register') }}">Register</a></</li>
  @else
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">Logout</a>
    </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
  @endguest
</ul>