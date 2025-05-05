jQuery(document).ready(function($) {
    console.log("main.js loaded")
    // scroll event for the magenta cube inside the banner
    if ($(".cube-unfolded").length > 0) {
        var last_y = $(document).scrollTop();
        try {
            var current_offset_y = parseInt($(".cube-unfolded").css("top").replace("px", ""))
            var target_offset_y = $(window).height()
            target_offset_y = ($(".head.slim").length > 0) ? target_offset_y*0.605 : target_offset_y*0.757 
            $(window).on( "scroll", function() {
                if (current_offset_y < target_offset_y) {
                    var new_y = $(this).scrollTop();
                    if (last_y < new_y) {
                        current_offset_y += (new_y - last_y)/1.5
                        $(".cube-unfolded").css("top", (current_offset_y).toString()+"px")
                    }
                    last_y = $(this).scrollTop()
                }
                else {
                    $(".cube-unfolded").css("top", (target_offset_y).toString()+"px")
                }
            })
        }
        catch(e) {
            console.log(e)
        }
    }
    // labeled input event (keeps the label above if there is content inside the input)
    $(".labeled-input input, .labeled-input textarea").each(function() {
        var parent = $(this).closest(".labeled-input")
        if ($(this).val() != "") {
            $(parent).addClass("has-content")
        }
    })
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
        const input_trigger = $(`[dd-function='file-upload-trigger'][key='${the_key}']`) 
        const file = e.target.files[0];
        if (file) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $(input_trigger).find("img.preview").attr("src", e.target.result)
                };
                reader.readAsDataURL(file);
                $(input_trigger).addClass("uploaded")
            }
            else {
                const fileName = file?.name || 'No file chosen';
                $(input_trigger).find("label").text(fileName);
            }
        }
    })
    // expandable text segment
    $("[dd-function='expandable'] [dd-function='trigger']").click(function() {
        $(this).find(".icon").toggleClass("flip")
        $(this).closest("[dd-function='expandable']").find(".expand").toggle()
    })
})