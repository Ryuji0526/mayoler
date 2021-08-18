<nav class="col-3 d-block bg-light sidebar">
  <div class="sidebar-sticky">
      <ul class="nav flex-column">
          @guest
              @if (Route::has('front.login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('/') }}">HOME</a>
                  </li>
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
              <h6 class="sidebar-heading mx-3 mt-3">{{ Auth::user()->name }}</h6>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/') }}">HOME</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.with_mayos.create') }}">魅力を伝える(投稿)</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.users.show', Auth::id()) }}">Profile</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.logout') }}"
                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
              </li>
          @endguest
      </ul>
  </div>
</nav>