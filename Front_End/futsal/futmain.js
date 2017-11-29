var object, svgDocument;
var futsal_modal;
var soccer_modal;
var stadium_modal;
var close;
var futsal_a_btn, futsal_b_btn, soccer_btn, stadium_btn;
var futsal,soccer,stadium;

window.onload = function(){
	futsal_modal = document.getElementById("futsal_modal");
	soccer_modal = document.getElementById("soccer_modal");
	stadium_modal = document.getElementById("stadium_modal");
	futsal_exit = document.getElementsByClassName("close")[0];
	soccer_exit = document.getElementsByClassName("close")[1];
	stadium_exit = document.getElementsByClassName("close")[2];
	futsal_a_btn = document.getElementById("futsal_A");
	futsal_b_btn = document.getElementById("futsal_B");
	soccer_btn = document.getElementById("soccer");
	stadium_btn = document.getElementById("stadium");

	object = document.getElementById("ericamap");
	svgDocument = object.contentDocument;
	futsal = svgDocument.getElementById("futsal");
	soccer = svgDocument.getElementById("soccer");
	stadium = svgDocument.getElementById("stadium");
	futsal.onclick = showFutsal;
	soccer.onclick = showSoccer;
	stadium.onclick = showStadium;

	futsal_exit.onclick = close;
	soccer_exit.onclick = close;
	stadium_exit.onclick = close;

	futsal_a_btn.onclick = toFutsalA;
	futsal_b_btn.onclick = toFutsalB;
	soccer_btn.onclick = toSoccer;
	stadium_btn.onclick = toStadium;

}

window.onclick = function(event) {
    if (event.target == futsal_modal) {
        futsal_modal.style.display = "none";
    }
    if (event.target == soccer_modal) {
        soccer_modal.style.display = "none";
    }
    if (event.target == stadium_modal) {
        stadium_modal.style.display = "none";
    }

}
  
function close(){
	futsal_modal.style.display = "none";
	soccer_modal.style.display = "none";
	stadium_modal.style.display = "none";
}

function showFutsal(){

	futsal_modal.style.display = "block";

}

function showSoccer(){
	soccer_modal.style.display = "block";
}

function showStadium(){
	stadium_modal.style.display = "block";

}

function toFutsalA(){
	location.href = "../../Back_end/futsal_reserv_test_2.php?where=풋살장A";
}

function toFutsalB(){
	location.href = "../../Back_end/futsal_reserv_test_2.php?where=풋살장B";
}

function toSoccer(){
	location.href = "../../Back_end/futsal_reserv_test_2.php?where=잔디구장";
}

function toStadium(){
	location.href = "../../Back_end/futsal_reserv_test_2.php?where=대운동장";
}
