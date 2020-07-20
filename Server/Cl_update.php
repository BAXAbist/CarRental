<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_client']) {
        $id_client = $_POST['id_client'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $middle_name = $_POST['middle_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        if ($login == null && $password == null && $first_name == null && $second_name == null && $middle_name == null && $address == null && $phone == null){
            $data == 'ok';
        }
        else{
            $db = new DB_requests();
            $data = $db->updateClientInfoById($id_client, $login, $password, $first_name, $second_name, $middle_name, $address, $phone);
        }
        if ($data == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown client') {
            sendResponse(400, 'unknown client');
        } elseif ($data == 'login is already taken') {
            sendResponse(400, 'login is already taken');
        } else {
            sendResponse(400, "error");
        }
    }


?>
