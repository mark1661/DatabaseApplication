var resultsArray_20172018 = [];
var resultsArrayCounterForNav_20172018 = 0;
var resultsArrayCounter_20172018 = 0;
var imgBaseUrl = "https://image.tmdb.org/t/p/original";

function GetViaAjax()
{
  var htmlElement = "<div>";
  if(typeof XDomainRequest == "undefined")
  {
  	XDomainRequest = function()
  	{
  		try
  		{
  			return new XMLHttpRequest();
  		}
  		catch(e)
  		{

  		}
  		try
  		{
  			return new ActiveXObject("Msxml2.XMLHTTP.6.0");
  		}
  		catch(e)
  		{

  		}
  		try
  		{
  			return new ActiveXObject("Msxml2.XMLHTTP.3.0");
  		}
  		catch(e)
  		{

  		}
  		try
  		{
  			return new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		catch(e)
  		{
  			throw new Error("XHR/XDR unsupported");
  		}
  	}
  }

  var xdr = new XDomainRequest();
  xdr.open("GET", "https://api.themoviedb.org/3/movie/popular?api_key=f1ce7cc87ef47cb9268f4c68547778cb&language=en-US&page=1", true);
  xdr.send();
  xdr.onload = function()
  {
    var txt = xdr.responseText;
    var JsonDoc = JSON.parse(txt);
    var resultsArray = JsonDoc.results;

    for(var counter = 0; counter < resultsArray.length; counter++)
    {
      var releaseDate = resultsArray[counter].release_date;

      if(releaseDate.includes("2018") || releaseDate.includes("2017"))
      {
        resultsArray_20172018[resultsArrayCounter_20172018] = resultsArray[counter];
        resultsArrayCounter_20172018++;
      }
    }

    var backgroundImageUrl = resultsArray_20172018[0].backdrop_path;
    var imgSource = resultsArray_20172018[0].poster_path;
    var imgElement = imgBaseUrl + imgSource;

    htmlElement += "<img id='imgElement' src=\"" + imgElement + "\" width='200px' height='300px' style='border: 3px solid white'>" + "</img>";
    htmlElement += "<br/>";
    htmlElement += "<b style='color: white'>Release Date: </b>" + "<p style='color: white' id='releaseDate'>" + resultsArray_20172018[0].release_date + "</p>"
    htmlElement += "<b style='color: white'>Average Vote: </b>" + "<p style='color: white' id='averageVote'>" + resultsArray_20172018[0].vote_average + "</p>"
    htmlElement += "<b style='color: white'>Movie Title: </b>" + "<p style='color: white' id='movieTitle'>" + resultsArray_20172018[0].title + "</p>" + "</div>";

    document.getElementById("container").style.backgroundImage ="url(\"" + imgBaseUrl + backgroundImageUrl + "\")";
    document.getElementById("jumbotronBackGround").style.backgroundImage = "url(\"" + imgBaseUrl + backgroundImageUrl + "\")";
    document.getElementById("jumbotronBackGround").style.backgroundSize = "cover";
    document.getElementById("showResults").innerHTML = htmlElement;
  }
}

function nextTopMovie()
{
  if(resultsArrayCounterForNav_20172018 >= resultsArray_20172018.length - 1)
  {
    resultsArrayCounterForNav_20172018 = 0;
  }
  else
  {
    resultsArrayCounterForNav_20172018++;
  }

  changeJumbotron();
}

function previousTopMovie()
{
  if(resultsArrayCounterForNav_20172018 <= 0)
  {
    resultsArrayCounterForNav_20172018 = resultsArray_20172018.length - 1;
  }
  else
  {
    resultsArrayCounterForNav_20172018--;
  }
  changeJumbotron();
}

function changeJumbotron()
{
  var backgroundImageElement = document.getElementById("jumbotronBackGround");
  var imgElement = document.getElementById("imgElement");
  var releaseDateElement = document.getElementById("releaseDate");
  var averageVoteElement = document.getElementById("averageVote");
  var movieTitleElement = document.getElementById("movieTitle");
  var container = document.getElementById("container");

  imgElement.src = imgBaseUrl + resultsArray_20172018[resultsArrayCounterForNav_20172018].poster_path;
  backgroundImageElement.style.backgroundImage = "url(\"" + imgBaseUrl + resultsArray_20172018[resultsArrayCounterForNav_20172018].backdrop_path + "\")";
  container.style.backgroundImage = "url(\"" + imgBaseUrl + resultsArray_20172018[resultsArrayCounterForNav_20172018].backdrop_path + "\")";
  releaseDateElement.innerHTML = resultsArray_20172018[resultsArrayCounterForNav_20172018].release_date;
  averageVoteElement.innerHTML = resultsArray_20172018[resultsArrayCounterForNav_20172018].vote_average;
  movieTitleElement.innerHTML = resultsArray_20172018[resultsArrayCounterForNav_20172018].title;

}
