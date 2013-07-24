$(document).ready ->   
  user = undefined
  food = undefined
  $(".radio_on_map").change ->
    if user == undefined
      user = $(this).val()
      $('#' + user.replace(':', '_')).append('<div id="agent" />')
      $(this).hide();
    else
      food = $(this).val()
      $(".radio_on_map").hide()
      $('#' + food.replace(':', '_')).append('<div id="food" />')
      start(user, food)
      
  #not the best solutions but is now seems like he is walking    
  start = (user, food) ->
     $.ajax({
      type: "POST",
      url: "?request=astar/calculateSteps",
      data: {'map' : jsonMap, 'user' : user, 'food' : food},
      success: (data) ->
        walkRoute = JSON.parse data
        i = 0
        walker = =>
          $('#agent').remove()
          $('#' + walkRoute[i].replace(':', '_')).append('<div id="agent" />')
          if food == walkRoute[i]
            $('#food').remove()
          i++
          if i < walkRoute.length
            setTimeout(walker, 500)
        
        setTimeout(walker, 500)
      });
