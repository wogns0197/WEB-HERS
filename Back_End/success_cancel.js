window.onload = alertfunction;
function alertfunction(){
    var r = confirm("예약을 취소하시겠습니까?");
    if(r==false){
        return false;
    }
}