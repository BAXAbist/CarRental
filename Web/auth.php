<?php 
  include_once 'db_php/db2.php';
  $db = new DB_requests();
  $client = $db->authClient($_POST['login'],$_POST['password']);
  echo json_encode($client);

?>