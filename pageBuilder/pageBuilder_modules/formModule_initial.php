<?php
    /*
        File Name : formModule_initial
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the parent container for the form Module.
            It will then fetch the file to generate the form module based on the type selected by the user.
    */
    $has_customID = get_sub_field('customID_include');
    $customID = get_sub_field('customID');
    $formModule_type = get_sub_field('formModule_type');
?>
<section class="form_image_parent <?php echo $formModule_type; ?>" <?php if ($has_customID) { echo 'id="' . $customID . '"';} ?>>
    <div class="form_image_container">

<?php
        if ($formModule_type == 'with_image_left') {
            get_template_part('./pageBuilder/pageBuilder_modules/formModule_with_image_left');

        } else {
            //do nothing
        }
?>
    </div>
</section>