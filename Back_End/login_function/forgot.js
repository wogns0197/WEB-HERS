// window.onload = function() {
//     document.getElementById("q1").onclick = changeColor;
//     document.getElementById("q2").onclick = changeColor2;
//
// };
// function changeColor() {
//     var q1 = document.getElementById("q1");
//     var q2 = document.getElementById("q2");
//     var id = document.getElementsByClassName("forgotid");
//     var pw = document.getElementsByClassName("forgotpw");
//     q1.style.backgroundColor = "#D8D8D8";
//     q2.style.backgroundColor = "#F2F2F2";
//
//     q2.style.color = '#A4A4A4';
//     q1.style.color = '#2E2E2E'
//     pw[0].style.display = "none";
//     id[0].style.display = "block";
//
//
// }
// function changeColor2() {
//     var q1 = document.getElementById("q1");
//     var q2 = document.getElementById("q2");
//     var id = document.getElementsByClassName("forgotid");
//     var pw = document.getElementsByClassName("forgotpw");
//     q1.style.backgroundColor = "#F2F2F2";
//     q2.style.backgroundColor = "#D8D8D8";
//     q1.style.color = '#A4A4A4';
//     q2.style.color = '#2E2E2E'
//     id[0].style.display = "none";
//     pw[0].style.display = "block";
// }

window.onload = function() {

  console.log("hi");

  $("bottom").onclick = function(){
    new Ajax.Request("find_id.php",{
      method: "get",
      parameters: {name : $("name").value,
                   sid  : $("s_id").value},
      onSuccess: loadIds,
      onFailure: ajaxFailure,
      onException: ajaxFailure
    });
  }
};


function loadIds(ajax) {

  while ($("ids").firstChild) {
    $("ids").removeChild($("ids").firstChild);
  }
  var lists = JSON.parse(ajax.responseText);

  if(lists.idlists.length == 0){
    var input = document.createElement("p");
    input.innerHTML = "아이디를 찾을 수 없습니다. 이름 또는 학번을 확인해주세요.";
    $("ids").appendChild(input);
  }
  for(var i = 0; i < lists.idlists.length; i++){

    var input = lists.idlists[i].id;
    var li = document.createElement("li");
    li.innerHTML = input;

    $("ids").appendChild(li);

  }
}

function ajaxFailure(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
