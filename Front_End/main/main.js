window.onload = function() {
  $("menuicon").onclick = showmenu;

};

function showmenu() {
  $("menubar").style.visibility = "visible";
  $("menuicon").style.visibility = "hidden";
}
