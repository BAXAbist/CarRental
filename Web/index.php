<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Cars4Rent</title>
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
      <a href="#" title="Главная" onclick="slowScroll('.step')">Главная</a>
      <a href="#" onclick="slowScroll('.main_4')" title="Автопарк">Автопарк</a>
      <a href="#" onclick="slowScroll('.main_5')" title="Контакты">Контакты</a>
      <a href="#" title="Login" class = "button js-button-campaign">Login</a>
    </div>
  </header>
  <div class="step"></div>
  <div class="wrapper">
    <div class="fotorama" data-width="100%"
    
    data-loop="true"
    data-autoplay="4000"
    data-nav="false"
    >
      <img src="image/1.jpg">
      <img src="image/3.jpg">
      <img src="image/2.jpg">
      
    </div>
  </div>

  <div class="main_2">
    <div class="box_main2"><h1 class="main_h2">Ищете подходящий сервис?</h1></div>
    <div class="box_about">
      <div class="b_a_i">
        <img src="image/10.jpg" >
        <div class="main_text">Аренда для бизнеса</div>
        <div class = "box_m_2">
        <p class="m_2_text"> Вы можете полностью положиться на нас во время важной деловой поездки. Мы гарантируем успешное и безопасное вождение автомобиля.</p>
        </div>
      </div>
      <div class="b_a_i">
        <img src="image/11.jpg">
        <div class="main_text">Аренда люкс уровня</div>
        <div class = "box_m_2">
        <p class="m_2_text"> Наша компания предоставляет впечатляющий выбор роскошных автомобилей для первоклассных деловых и частных поездок на короткие расстояния.</p>
        </div>
      </div>
      <div class="b_a_i">
        <img src="image/12.jpg" >
        <div class="main_text">Аренда для путешествий</div>
        <div class = "box_m_2">
        <p class="m_2_text"> Путешествие с комфортом - это цель и главный приоритет нашей компании. Мы заботимся о вашем опыте, куда бы вы ни пошли.</p>
        </div>
      </div>
    </div>   
    <div class="but_div"><button class="m_2_button">Найти машину</button></div> 
    
  </div>

  <div class="main_3">
    <div class="m_3_h"><h1 class="main_h2">наши преимущества</h1></div>
    <div class="box_m_3">
      <div class="box_list_3"><ul class="list_3">
        <li class="li_list_3">Газ и Страховка включены в стоимость</li>
        <li class="li_list_3">Аренда в любом месте</li>
        <li class="li_list_3">Уборка включена</li>
        <li class="li_list_3">24/7 Онлайн Поддержка</li>
      </ul></div>
      <div class="box_image_3"><img src="image/21.png" style="height: 200px; width: 300px;"></div>
    </div>
    <div class="but_div"><button class="m_2_button">Найти машину</button></div> 
  </div>


  <div class="main_4">
        
    <script src="/js/generate.js"></script>

    <div class ="head_m4"><h1 class="main_h2">автопарк</h1></div>
    <form id = "form">
        <input type="image" name="action1" value="ALL" src="image/cm_all.jpg" > 
        <input type="image" name="action1" value="0" src="image/cm4.jpg" >
        <input type="image" name="action2" value="1" src="image/cm2.jpg" >
        <input type="image" name="action3" value="2" src="image/cm3.jpg" >
    </form>

    <div id = "result">
    <?php
    
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        $cars = $db->getAllCars();
        foreach($cars as $item) {
                if ($item['brand'] == ""){
                    continue;
                }
                echo '<div class = "car_box">'; 
                echo '<img id = "'.$item['id_car'].'"src="', htmlspecialchars(urlencode($item['icon'])),'" style = "width:100%;max-width:400px;"/>';
                echo "<div class = 'car_text'>"."<div class = 'car_brand'>".$item['brand']."</div>"."<div class = 'car_cost'>".$item['cost']." руб/день</div>"."</div>";
                echo "</div>";
                };
            
    ?> 
     </div>
    
  </div>
  
  <div class = "main_5">
      <div class = "head_m5"><h1 class="main_h5">контактная информация</h1></div>
      <div class = "box_m5">
          <ul class = "list_m5">
            <li class = "ch_list">адресс</li>
            <li class = "ch_list">номер</li>
            <li class = "ch_list">мейл</li>
          </ul>
      </div>
  </div>
  
  <div class = "main_6">
      <p>follow us</p>
  </div>
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
        find_element[3].remove();
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
  <!--slow scroll-->
  
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


