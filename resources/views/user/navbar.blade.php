<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-2">
                <div id="fh5co-logo"><a href="index.html">PT Meksiko</a></div>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-2">
                <ul>
                    <li class="search">
                        <div class="input-group">
                          <input type="text" placeholder="Search..">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                          </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-4 text-right d-none d-md-block menu-2">
                <ul>
                    <li class="shopping-cart">
                        <a class="cart icon-view-cart" data-bs-toggle="modal" data-bs-target="#cartModal"><span><i class="icon-shopping-cart"></i></span></a></li>
                    <li class="user">
                        @guest
                            <a href="{{ route('login') }}">Log In</a>
                        @else
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="icon-user"></i> Log Out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</nav>