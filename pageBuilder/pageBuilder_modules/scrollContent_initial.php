<?php
    /*
        File Name : scrollContent_initial
        Author : David Charles - Add Mustard
        Date created : 02/052022
        Description : 
            This script will created the parent container for the scroll content Module.
            It will then fetch the file to generate the content based on the type selected by the user.
    */
    $has_customID = get_sub_field('customID_include');
    $customID = get_sub_field('customID');
    $scrollContent_type = get_sub_field('scrollContent_type');
?>
    <section class='scrollContent_parent <?php echo $scrollContent_type; ?>' <?php if ($has_customID) { echo 'id="' . $customID . '"';} ?>>
        <div class='scrollContent_container'>
<?php
            if ($scrollContent_type == 'text_with_phoneImage') {
                get_template_part('./pageBuilder/pageBuilder_modules/scrollContent_text_with_phoneImages');

            } else {
                //do nothing
            }
?>
        </div>
    </section>