
window.onload = function(){
  var lookupbtn = document.getElementById('lookup');
  var lookcitiesbtn = document.getElementById('lookupcities')
  var search = document.getElementById('country');
  var result = document.getElementById('result');

  lookupbtn.addEventListener("click", function(){

    var query = search.value.trim();
    const httpRequest = new XMLHttpRequest();
    var url = "world.php";
    url += "?country=" + encodeURIComponent(query);
  
    if (query){
      url += "&lookup=" + "";
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

  lookcitiesbtn.addEventListener("click", function(){
    var query2 = search.value.trim();
    const httpRequest = new XMLHttpRequest();
    var url = "world.php";
    url += "?country=" + encodeURIComponent(query2);

    if (query2){
      url += "&lookup=" + "cities";
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
