<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_history']) {
        $id_history = $_POST['id_history'];
        $id_client = $_POST['id_client'];
        $id_car = $_POST['id_car'];
        $date_issue = $_POST['date_issue'];
        $date_return = $_POST['date_return'];
        $state = $_POST['state'];        
        
        if ($id_client == null && $id_car == null && $date_issue == null && $date_return == null && $state == null){
            $data == 'ok';
        }
        else{
            $db = new DB_requests();
            $data = $db->updateHistoryById($id_history,$id_client,$id_car,$date_issue,$date_return,$state);
        }
        if ($data == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown history') {
            sendResponse(400, 'unknown history');
        } else {
            sendResponse(400, "error");
        }
    }


?>
