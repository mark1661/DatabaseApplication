@extends('layouts.master')
@section('content')
  <section class="jumbotron text-center" id="jumbotronBackGround" style="min-height: 700px">
    <div class="container" style="width: 800px">
      <h1 class="jumbotron-heading" style="color: white; margin-right: 100px">Top Movies of 2017-2018</h1>
      <hr/>
      <div id="divForPreviousButton" style="margin-right: 20px; float: left; width: 250px">
        <a class="btn btn-danger" onclick="previousTopMovie();">Previous</a>
      </div>
      <div id="showResults" style="float: left; margin-left: -35px" width="200px" height="300px">
      </div>
      <div id="divForNextButton" style="float: left; width: 200px">
        <a class="btn btn-success" onclick="nextTopMovie();">Next</a>
      </div>
    </div>
  </section>
  <!--
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @include('Movies.movie')
        @include('layouts.ticket_submit')
      </div>
    </div>
  </div>
  -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
<script src="../../../../assets/js/vendor/holder.min.js"></script>

@endsection

@section('sidebar')
@parent
@endsection
