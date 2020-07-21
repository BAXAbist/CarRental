<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['brand'] && $_POST['cost'] && $_POST['type'] && $_POST['icon'] && $_POST['status'] 
        && $_POST['passengers'] && $_POST['bags'] && $_POST['doors'] && $_POST['features']) {
        $brand = $_POST['brand'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $icon = $_POST['icon'];
        $status = $_POST['status'];
        $passengers = $_POST['passengers'];
        $bags = $_POST['bags'];
        $doors = $_POST['doors'];
        $features = $_POST['features'];

        $db = new DB_requests();
        
        $data = $db->addCar($brand, $cost, $type, $icon, $status, $passengers, $bags, $doors, $features);
        if ($data == 'ok') {
            sendResponse(200, $data);
        } else {
            sendResponse(400, "error");
        }
    }


?>
