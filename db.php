 <?php

 require_once 'password.php';
  
  $db = new mysqli("localhost","seung413yeon","Canadian413","seung413yeon");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  function login($id, $password) {
      global $db;

      $id = addslashes($id);
      $password = sha512($password);
      $query = "select * from airbmg_AccountInfo where id='{$id}' and pwd='{$password}'";

      $res = mq($query);
      return $res->fetch_array();
  }

  ?>