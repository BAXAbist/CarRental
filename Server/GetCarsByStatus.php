<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
        $db = new DB_requests();
        if ($_GET['status']) {
            $status = $_GET['status'];
            $data = $db->getCarsByStatus($status);

            $len = count($data)-1;
            if ($data[$len]['0'] == 'ok') {
                unset($data[$len]);
                sendResponse(200, $data);
            } elseif ($data[$len]['0'] == 'There are no cars with this status'){
                sendResponse(200, "There are no cars with this status");
            } else {
                sendResponse(400, "error");
            }
        }
?>
