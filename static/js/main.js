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
    // upload buttons
    $("[dd-function='file-upload-trigger']").click(function() {
        const the_key = $(this).attr("key")
        $(`[dd-function='file-upload-input'][key='${the_key}']`).click()
    })
    $("[dd-function='file-upload-input']").on("change", function(e) {
        const the_key = $(this).attr("key")
        const img = e.target.files[0]; 
        if (img && img.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $(`[dd-function='file-upload-trigger'][key='${the_key}'] img.preview`).attr("src", e.target.result)
            };
            reader.readAsDataURL(img);
            $(`[dd-function='file-upload-trigger'][key='${the_key}']`).addClass("uploaded")
        }
    })
    // expandable text segment
    $("[dd-function='expandable'] [dd-function='trigger']").click(function() {
        $(this).find("img").toggleClass("flip")
        $(this).closest("[dd-function='expandable']").find(".expand").toggle()
    })
})