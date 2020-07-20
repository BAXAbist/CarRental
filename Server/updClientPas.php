<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_client'] && $_POST['old_pas'] && $_POST['new_pas']) {
        $id_client = $_POST['id_client'];
        $old_pas = $_POST['old_pas'];
        $new_pas = $_POST['new_pas'];
            
        $db = new DB_requests();
        $data = $db->updateClientPassword($id_client, $old_pas, $new_pas);        
        if ($data == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown client') {
            sendResponse(400, 'unknown client');
        } elseif ($data == 'wrong old password') {
            sendResponse(400, 'wrong old password');
        } else {
            sendResponse(400, "error");
        }
    }


?>