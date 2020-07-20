<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
    if ($_GET['id_client']) {
        $id_client = $_GET['id_client'];
        $db = new DB_requests();
        
        $data = $db->getClientById($id_client);
        if ($data['result'] == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown client') {
            sendResponse(400, 'unknown client');
        } else {
            sendResponse(400, "error");
        }
        
    }

?>