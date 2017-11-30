var flag=false;
window.onload = function(){
    document.getElementById("button").onclick = button;
    var times = document.getElementsByClassName("time");
    for(var i = 0; i< times.length; i++){
        times[i].onclick = time_empty_check;
        times[i].checked = clear(times[i].checked);
    }
};

function time_empty_check(){
    flag=true;
}

function button(event){
    if(!flag){
        alert("시간을 입력해주세요");
        event.stop();
        return false;
    }
}

function clear(a){
    if(a){
        return false;
    }
    return a;
}