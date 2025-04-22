// makes filtering for specific projects possible
jQuery(document).ready(function($) {
    function filter_cascade() { // supports multi select for both taxonomies
        // init
        var all_pros = $("#projekte .pro-grid .pro-item")
        $(all_pros).hide()
        // LVL 1: filters by year (dd-year attribute of the <a></a>)
        const YEAR =  $("#projekte .controls #year :selected").val()
        if (YEAR != "default") {
            $(all_pros).each(function() {
                if ($(this).attr("dd-year").includes(YEAR)) {
                    $(this).show()
                }
            })
        }
        else {
            $(all_pros).show()
        }
        // LVL 2: filters by type (dd-type attribute of the <a></a>)
        var checked_boxes = $("#projekte .controls input[type=checkbox]:checked")
        if (checked_boxes.length > 0) { // if nothing is selected all pros should be show
            var checked_values = $(checked_boxes).map(function() {
                return this.name
            }).get();
            $(all_pros).filter(":visible").each(function() {
                var show = false
                var pro_types = $(this).attr("dd-type").split(", ") // in case multiple types are selected
                pro_types.forEach(pro_type => {
                    if (checked_values.includes(pro_type)) {
                        show = true
                    }
                });
                $(this).toggle(show) // shows/hides the element depending on bool
            })
        }
        console.log(`Filters:\nyear=${YEAR}\ntype=${checked_values}`)
        
    }
    $("#projekte #year").change(function() {
        filter_cascade()
    })
    $("#projekte input[type=checkbox]").change(function() {
        filter_cascade()
    })
})