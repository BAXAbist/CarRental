<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['id_client'] && $_POST['id_car'] && $_POST['date_issue'] && $_POST['date_return'] && $_POST['state']) {
        $id_client = $_POST['id_client'];
        $id_car = $_POST['id_car'];
        $date_issue = $_POST['date_issue'];
        $date_return = $_POST['date_return'];
        $state = $_POST['state'];

        $db = new DB_requests();
        
        $data = $db->addHistory($id_client, $id_car, $date_issue, $date_return, $state);
        if ($data == 'ok') {
            sendResponse(200, $data);
        } else {
            sendResponse(400, "error");
        }
    }


?>
