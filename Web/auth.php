<?php 
  include_once 'db_php/db2.php';
  $db = new DB_requests();
  $client = $db->authClient($_POST['login'],$_POST['password']);
  
  if ($client['result'] == 'ok'){
      session_start();
      $_SESSION['client_info'] = $client;
      $_SESSION['logo'] = 'yes';}
  else {
      echo $client['result'];
  }

?>