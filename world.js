
window.onload = function(){
  var lookupbtn = document.getElementById('lookup');
  var lookcitiesbtn = document.getElementById('lookupcities')
  var search = document.getElementById('country');

  lookupbtn.addEventListener("onclick", function(){

    var query = search.value.trim();
    const httpRequest = new XMLHttpRequest();
    var url = "world.php";
    url += "?country=" + encodeURIComponent(country);
  
    httpRequest.onreadystatechange = function(){
      if (httpRequest.readyState == XMLHttpRequest.DONE){
        if (httpRequest.status == 200){
          result.innerHTML = httpRequest.responseText;
        }else{
          result.innerHTML = "Error: Problem with request";
        }
      }
    }
  
    httpRequest.open('GET', url);
    httpRequest.send();
  
  
  })

  lookcitiesbtn.addEventListener("onclick", function(){
    var query2 = search.value.trim();
    const httpRequest = new XMLHttpRequest();
    var url = "world.php";
    url += "?country=" + encodeURIComponent(country);

    if (type==='cities'){
      url += "&lookupcities";
    }
  
    httpRequest.onreadystatechange = function(){
      if (httpRequest.readyState == XMLHttpRequest.DONE){
        if (httpRequest.status == 200){
          result.innerHTML = httpRequest.responseText;
        }else{
          result.innerHTML = "Error: Problem with request";
        }
      }
    }
  
    httpRequest.open('GET', url);
    httpRequest.send();
  })
}
