<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">MyMovieList</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/movies">Movies</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            @if(Auth::check() == false)
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Sign Up</a>
              </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/user/{id}/viewuserprofile">Hello! {{Auth::user()->username }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>

            <li class="nav-item">
              <!--
              note, methods still with within quotations"
              -->
              <a class="nav-link" href="/viewuserprofile/{{Auth::user()->user_id}}">Profile</a>
            </li>
            @if(Auth::user()->status != 'ADMIN')
            <li class="nav-item">
              <a class="nav-link" href="/support">Support</a>
            </li>
            @endif
              @if(Auth::user()->status == 'ADMIN')
              <li class="nav-item">
                <a class="nav-link" href="/admin/index">Administrator</a>
              </li>
              @endif
            </li>
            @endif
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" id="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
</nav>
<br/>
