window.onload = function() {
    document.getElementById("q1").onclick = changeColor;
    document.getElementById("q2").onclick = changeColor2;

};
function changeColor() {
    var q1 = document.getElementById("q1");
    var q2 = document.getElementById("q2");	
    var id = document.getElementsByClassName("forgotid");
    var pw = document.getElementsByClassName("forgotpw");
    q1.style.backgroundColor = "#D8D8D8";
    q2.style.backgroundColor = "#F2F2F2";
    
    q2.style.color = '#A4A4A4';
    q1.style.color = '#2E2E2E'
    pw[0].style.display = "none";
    id[0].style.display = "block";


}
function changeColor2() {
    var q1 = document.getElementById("q1");
    var q2 = document.getElementById("q2");
    var id = document.getElementsByClassName("forgotid");
    var pw = document.getElementsByClassName("forgotpw");
    q1.style.backgroundColor = "#F2F2F2";
    q2.style.backgroundColor = "#D8D8D8";
    q1.style.color = '#A4A4A4';
    q2.style.color = '#2E2E2E'
    id[0].style.display = "none";
    pw[0].style.display = "block";
}