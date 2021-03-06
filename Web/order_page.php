<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Cars4RentOrder</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>
<body>
  <main>
    <header>
      <div id = "glogo">
        <div id="logo" onclick="slowScroll('.step')">
          <img src="image/51.jpg" alt="" class="image">
          <span>CARS</span><span style="color:#ffcd7d">4</span><span>RENT</span>        
        </div>
      </div>

      <div id="about">
        <a href="index.php" title="Главная" onclick="slowScroll('.step')">Главная</a>
        
        <a href="#" title="Login" class = "button js-button-campaign">Login</a>
      </div>
    </header>
    <div class="step"></div>
    
    <?php
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        session_start();
        $id_car = $_SESSION['car_choice'];
        $client = $_SESSION['client_info'];
        $id_client = $client['id_client'];
        $car_info = $db -> getCarByid($id_car);
    ?>
    
    
    <div class = 'main_car_order'>
        <form class = 'form-car-order'>
            <p> 
                <img id = "" src="<?php echo $car_info['icon'];?> " style = "width:100%;max-width:400px;">
                <br>
                <label>Вы выбрали машину: <?php echo $car_info['brand'];?> </label>
            </p>
            <p> 
                <label>Цена: <?php echo $car_info['cost'];?>/день </label>
            </p>
            <p>
                <label for="date">Дата выдачи: </label>
                <input type="date" id="date_1" name="date1"/>
            </p>
            <p>
                <label for="date">Дата окончания: </label>
                <input type="date" id="date_2" name="date2"/>
            </p>
            <p>
                <label for="date">Коммент: </label>
                <input type="text" id="date_3" name="date3"/>
            </p>
            <p>
                <button type="submit" id = 'order_but'>Заказать</button>
            </p>
        </form>
    </div>
    <div id="result_order"></div>
    
    
    
    
    
    
    
    
    
  </main>
  <div class = "overlay js-overlay-campaign">
      <form class = "popup js-popup-campaign">
          <input type = "text" name = "login" placeholder = "login"><br>
          <input type = "text" name = "password" placeholder = "password"><br>
          <button id = 'but_auth'>Авторизация</button>
          <button class = "button_reg js-button-campaign-reg">Регистрация</button>
          <div class = "close-popup js-close-campaign"></div>
      </form>
  </div>
  <div class = "overlay js-overlay-campaign-1">
  <form  class="popup js-popup-campaign-1">
      <p>
          <p>Ваш логин:</p>
          <input type = "text" name = "login" value = "<?php echo @$data['login']; ?>"></input>
      </p>
      <p>
          <p>Ваш пароль:</p>
          <input type = "password" name = "password"></input>
      </p>
      <p>
          <p>Повторите пароль:</p>
          <input type = "password" name = "password2"></input>
      </p>
      <p>
          <p>Ваше имя:</p>
          <input type = "text" name = "first_name" value = "<?php echo @$data['first_name']; ?>"></input>
      </p>
      <p>
          <p>Ваша фамилия:</p>
          <input type = "text" name = "second_name" value = "<?php echo @$data['second_name']; ?>"></input>
      </p>
      <p>
          <p>Ваше отчество:</p>
          <input type = "text" name = "middle_name" value = "<?php echo @$data['middle_name']; ?>"></input>
      </p>
      <p>
          <p>Ваш адрес:</p>
          <input type = "text" name = "address" value = "<?php echo @$data['address']; ?>"></input>
      </p>
      <p>
          <p>Ваш номер телефона:</p>
          <input type = "text" name = "phone" value = "<?php echo @$data['phone']; ?>"></input>
      </p>
      <p>
          <button type = 'submit' name = 'do_signup' id ='but_reg'>Регистрация</button>
      </p>
      <div class = "close-popup js-close-campaign-1"></div>
  </form>
  </div>
   <?php
    session_start();
    
    if($_SESSION['logo']=='yes'){
    
    ?>      
    <script type="text/javascript">
        
        var element = document.getElementById('about');
        var find_element = element.querySelectorAll('a');
        find_element[1].remove();
        var newElement = document.createElement("a");
        var newElement1 = document.createElement("a");
        newElement.href = 'home_page.php';
        newElement.innerHTML = '<img src="image/avatar.jpg" alt="" class="image">';
        newElement1.innerHTML = 'Выйти'
        newElement1.classList.add("leaver"); 
        element.append(newElement);
        element.append(newElement1);
    </script> 
    <?};?>
  <script src="js/script.js"></script>  
  <script>
          function slowScroll(id) {
            $('html, body').animate({
              scrollTop: $(id).offset().top
            }, 500);
          }

          $(document).on("scroll", function () {
            if($(window).scrollTop() === 0)
              $("header").removeClass("fixed");
            else
              $("header").attr("class", "fixed");
          });
        </script>  
</body>      
</html>