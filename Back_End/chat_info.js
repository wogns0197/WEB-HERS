window.onload = function(){
    document.getElementById("chat_info1").onclick = foo1;
    document.getElementById("chat_info2").onclick = foo2;
    document.getElementById("chat_info2").onclick = foo3;
    document.getElementById("chat_info2").onclick = foo4;
    document.getElementById("chat_info2").onclick = foo5;    
}
function foo1(){
    document.getElementById("send_time").value = document.getElementById("time_info1").value;
}
function foo2(){
    document.getElementById("send_time").value = document.getElementById("time_info2").value;
}
function foo3(){
    document.getElementById("send_time").value = document.getElementById("time_info3").value;
}
function foo4(){
    document.getElementById("send_time").value = document.getElementById("time_info4").value;
}
function foo5(){
    document.getElementById("send_time").value = document.getElementById("time_info5").value;
}