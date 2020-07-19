<?php
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        $cars = $db->getAllCars();
        
        
        if ($_POST['but_name'] == '1' ) 
        {
           foreach($cars as $item) {
               ?><div class = "car_box"> <?php
                print $item['brand'];
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                }
            }; ?> </div> <?php
        if ($_POST['but_name'] == '3' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "heavy") {
                ?><div class = "car_box"> <?php
                print $item['brand'];
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                }
            }; ?> </div> <?php
        };
        if ($_POST['but_name'] == '4' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "bus") {
               ?><div class = "car_box"> <?php
                print $item['brand'];
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                }
            }; ?> </div> <?php
        };
        if ($_POST['but_name'] == '2' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "light") {
                ?><div class = "car_box"> <?php
                print $item['brand'];
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                }
            }; ?> </div> <?php
        };
        
        
        
     ?>