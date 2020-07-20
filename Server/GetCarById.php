<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';
    
    if ($_GET['id_car']) {
        $id_car = $_GET['id_car'];
        $db = new DB_requests();
        
        $data = $db->getCarByid($id_car);
        if ($data['result'] == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown car') {
            sendResponse(400, 'unknown car');
        } else {
            sendResponse(400, "error");
        }
        
    }

?>