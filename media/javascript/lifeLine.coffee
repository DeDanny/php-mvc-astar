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
      url: "?request=Astar/calculateSteps",
      data: {'map' : jsonMap, 'user' : user, 'food' : food},
      success: (data) ->
        walkRoute = JSON.parse data
        map = JSON.parse jsonMap
        i = 0
        onFire = false
        ghost = false
        walker = =>
          $('#agent').remove()
          $('#' + walkRoute[i].replace(':', '_')).append('<div id="agent" />')
          
          if onFire and not ghost then $('#agent').css('background-position', '-288px')
          if ghost then $('#agent').css('background-position', '-320px')
          
          if food == walkRoute[i]
            $('#food').remove()
          if map[walkRoute[i]] == "1" && !ghost
            onFire = true
            $('#agent').css('background-position', '-288px')
            #-287px
          if map[walkRoute[i]] == "2" && onFire
            ghost = true
            $('#agent').css('background-position', '-320px');
            #-321px
          i++
          if i < walkRoute.length
            setTimeout(walker, 500)
        
        setTimeout(walker, 500)
      });
