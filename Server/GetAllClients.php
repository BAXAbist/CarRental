<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
        $db = new DB_requests();
        
        $data = $db->getAllClients();
        $len = count($data)-1;
        if ($data[$len]['0'] == 'ok') {
            sendResponse(200, $data);
        } elseif ($data[$len]['0'] == 'Clients list is empty') {
            sendResponse(400, 'Clients list is empty');
        } else {
            sendResponse(400, "error");
        }

?>