<div class="dropdown mb-2">
    <select id="year">
        <option class="template" value=""></option>
    </select>
</div>
<script>
// dynamic generation of the select options
jQuery(document).ready(function($) {
    // OUPUT happend every year since 2011 except 2020!
    var currentYear = new Date().getFullYear()
    console.log(currentYear)
    while (currentYear >= 2011) {
        if (currentYear != 2020) {
            var newOption = $("#year .template").clone()
            newOption.text(`OUPUT.DD ${currentYear}`)
            newOption.val(currentYear)
            $("#year").append(newOption)
        }
        currentYear--
    }
    $("#year .template").remove()
})
</script>