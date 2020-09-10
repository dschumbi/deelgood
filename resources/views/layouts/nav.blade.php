<header class="header clearfix">
        <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          @guest
              <div class="nav-item">
                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              </div>
              <div class="nav-item">
                <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              </div>
          @else
              <li class="nav-item">
                <a class="nav-link" href="/auctions">Meine Deels</a>
              </li>
              <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->firstname .' '. Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"
                              class="dropdown-item">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                      <li>
                        <a href="{{ route('edit') }}"
                            class="dropdown-item">
                            Profil bearbeiten
                        </a>
                      </li>
                  </ul>
              </li>
          @endguest
        </ul>
      </nav>
      <a class="navbar-brand" rel="home" href="/" title="Buy Sell Rent Everyting">
          {{ HTML::image('img/logo_rgb.jpg', 'Deelgood', array('class' => 'img-responsive2', 'style' => 'max-width:160px')) }}
      </a>

      </header>

