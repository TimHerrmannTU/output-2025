<div class="dropdown">
    <?php $current_year = "OUTPUT " . date("Y"); ?>
    <div class="icon">
        <div class="iconify" data-icon="mdi-triangle-down-outline"></div>
    </div>
    <select id="year">
        <option value="default"><?= $current_year ?></option>
        <?php // get all options for taxonomy
        $all_terms = get_terms([
            'taxonomy' => 'output-year',
            'hide_empty' => true,
            'order' => "desc",
        ]);
        if (!is_wp_error($all_terms)) {
            foreach ($all_terms as $term) {
                // check if current year is in the list
                if ($term->name == $current_year) {
                    continue; // skip current year
                }

                ?><option value="<?= $term->name ?>"><?= $term->name ?></option><?php
            }
        }
        ?>
    </select>
</div>