<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MyMovieList</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body>
    @include('layouts.navbar')
    @include('layouts.navbarHeader')
    <main role="main">
      <div class="container">
        @if(Request::is('/'))
        @include('layouts.showcase')
        @endif
        <div class="row">
          <div class="col-md-8 col-lg-8">
            @include('layouts.messages')
            @yield('content')
          </div>
          <div class="col-md-4 col-lg-4">
            @include('layouts.sidebar')
          </div>
        </div>
      </div>
    </main>
    @include('layouts.footer')
  </body>
</html>
