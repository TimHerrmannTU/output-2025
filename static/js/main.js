jQuery(document).ready(function($) {
    // scroll event for the magenta cube inside the banner
    var last_y = $(document).scrollTop();
    try {
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
    }
    catch(e) {}
    // labeled input event (keeps the label above if there is content inside the input)
    $(".labeled-input input, .labeled-input textarea").on("keyup", function() {
        var parent = $(this).closest(".labeled-input")
        if ($(this).val() != "") {
            $(parent).addClass("has-content")
        }
        else {
            $(parent).removeClass("has-content")
        }
    })
})