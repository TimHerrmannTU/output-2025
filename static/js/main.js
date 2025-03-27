jQuery(document).ready(function($) {
    // paralax scroll for the unfolded cube
    var last_y = 0;
    var offset_y = parseInt($("#banner .cube-unfolded").css("top").replace("px", ""));
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
    // expanding of the program points
    $("#timeline .expandable").click(function() {
        $(this).closest(".text-content").toggleClass("active")
        $(this).closest(".text-content").find(".toggle-me").toggle()
    })
})