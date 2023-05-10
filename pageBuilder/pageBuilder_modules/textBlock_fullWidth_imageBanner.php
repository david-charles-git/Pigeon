<?php
    /*
        File Name : textBlock_fullWidth_imageBanner
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the full width image banner text block module.
        
        EXTENDS - textBlock_initial
    */

    $textBlock_heading = get_sub_field('textBlock_heading');
    $textBlock_copy = get_sub_field('textblock_copy');
    $textBlock_hasReadMore = get_sub_field('textblock_copy_hasReadMore');
    $image_desktop = get_sub_field('image_desktop');
    $image_mobile = get_sub_field('image_mobile');
    $overlay_opacity = get_sub_field('image_overlay_opacity');

    if ($image_mobile != null && $image_mobile != '') {
?>
        <div class="textBlock_image bgImage_cover hide_desktop hide_tablet" style="background-image: url(<?php echo $image_mobile; ?>);"></div>
<?php
        if ($image_desktop != null && $image_desktop != '') {
?>
            <div class="textBlock_image bgImage_cover hide_mobile" style="background-image: url(<?php echo $image_desktop; ?>);"></div>
<?php
        }
    } else {
        if ($image_desktop != null && $image_desktop != '') {
?>
            <div class="textBlock_image bgImage_cover" style="background-image: url(<?php echo $image_desktop; ?>);"></div>
<?php
        }
    }

    if ($overlay_opacity > 0) {
?>
        <div class="overlay bclr_black" style="opacity:<?php echo $overlay_opacity; ?>;"></div>
<?php
    }
?>
    <div class="textBlock_content sw_90">
<?php
        if ($textBlock_heading != null && $textBlock_heading != '') {
?>
            <h2 class="clr_white"><?php echo $textBlock_heading; ?></h2>
<?php
        }

        if ($textBlock_copy != null && $textBlock_copy != '') {
            if ($textBlock_hasReadMore) {
                $readMore_desktop = get_sub_field('textblock_wordCount_desktop');
                $readMore_tablet = get_sub_field('textblock_wordCount_tablet');
                $readMore_mobile = get_sub_field('textblock_wordCount_mobile');
                $readMore_args = array (
                    'content' => $textBlock_copy,
                    'readMore_desktop' => $readMore_desktop,
                    'readMore_tablet' => $readMore_tablet,
                    'readMore_mobile' => $readMore_mobile,
                );

                set_readMore($readMore_args); //custom function

            } else {
?>
                <p class="clr_white"><?php echo $textBlock_copy; ?></p>
<?php
            }
        }
?>
    </div>