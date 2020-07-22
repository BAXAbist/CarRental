$('.js-button-campaign').click(function(){
  $('main').css('filter','blur(5px)');
  $('.js-overlay-campaign').fadeIn();
  $('.js-overlay-campaign').addClass('disabled');
});

$('.js-close-campaign').click(function() {
  $('.js-overlay-campaign').fadeOut();
  $('main').css('filter','none');
});

$(document).mouseup(function (e) {
  var popup = $('.js-popup-campaign');
  if (e.target != popup[0]&&popup.has(e.target).length === 0){
      $('.js-overlay-campaign').fadeOut();
      $('main').css('filter','none');
  }
});

$(document).ready(function(){
  $("#but_auth").click(function(event){ //устанавливаем событие отправки для формы с id=form
          var form_data = $('.popup').serialize(); //собераем все данные из формы
          
          event.preventDefault();
          $.ajax({
          type: "POST", //Метод отправки
          url: "auth.php", //путь до php фаила отправителя
          data: form_data,
          success: function(result) {
                 //код в этом блоке выполняется при успешной отправке сообщения
                 $('.js-overlay-campaign').fadeOut();
                 $('main').css('filter','none');
                 alert(result);}
                 
          });
  });
});