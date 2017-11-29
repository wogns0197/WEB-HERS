window.onload = check;
function check(){
    var value = $("time").value;
    var time = value.split(" ");
    if(time[0] == "" || time[0] == null){
        alert("예약 시간을 입력해주세요");
        window.history.goback();
    }
    alert("ss");
}