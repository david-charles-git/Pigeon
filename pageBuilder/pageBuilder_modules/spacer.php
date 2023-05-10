<?php
    /*
        File Name : spacer
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the parent container and child eleemnts for the spacer module.
    */

    $has_customID = get_sub_field('customID_include');
    $customID = get_sub_field('customID');
    $desktop_height = get_sub_field('spacer_module_height_desktop');
    $tablet_height = get_sub_field('spacer_module_height_tablet');
    $mobile_height = get_sub_field('spacer_module_height_mobile');

    if ($tablet_height == null || $tablet_height == '') {
        $tablet_height = $desktop_height;

    }

    if ($mobile_height == null || $mobile_height == '') {
        $mobile_height = $tablet_height;

    }
?>
<section class='spacer_parent' <?php if ($has_customID) {  echo "id='" . $customID . "'"; } ?>>
    <span class="hide_mobile hide_tablet" style='height: <?php echo $desktop_height; ?>px;'></span>
    <span class="hide_mobile hide_desktop" style='height: <?php echo $tablet_height; ?>px;'></span>
    <span class="hide_tablet hide_desktop" style='height: <?php echo $mobile_height; ?>px;'></span>
</section>