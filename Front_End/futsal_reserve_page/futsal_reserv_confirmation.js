
function pageLoad(){
	document.getElementById("notice_checked").onclick = show_hidden;

}

window.onload = pageLoad;

function show_hidden(){
	var notice = document.getElementById("notice_checked");
	var versus = document.getElementById("notice_on");
	if(notice.checked === true){
		versus.style.visibility = "visible";
	}
	else{
		versus.style.visibility = "hidden";
	}
}