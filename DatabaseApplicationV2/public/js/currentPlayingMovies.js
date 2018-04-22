var results = [];
var resultsCounter = 0;
var htmlElement = "";

function getCurrentMovies()
{
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
  xdr.open("GET", "https://api.themoviedb.org/3/movie/now_playing?api_key=f1ce7cc87ef47cb9268f4c68547778cb&language=en-US&page=1", true);
  xdr.send();
  xdr.onload = function()
  {
    var txt = xdr.responseText;
    var JsonDoc = JSON.parse(txt);
    var contentFromJsonDocArray = JsonDoc.results;

    for(var counter = 0; counter < contentFromJsonDocArray.length; counter++)
    {
      var releaseDate = contentFromJsonDocArray[counter].release_date;
      var monthOfMarch = "2018-03";
      var monthOfApril = "2018-04";
      if(releaseDate.includes(monthOfMarch) || releaseDate.includes(monthOfApril))
      {
        results[resultsCounter] = contentFromJsonDocArray[counter];
        resultsCounter++;
      }
    }
    htmlElement += "<ol>";
    for(var counter2 = 0; counter2 < results.length; counter2++)
    {
      htmlElement += "<li>" + results[counter2].title + "</li>";
    }
    htmlElement += "</ol>"
    document.getElementById("currentMovies").innerHTML = htmlElement;
  }
}
