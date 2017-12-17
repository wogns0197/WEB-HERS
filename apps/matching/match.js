
window.onload = function(){
  var message = document.getElementsByClassName("messages");
  for(var i = 0; i < message.length; i++){

    message[i].onclick = showMg;

  }
}


function showMg(event){
  var mg = this.childNodes[0].value;
  var mginput = document.getElementById("mgarea");
  mginput.value = mg;
}
