document.addEventListener("click", 
    function f(e) {
    e = e || window.event;
    var el = e.target || e.srcElement;
    if (/^[0-9 ]+$/.test(el.id)) {
        data = ({id_car:el.id});
        $.ajax({
            type: "POST", //Метод отправки
            url: "order.php", //путь до php фаила отправителя
            data: data,
            success: function(result) {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   window.location.href = 'order_page.php';
                
            }
                   
        });
    }
    
});
$('.js-button-campaign').click(function(){
    $('main').css('filter','blur(5px)');
    $('.js-overlay-campaign').fadeIn();
    $('.js-overlay-campaign').addClass('disabled');
});



$('.js-close-campaign').click(function() {
    $('.js-overlay-campaign').fadeOut();
    $('main').css('filter','none');
});



$('.js-button-campaign-reg').click(function(){
    $('.js-overlay-campaign').fadeOut();
    
    $('.js-overlay-campaign-1').fadeIn();
    $('.js-overlay-campaign-1').addClass('disabled');
});

$('.js-close-campaign-1').click(function() {
    $('.js-overlay-campaign-1').fadeOut();
    $('main').css('filter','none');
});



$(document).ready(function(){
    $("#but_auth").click(function(event){ //устанавливаем событие отправки для формы с id=form
            var form_data = $('.js-popup-campaign').serialize(); //собераем все данные из формы
            
            event.preventDefault();
            $.ajax({
            type: "POST", //Метод отправки
            url: "auth.php", //путь до php фаила отправителя
            data: form_data,
            success: function(result) {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   
                   if (result.trim() === ''){
                   $('.js-overlay-campaign').fadeOut();
                   $('main').css('filter','none');
                   location.reload();}
                   else{
                       alert(result);
                   }
                   
                
            }
                   
            });
    });
    $("#but_reg").click(function(event){ //устанавливаем событие отправки для формы с id=form
            var form_data = $('.js-popup-campaign-1').serialize(); //собераем все данные из формы
            
            event.preventDefault();
            $.ajax({
            type: "POST", //Метод отправки
            url: "reg.php", //путь до php фаила отправителя
            data: form_data,
            success: function(result) {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   var data = result;
                   
                   
                   if (result.trim() == "ok"){
                    $('.js-overlay-campaign-1').fadeOut();
                    $('main').css('filter','none');
                    location.reload();}
                   else{
                       alert(result);
                   }
                
            }
                   
            });
    });
    $(".leaver").click(function(event){ //устанавливаем событие отправки для формы с id=form
            
            $.ajax({
            type: "POST", //Метод отправки
            url: "leave.php", //путь до php фаила отправителя
            success: function(result) {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   location.reload();
                
            }
                   
            });
    });
    $("#order_but").click(function(event){ //устанавливаем событие отправки для формы с id=form
            
            var form_data = $('.form-car-order').serialize(); //собераем все данные из формы
            $.ajax({
            type: "POST", //Метод отправки
            url: "ordering.php", //путь до php фаила отправителя
            data: form_data,
            success: function(result) {
                   //код в этом блоке выполняется при успешной отправке сообщения
                   window.location.href = 'index.php';
                
            }
                   
            });
    });
});