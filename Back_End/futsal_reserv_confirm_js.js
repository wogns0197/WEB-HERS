window.onload = function(){
	document.getElementById("notice_checked").onclick = notice_required;
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