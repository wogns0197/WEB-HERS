window.onload = function(){
    document.getElementById("chat_info1").onclick = foo1;
    document.getElementById("chat_info2").onclick = foo2;
}
function foo1(){
    document.getElementById("send_time").value = document.getElementById("time_info1").value;
}
function foo2(){
    alert(document.getElementById("time_info2").value);
}