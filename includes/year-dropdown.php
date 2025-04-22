<div class="dropdown">
    <select id="year">
        <option value="default">OUTPUT 20XX</option>
        <?php // get all options for taxonomy
        $all_terms = get_terms([
            'taxonomy' => 'output-year',
            'hide_empty' => true,
            'order' => "desc",
        ]);
        if (!is_wp_error($all_terms)) {
            foreach ($all_terms as $term) {
                ?><option value="<?= $term->name ?>"><?= $term->name ?></option><?php
            }
        }
        ?>
    </select>
</div>