<meta charset="utf-8" />
<?php

require_once "db.php";
require_once "password.php";

session_start();

if(!isset($_POST['user_id'], $_POST['user_pw'])) {
    echo '<script> alert("Type ID and Password in."); history.back(); </script>';
} else{
    $id = $_POST['user_id'];
    $password = $_POST['user_pw'];

    $res = login($id, $password);
    if ($id === $res['id'] && sha512($password) === $res['pwd']) {

        $_SESSION['user_id'] = $res['id'];
        $_SESSION['user_pw'] = $res['pwd'];
        $_SESSION['user_fname'] = $res['fname'];
        $_SESSION['user_lname'] = $res['lname'];
        
        echo "<script>location.href='index.php';</script>";

    }

    else {
        echo "<script>alert('ID or Password is wrong.'); history.back();</script>";
    }
}
?>