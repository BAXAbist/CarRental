<?php
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        $cars = $db->getAllCars();
        
        
        if ($_POST['but_name'] == '1' ) 
        {
           foreach($cars as $item) {
                if ($item['brand'] == ""){
                    continue;
                }
                echo '<div class = "car_box">'; 
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                echo "<div class = 'car_text'>"."<div class = 'car_brand'>".$item['brand']."</div>"."<div class = 'car_cost'>".$item['cost']." руб/день</div>"."</div>";
                echo "</div>";
                
                }
            }; 
        if ($_POST['but_name'] == '3' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "heavy") {
                echo '<div class = "car_box">'; 
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                echo "<div class = 'car_text'>"."<div class = 'car_brand'>".$item['brand']."</div>"."<div class = 'car_cost'>".$item['cost']." руб/день</div>"."</div>";
                echo "</div>";
                }
            }; 
        };
        if ($_POST['but_name'] == '4' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "bus") {
                echo '<div class = "car_box">'; 
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                echo "<div class = 'car_text'>"."<div class = 'car_brand'>".$item['brand']."</div>"."<div class = 'car_cost'>".$item['cost']." руб/день</div>"."</div>";
                echo "</div>";
                }
            }; 
        };
        if ($_POST['but_name'] == '2' ) 
        {
           foreach($cars as $item) {
            if($item['type'] == "light") {
                echo '<div class = "car_box">'; 
                echo '<img src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                echo "<div class = 'car_text'>"."<div class = 'car_brand'>".$item['brand']."</div>"."<div class = 'car_cost'>".$item['cost']." руб/день</div>"."</div>";
                echo "</div>";
                }
            }; 
        };
        
        
        
     ?>