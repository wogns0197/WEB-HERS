var flag=false;
window.onload = function(){
    document.getElementById("button").onclick = check;
    document.getElementsByClassName("time").onclick = check2;
};

function check2(){
    alert("aa");
    flag=true;
}
function check(event){
    if(!flag){
        alert("시간을 입력해주세요");
        event.stop();
        return false;
    }
}