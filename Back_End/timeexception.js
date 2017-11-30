window.onload = function(){
    document.getElementById("button").onclick = check;
};

function check(){
    var time  = $$("#time");
    alert("check");
    for(var i=0; i<time.length; i++){
        alert(time[i]);
    }
}