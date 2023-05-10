<?php
    /**
    * Template Name: Pigeon - Default Template
    * Template Post Type: page, post
    */
    /*
        File Name : pageBuilder_moduleConstructor
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the markup for the default template
    */

    get_header();
?>
    <main>
<?php
        if (have_rows('page_builder_modules_general')) {
            while (have_rows('page_builder_modules_general')) {
                the_row();

                if (get_row_layout() == 'textBlock') {
                    get_template_part('./pageBuilder/pageBuilder_modules/textBlock_initial');

                } else if (get_row_layout() == 'spacer_module') {
                    get_template_part('./pageBuilder/pageBuilder_modules/spacer');

                } else if (get_row_layout() == 'form_module') {
                    get_template_part('./pageBuilder/pageBuilder_modules/formModule_initial');

                } else if (get_row_layout() == 'switchContent_module') {
                    get_template_part('./pageBuilder/pageBuilder_modules/switchContent_initial');

                } else if (get_row_layout() == 'scrollContent_module') {
                    get_template_part('./pageBuilder/pageBuilder_modules/scrollContent_initial');
                    
                } else if (get_row_layout() == 'social-feed') {
                    get_template_part('./pageBuilder/pageBuilder_modules/social-feed');

                } else {
                    //do nothing
                }
            }
        }
?>
    </main>
<?php
    get_footer();
?>