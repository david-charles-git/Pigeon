<?php
    /*
        File Name : textBlock_initial
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the parent container for the form module.
            It will then fetch the file to generate the text block module based on the type selected by the user.
    */
    
    $has_customID = get_sub_field('customID_include');
    $customID = get_sub_field('customID');
    $textBlock_type = get_sub_field('textBlock_type');

?>
<section class="textblock_parent <?php echo $textBlock_type; ?>" <?php if ($has_customID) { echo 'id="' . $customID . '"'; } ?>>
    <div class="textBlock_container">
<?php
        if ($textBlock_type == 'fullWidth_imageBanner') {
            get_template_part('./pageBuilder/pageBuilder_modules/textBlock_fullWidth_imageBanner');

        } else {
            //do nothing
        }
?>
    </div>
</section>