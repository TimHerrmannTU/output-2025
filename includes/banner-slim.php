<?php 
if (empty($main_headline)) $main_headline = "Set \$main_headline before including this .php";
if (empty($sub_headline)) $sub_headline = "Set \$sub_headline before including this .php";
?>

<div id="banner" class="full slim <?= ($cube) ? "cube" : "" ?>">
    <div class="wrapper" style="position: relative;">
        <div class="text-content col" <?= $cube ? "" : "style='width:100%;'" ?>>
            <h2><?= $main_headline ?></h2>
            <h3><?= $sub_headline ?></h3>
        </div>
    </div>
</div>