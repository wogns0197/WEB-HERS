<?php
session_start();
?>
<script src="check_cancel.js" type="text/javascript"></script>
<?php
    $val = $_POST["cancel_val"];
    $valarr = explode(" ",$val);
    $_SESSION['manage_id'] = $valarr[0];
    $_SESSION['borrowdate'] = $valarr[1];
?>