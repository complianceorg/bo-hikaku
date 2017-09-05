$(function(){
  $('input[type="radio"], input[type="checkbox"], select').change(function(){
    var data = (
      $('input, select').serialize());
    $.ajax({
      type: "POST",
      url:  "option_sql.php",
      data: data
    }).done(function(data){
        $("#str").html(data);
    }).fail(function(data){
        $("#str").text("fail");
    });
  });
});