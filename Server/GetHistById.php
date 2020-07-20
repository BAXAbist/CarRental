<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
    if ($_GET['id_history']) {
        $id_history = $_GET['id_history'];
        $db = new DB_requests();
        
        $data = $db->getHistoryById($id_history);
        if ($data['result'] == 'ok') {
            sendResponse(200, $data);
        } elseif ($data['result'] == 'unknown history'){
            sendResponse(200, 'unknown history');
        } else {
            sendResponse(400, "error");
        }
        
    }

?>