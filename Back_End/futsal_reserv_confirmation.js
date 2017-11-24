
function pageLoad(){
	document.getElementById("notice_checked").onchange = show_hidden;

}

window.onload = pageLoad;

function show_hidden(){
	var notice = document.getElementById("notice_checked");
	var versus = document.getElementById("notice_on");
	if(notice.checked === true){
		versus.style.display = "block";
	}
	else{
		versus.style.display = "none";
	}
}