var object;
var svgDocument;
var futsal;
var soccer;
var stadium;

"use strict";

window.onload = function(){
  object = document.getElementById("ericamap");
  svgDocument = object.contentDocument;
  futsal = svgDocument.getElementById("futsal_x5F_selector");
  soccer = svgDocument.getElementById("soccer_x5F_selector");
  stadium = svgDocument.getElementById("stadium_x5F_selector");
  futsal.onclick = show_futsal;
  soccer.onclick = show_soccer;
  stadium.onclick = show_stadium;


}


function show_futsal(){
    $("#futsal_modal").modal();
}

function show_soccer(){
    $("#soccer_modal").modal();
}

function show_stadium(){
  $("#stadium_modal").modal();
}
