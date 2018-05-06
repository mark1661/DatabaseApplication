@section('sidebar')
    <div class="jumbotron" id="jumbtronheading" style="background-color: #92a8d1; border: 3px solid white" >
      <h3>Movies Currently Playing in Cinemas</h3>
      <div id="currentMovies">
      </div>
      <script type="text/javascript">
      getCurrentMovies();
      </script>
    </div>
  @show
