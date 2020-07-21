<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
        $db = new DB_requests();
        
        $data = $db->getHistory();
        $len = count($data)-1;
        if ($data[$len]['0'] == 'ok') {
            unset($data[$len]);
            sendResponse(200, $data);
        } elseif ($data[$len]['0'] == 'History is empty'){
            sendResponse(200, "History is empty");
        } else {
            sendResponse(400, "error");
        }

?>