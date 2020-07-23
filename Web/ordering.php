<?php 
    include_once 'db_php/db2.php';
    $db = new DB_requests();
    
    session_start();
    $timestamp1 = strtotime($_POST['date1']).'000';
    $timestamp2 = strtotime($_POST['date2']).'000';
    $id_car =  $_SESSION['car_choice'];
    $client = $_SESSION['client_info'];
    $id_client = $client['id_client'];
    $state = 'active';
    $flag = $db->addHistory($id_client,$id_car,$timestamp1,$timestamp2,$state);
    echo $flag;
    
?>