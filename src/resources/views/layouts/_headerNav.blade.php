<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          MAYOLER
      </a>
      <ul class="navbar-nav ml-auto d-md-flex d-none">
          @guest
          @if (Route::has('front.login'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('front.login') }}">Login</a>
          </li>
          @endif
          @if (Route::has('front.register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('front.register') }}">Register</a>
          </li>
          @endif
          @else
              @can('admin')
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>管理</a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('back.users.index') }}">Users</a>
                      </div>
                  </li>
              @endcan
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.with_mayos.create') }}">魅力を伝える(投稿)</a>
              </li>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('front.users.show', Auth::id()) }}">Profile</a>
                      <a class="dropdown-item" href="{{ route('front.logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
  </div>
</nav>