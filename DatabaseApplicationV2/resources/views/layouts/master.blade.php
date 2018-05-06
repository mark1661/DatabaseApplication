<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MyMovieList</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/currentPlayingMovies.js" type="text/javascript"></script>
    <script src="/js/topmovies.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div id="container">
      @include('layouts.navbar')
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
  </div>
</html>
