

window.onload = function() {

  console.log("hi");

  $("bottom").onclick = function(){
    new Ajax.Request("find_pw.php",{
      method: "get",
      parameters: {userid : $("userid").value,
                   sid  : $("sid").value},
      onSuccess: loadPws,
      onFailure: ajaxFailure,
      onException: ajaxFailure
    });
  }
};


function loadPws(ajax) {

  while ($("pws").firstChild) {
    $("pws").removeChild($("pws").firstChild);
  }
  var lists = JSON.parse(ajax.responseText);

  if(lists.pwlists.length == 0){
    var input = document.createElement("p");
    input.innerHTML = "비밀번호를 찾을 수 없습니다. 아이디 또는 학번을 확인해주세요.";
    $("pws").appendChild(input);
  }
  for(var i = 0; i < lists.pwlists.length; i++){

    var input = lists.pwlists[i].pw;
    var li = document.createElement("li");
    li.innerHTML = input;

    $("pws").appendChild(li);

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
