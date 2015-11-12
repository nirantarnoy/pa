    $("li").each(function(){
    var name = $(this).attr("id");
    var pagename = $(".pagename").attr("id");
    
     if(name == pagename)
     {     
     var id = $(this).parent().attr("id");
      $("ul").each(function(){
        var name2 = $(this).attr("id");
        if(name2==id)
        {
          var id2 = $(this).parent().attr("id");
          $("li").each(function(){
            var id3 = $(this).attr("id");
            if(id3==id2)
            {
                 $(this).addClass("active");
            }
          });
        }
     });
     //alert(id);
        $(this).addClass("active");
        return;
     }
});



