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
  <script src="js/script.js"></script>    
  
</head>


<body>
  <header>
    <div id = "glogo">
      <div id="logo" onclick="slowScroll('#top')">
        <img src="image/51.jpg" alt="" class="image">
        <span>CARS</span><span style="color:#ffcd7d">4</span><span>RENT</span>        
      </div>
    </div>

    <div id="about">
      <a href="#" title="Главная" onclick="slowScroll('#main')"">Главная</a>
      <a href="#" onclick="slowScroll('#overview')" title="Автопарк">Автопарк</a>
      <a href="#" onclick="slowScroll('#contacts')" title="Контакты">Контакты</a>
      <a href="#" onclick="slowScroll('#faq')" title="Ответы на вопросы">FAQ</a>
      <a href="#" title="Login">Login</a>
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
        <img src="image/11.jpg" >
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
        <input type="image" name="action1" value="4" src="image/12.jpg" >
        <input type="image" name="action1" value="0" src="image/12.jpg" >
        <input type="image" name="action2" value="1" src="image/12.jpg" >
        <input type="image" name="action3" value="2" src="image/12.jpg" >
    </form>

    <div id = "result">
    <?php
        include_once 'db_php/db2.php';
        $db = new DB_requests();
        $cars = $db->getAllCars();
        foreach($cars as $item) {
        print $item['brand'];}
     ?>
     </div>
  </div>



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


