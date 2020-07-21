<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
        $db = new DB_requests();
        if ($_GET['id_client']) {
            $id_client = $_GET['id_client'];
            $data = $db->getClientHistory($id_client);

            $len = count($data)-1;
            if ($data[$len]['0'] == 'ok') {
                unset($data[$len]);
                sendResponse(200, $data);
            } elseif ($data[$len]['0'] == "Client's history is empty"){
                sendResponse(200, "Client's history is empty");
            } else {
                sendResponse(400, "error");
            }
        }
?>
