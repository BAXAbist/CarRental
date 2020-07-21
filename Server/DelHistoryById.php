<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_history'] ) {
        $id_history = $_POST['id_history'];
            
        $db = new DB_requests();
        $data = $db->DeleteHistoryById($id_history);        
        if ($data == 'ok') {
            sendResponse(200, $data);
        } else {
            sendResponse(400, "error");
        }
    }


?>