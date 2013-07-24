$(document).ready ->   
  user = undefined
  food = undefined
  $("input[type=radio]").change ->
    val = $(this).val()
    name = $(this).attr('name')
    
    cssClass = switch val
      when "0" then "grass"
      when "1" then "lava"
      when "2" then "water"
      when "3" then "mountain"
      when "4" then "sand"
      
    $('#'+name.replace(':', '_')).removeClass('lava sand water grass mountain').addClass(cssClass);

