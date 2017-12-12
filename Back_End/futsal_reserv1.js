var flag=false;
window.onload = function(){
    var times = document.getElementsByClassName("time");
    for(var i = 0; i< times.length; i++){
        times[i].onclick = time_empty_check;
        times[i].checked = clear(times[i].checked);
    }
    document.getElementById("button2").onclick = button;
    document.getElementById("button1").onclick = button;
    document.getElementById("button1").onclick = setting;
    if(isEmpty(document.getElementById("chat_info0"))){
        document.getElementById("chat_info0").onclick = foo0;        
    }
    if(isEmpty(document.getElementById("chat_info1"))){
        document.getElementById("chat_info1").onclick = foo1;
    }
    if(isEmpty(document.getElementById("chat_info2"))){
        document.getElementById("chat_info2").onclick = foo2;
    }
    if(isEmpty(document.getElementById("chat_info3"))){        
        document.getElementById("chat_info3").onclick = foo3;
    }
    if(isEmpty(document.getElementById("chat_info4"))){
        document.getElementById("chat_info4").onclick = foo4;
    }

};
function isEmpty(val){
    return (val == null) ? false : true;
}

function time_empty_check(){
    flag=true;
}

function button(){
    if(!flag){
        alert("시간을 입력해주세요");
        window.stop();
        return false;
    }
}
function setting(){
    var times = document.getElementsByClassName("time");
    for(var i = 0; i<times.length; i++){
        if(times[i].checked){
            document.getElementById("send_time2").value = times[i].value;
        }
    }
    var population = document.getElementsByClassName("spopulation");
    for(var i = 0; i<population.length; i++){
        if(population[i].selected){
            document.getElementById("spopulation").value = population[i].value;
        }
    }
}

function clear(a){
    if(a){
        return false;
    }
    return a;
}
function foo0(){
    document.getElementById("send_time").value = document.getElementById("time_info0").value;
}
function foo1(){
    document.getElementById("send_time").value = document.getElementById("time_info1").value;
    alert(document.getElementById("time_info1").value);
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