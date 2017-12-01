window.onload = alertfunction;
function alertfunction(){
    var r = confirm("예약을 취소하시겠습니까?");
    if(r==false){
        goback();
    }
    else{
        location.href="db_cancel.php";
    }
}
function goback(){
    window.history.back();
}