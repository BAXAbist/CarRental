<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['brand'] && $_POST['cost'] && $_POST['type'] && $_POST['icon'] && $_POST['status']) {
        $brand = $_POST['brand'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $icon = $_POST['icon'];
        $status = $_POST['status'];

        $db = new DB_requests();
        
        $data = $db->addCar($brand, $cost, $type, $icon, $status);
        if ($data == 'ok') {
            sendResponse(200, $data);
        } else {
            sendResponse(400, $data);
        }
    }


?>