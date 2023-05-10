<?php
    /*
        File Name : switchContent_initial
        Author : David Charles - Add Mustard
        Date created : 26/04/2022
        Description : 
            This script will created the parent container for the switch content Module.
            It will then fetch the file to generate the content based on the type selected by the user.
    */
    $has_customID = get_sub_field('customID_include');
    $customID = get_sub_field('customID');
    $switchContent_type = get_sub_field('switchContent_type');
?>
<section class="switchContent_parent <?php echo $switchContent_type; ?>" <?php if ($has_customID) { echo 'id="' . $customID . '"';} ?>>
    <div class='switchContent_container'>

<?php
        if ($switchContent_type == 'text_with_carousel') {
            get_template_part('./pageBuilder/pageBuilder_modules/switchContent_text_with_carousel');

        } else {
            //do nothing
        }
?>
    </div>
</section>