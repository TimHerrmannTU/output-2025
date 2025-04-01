
jQuery(document).ready(function($) {
    // scaling the items to the desired width
    var itemsPerSlide = 0
    $(".carousel").each(function() {
        itemsPerSlide = parseInt($(this).attr("items-per-slide"));
        const canvasWidth = $(this).find(".canvas").width();
        const itemWidth = canvasWidth / (itemsPerSlide+1);
        const gapWidth = itemWidth / (itemsPerSlide-1);
        $(this).find(".canvas .canvas-item").css("flex", `0 0 ${itemWidth}px`);
        $(this).find(".canvas").css("gap", gapWidth);
    })
    // adding the right ammount of buttons for the slides
    $(".carousel .canvas").each(function() {
        var canvasWidth = $(this).width();
        var itemWidth = $(this).find(".canvas-item").width();
        var itemCount = $(this).find(".canvas-item").length
        console.log(itemsPerSlide, itemCount)
        var slideCount = Math.ceil(itemCount/itemsPerSlide);
        // dynamic generation
        var dotIndex = 1
        var controls = $(this).closest(".carousel").find(".controls")
        var firstDot = $(controls).find(".dot[index='0']")
        while (slideCount > dotIndex) {
            var newDot = $(firstDot).clone()
            $(newDot).removeClass("active")
            $(newDot).attr("index", dotIndex)
            $(controls).append(newDot)
            dotIndex++
        }
    })
    // on click event
    $(".carousel .controls .dot").click(function() {
        if (!$(this).hasClass("active")) {
            var parent = $(this).closest(".carousel");
            // toggle active button style
            $(parent).find(".controls .dot").removeClass("active");
            $(this).addClass("active");
            // sliding
            var index = $(this).attr("index"); // which slide does the user want to navigate to?
            var itemGap = parseInt($(this).closest(".carousel").find(".canvas").css("row-gap").replace("px", "")); // needed for perfect offset
            var offset = index * (1200+itemGap) // all the carousel items are just 1 one long row but only part of it is visable
            $(parent).find(".canvas").css('margin-left', `-${offset}px`); // changing the offset pushes new items into the visable section
        }
    })
    // auto rotating slides
    var interval = window.setInterval(function() { 
        $(".carousel").each(function() {
            var modulo = parseInt($(this).find(".controls").attr("slides"))
            var index = parseInt($(this).find(".controls .dot.active").attr("index"))
            var newIndex = (index+1) % modulo // find the next button or first one if it was the last one
            $(this).find(`.controls .dot[index=${newIndex}]`).click()
        })
    }, 10000000)
    // TODO: disable this if manual click happend!!!
})