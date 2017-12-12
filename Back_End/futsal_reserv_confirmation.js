
function pageLoad(){
	alert("hi");
	document.getElementById("notice_checked").onchange = show_hidden;
}

window.onload = pageLoad;

function show_hidden(){

	var notice = document.getElementById("notice_checked");
	var versus = document.getElementById("notice_on");
	if(notice.checked === true){
		versus.style.visibility = "visible";
		notice_required();
	}
	else{

		versus.style.visibility = "hidden";
		notice_required();

	}
}

function notice_required(){

	if(document.getElementById("notice_checked").checked == true){
		document.getElementById("notice_home").required = true;
		document.getElementById("notice_away").required = true;

	}
	else{
		document.getElementById("notice_home").required = false;
		document.getElementById("notice_away").required = false;


	}

}
