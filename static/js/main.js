jQuery(document).ready(function($) {
    var last_y = $(document).scrollTop();
    var offset_y = parseInt($("#banner:not(.slim) .cube-unfolded").css("top").replace("px", ""));
    $(window).on( "scroll", function() {
        if (offset_y < 305) {
            var new_y = $(this).scrollTop();
            if (last_y < new_y) {
                offset_y += (new_y - last_y)/2
                $("#banner .cube-unfolded").css("top", (offset_y).toString()+"px")
            }
            last_y = $(this).scrollTop()
        }
    })
})