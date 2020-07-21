<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
        $db = new DB_requests();
        if ($_GET['state']) {
            $state = $_GET['state'];
            $data = $db->getHistoryByState($state);

            $len = count($data)-1;
            if ($data[$len]['0'] == 'ok') {
                unset($data[$len]);
                sendResponse(200, $data);
            } elseif ($data[$len]['0'] == 'There are no records with this state'){
                sendResponse(200, "There are no records with this state");
            } else {
                sendResponse(400, "error");
            }
        }
?>