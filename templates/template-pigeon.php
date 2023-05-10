<?php

/**
 * Template Name: Pigeon Template
 * Template Post Type: page, post
 * The Template for the new landing page.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header('pigeon');
?>
<main>
    <?php
    // check if the page_builder field has rows of data
    if (have_rows('pigeon_pageBuilder_update')) {
        // loop through the rows of data
        while (have_rows('pigeon_pageBuilder_update')) {
            the_row();

            if (get_row_layout() == 'introSection') {
                get_template_part('./pigeonPageBuilder/Modules/IntroSection');
            } else if (get_row_layout() == 'wipSection') {
                get_template_part('./pigeonPageBuilder/Modules/WhatIsPigeonSection');
            } else if (get_row_layout() == 'lsSection') {
                get_template_part('./pigeonPageBuilder/Modules/LearnerSharerSection');
            } else if (get_row_layout() == 'popSection') {
                get_template_part('./pigeonPageBuilder/Modules/PurposeOverProfitSection');
            } else if (get_row_layout() == 'uspSection') {
                get_template_part('./pigeonPageBuilder/Modules/PigeonUSPSection');
            }
        }
    }
    ?>
</main>
<?php
get_footer('pigeon');
?>