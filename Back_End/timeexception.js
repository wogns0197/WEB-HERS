var flag=false;
window.onload = function(){
    document.getElementById("button").onclick = check;
    var times = document.getElementsByClassName("time");
    for(var i = 0; i< times.length; i++){
    	times[i].onclick = check2;
    }
};

function check2(){
    flag=true;
}

function check(event){
    if(!flag){
        alert("시간을 입력해주세요");
        event.stop();
        return false;
    }
}