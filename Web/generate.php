<?php
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        $cars = $db->getAllCars();
        foreach($cars as $item) {
        if($item['type'] == "light") {
            
        }};
        if ($_POST['but_name'] == '1' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "light") {
                print $item['brand'];
            }};
        };
        if ($_POST['but_name'] == '2' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "heavy") {
                print $item['brand'];
            }};
        };
        if ($_POST['but_name'] == '3' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "bus") {
                print $item['brand'];
            }};
        };
        
        
        
     ?>