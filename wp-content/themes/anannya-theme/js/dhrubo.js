$(document).ready(function(){
  $(".d_search").hide();
  $(".d_search_img").click(function(){
    $(".d_search").toggle(200);
  });
});

$(document).ready(function(){
            var scroll_pos = 0;
            $(document).scroll(function() {
                scroll_pos = $(this).scrollTop();
                if(scroll_pos > 120) {
                    $("a.mega-menu-link").css('color', 'white');
                } else {
                    $("a.mega-menu-link").css('color', '#5c5c5c');
                }
            });
        });
