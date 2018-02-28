$(document).ready(function () {
  var path = window.location.href

  if (path != "http://localhost:3000/#/") {
    $('#subMenu').addClass('interiorNav');
  }
  else{
    $('#subMenu').removeClass('removeClass');    
  }
});