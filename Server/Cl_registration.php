<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['login'] && $_POST['password'] && $_POST['first_name'] && $_POST['second_name'] && $_POST['middle_name'] 
        && $_POST['address'] && $_POST['phone']) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $middle_name = $_POST['middle_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        $db = new DB_requests();
        
        $data = $db->addClient($login, $password, $first_name, $second_name, $middle_name, $address, $phone);
        if ($data == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'login is already taken') {
            sendResponse(400, 'login is already taken');
        } else {
            sendResponse(400, "error");
        }
    }


?>
