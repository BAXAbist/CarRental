<?php
    include_once 'utils.php';
    include_once '../db_php/db2.php';

    if ($_POST['login'] ) {
        $login = $_POST['login'];
            
        $db = new DB_requests();
        $data = $db->DeleteClientByLogin($login);        
        if ($data == 'ok') {
            sendResponse(200, $data);
        } else {
            sendResponse(400, "error");
        }
    }


?>