<?php
    require_once "db.php";
    require_once "password.php";

	$user_id = $_POST['user_id'];
	$user_pw = sha512($_POST['user_pw']);
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
	$user_gndr = $_POST['user_gndr'];
	$user_bday = $_POST['user_bday'];
	$user_cntry = $_POST['user_cntry'];
    $user_email = $_POST['user_email'];
	$query = "insert into airbmg_AccountInfo (id,pwd,fname,lname,gndr,bday,cntry,email) values('".$user_id."','".$user_pw."','".$user_fname."','".$user_lname."','".$user_gndr."','".$user_bday."','".$user_cntry."','".$user_email."')";
    $sql = mq($query);

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('Joining airbmg is done.');</script>
<meta http-equiv="refresh" content="0 url=/">