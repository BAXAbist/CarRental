$(document).ready(function() {

  $($("form input[type=image]")[0]).click(function(event) {
      var but_name = 1;
      
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "generate.php",
        data: ({but_name:but_name}),
        success:function(result){
          $("#result").html(result);
        }
      });
  });
  
  $($("form input[type=image]")[1]).click(function(event) {
      var but_name = 2;
      
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "generate.php",
        data: ({but_name:but_name}),
        success:function(result){
          $("#result").html(result);
        }
      });
  });
  
  
  $($("form input[type=image]")[2]).click(function(event) {
      var but_name = 3;
      
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "generate.php",
        data: ({but_name:but_name}),
        success:function(result){
          $("#result").html(result);
        }
      });
  });
  
  
  $($("form input[type=image]")[3]).click(function(event) {
      var but_name = 4;
      
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "generate.php",
        data: ({but_name:but_name}),
        success:function(result){
          $("#result").html(result);
        }
      });
  });
  });