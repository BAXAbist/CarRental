<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_car']) {
        $id_car = $_POST['id_car'];
        $brand = $_POST['brand'];
        $cost = $_POST['cost'];
        $type = $_POST['type'];
        $icon = $_POST['icon'];
        $status = $_POST['status'];        
        
        if ($brand == null && $cost == null && $type == null && $icon == null && $status == null){
            $data == 'ok';
        }
        else{
            $db = new DB_requests();
            $data = $db->updateCarInfoById($id_car,$brand,$cost,$type,$icon,$status);
        }
        if ($data == 'ok') {
            sendResponse(200, $data);
        } elseif ($data == 'unknown car') {
            sendResponse(400, 'unknown car');
        } else {
            sendResponse(400, "error");
        }
    }


?>
