<?php
    /**
    * Template Name: Pigeon Template - update
    * Template Post Type: page, post
    * The Template for the new landing page.
    */
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
	
    get_header('pigeon-update');
?> 
    <main>
<?php
        // check if the page_builder field has rows of data
	    if (have_rows('pigeon_pageBuilder_update')) {
            // loop through the rows of data
            while (have_rows('pigeon_pageBuilder_update')) {
                the_row();

                if (get_row_layout() == 'introSection') {
                    get_template_part('./pigeonPageBuilder/Modules_update/IntroSection');

                } else if (get_row_layout() == 'wipSection') {
                    get_template_part('./pigeonPageBuilder/Modules_update/WhatIsPigeonSection');

                } else if (get_row_layout() == 'lsSection') {
                    get_template_part('./pigeonPageBuilder/Modules_update/LearnerSharerSection');

                } else if (get_row_layout() == 'popSection') {
                    get_template_part('./pigeonPageBuilder/Modules_update/PurposeOverProfitSection');

                } else if (get_row_layout() == 'uspSection') {
                    get_template_part('./pigeonPageBuilder/Modules_update/PigeonUSPSection');

                }
            }
        }
?>
    </main>
<?php        
    get_footer('pigeon-update');
?>