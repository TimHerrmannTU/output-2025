jQuery(document).ready(function($) {
    const transition_time = 500
    $(".carousel-wrapper .carousel-controls .dot").click(function() {
        var carousel = $(this).closest(".carousel-wrapper").find(".carousel")
        // change style of controls
        $(this).closest(".carousel-wrapper").find(".carousel-controls .dot").removeClass("active")
        $(this).addClass("active")
        // animate carousel
        var slide_index = $(this).attr("index")
        var offset = `${slide_index*100}%`
        $(carousel).find(".slide").css('transform', `translateX(-${offset})`) // animation
        $(carousel).attr("slide_index", slide_index) // save new index (for auto slide)
    })

    // auto rotating slides
    var interval = window.setInterval(function() { 
        $(".carousel-wrapper").each(function() {
            var slide_index = parseInt($(this).find(".carousel").attr("slide_index")) + 1
            var slide_count = parseInt($(this).find(".carousel").attr("slide_count"))
            var next_index = mod(slide_index, slide_count)
            $(this).find(`.carousel-controls .dot[index="${next_index}"]`).click()
        })
    }, 1000000)
})

function mod(n, m) { // js doesnt know how mod work smh
    return ((n % m) + m) % m;
}