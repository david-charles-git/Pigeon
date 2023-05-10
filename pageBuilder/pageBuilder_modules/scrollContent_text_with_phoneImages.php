<?php



?>
    <div class='scrollContent_text_with_phoneImage_container carousel_outer' ontouchstart='do_scrollContent_text_with_phoneImages_touchStart()'>
        <div class='scrollContent_text_with_phoneImage_container_inner carousel_inner'>
<?php
            $scrollContent_count = count(get_sub_field('scrollingContent_text_with_phoneImages_content_repeater'));
            $scrollContent_array = [];
            $scrollContent_outerPhoneImage_desktop = get_sub_field('scrollingContent_text_with_phoneImages_outerPhoneImage_desktop');
            $scrollContent_outerPhoneImage_mobile = get_sub_field('scrollingContent_text_with_phoneImages_outerPhoneImage_mobile');
            $scrollContent_video_intro = get_sub_field('scrollingContent_text_with_phoneImages_video_heading');
            $scrollContent_video_poster = get_sub_field('scrollingContent_text_with_phoneImages_video_poster');
            $scrollContent_video_source = get_sub_field('scrollingContent_text_with_phoneImages_video_source');

            if (have_rows('scrollingContent_text_with_phoneImages_content_repeater')) {
                $scrollContent_while_count = 0;

                while (have_rows('scrollingContent_text_with_phoneImages_content_repeater')) {
                    the_row();
                    $content_item_array = array();
                    $has_icons = get_sub_field('scrollingContent_text_with_phoneImages_content_icons_include');
                    $content_heading = get_sub_field('scrollingContent_text_with_phoneImages_content_heading');
                    $content_copy = get_sub_field('scrollingContent_text_with_phoneImages_content_copy');
                    $content_has_readMore = get_sub_field('scrollingContent_text_with_phoneImages_content_copy_readMore_include');
                    $readmore_wordCount_desktop = get_sub_field('scrollingContent_text_with_phoneImages_content_wordCount_desktop');
                    $readmore_wordCount_tablet = get_sub_field('scrollingContent_text_with_phoneImages_content_wordCount_tablet');
                    $readmore_wordCount_mobile = get_sub_field('scrollingContent_text_with_phoneImages_content_wordCount_mobile');
                    $content_cta_href = get_sub_field('scrollingContent_text_with_phoneImages_content_cta_href');
                    $content_cta_copy = get_sub_field('scrollingContent_text_with_phoneImages_content_cta_copy');
                    $content_cta_opensInNewWindow = get_sub_field('scrollingContent_text_with_phoneImages_content_cta_opensInNewWindow');
                    $content_phone_image_desktop = get_sub_field('scrollingContent_text_with_phoneImages_content_phone_image_desktop');
                    $content_phone_image_mobile = get_sub_field('scrollingContent_text_with_phoneImages_content_phone_image_mobile');

                    $content_item_array['has_icons'] = $has_icons;
                    $content_item_array['content_heading'] = $content_heading;
                    $content_item_array['content_copy'] = $content_copy;
                    $content_item_array['content_has_readMore'] = $content_has_readMore;
                    $content_item_array['readmore_wordCount_desktop'] = $readmore_wordCount_desktop;
                    $content_item_array['readmore_wordCount_tablet'] = $readmore_wordCount_tablet;
                    $content_item_array['readmore_wordCount_mobile'] = $readmore_wordCount_mobile;
                    $content_item_array['content_cta_href'] = $content_cta_href;
                    $content_item_array['content_cta_copy'] = $content_cta_copy;
                    $content_item_array['content_cta_opensInNewWindow'] = $content_cta_opensInNewWindow;
                    $content_item_array['content_phone_image_desktop'] = $content_phone_image_desktop;
                    $content_item_array['content_phone_image_mobile'] = $content_phone_image_mobile;

                    array_push($scrollContent_array, $content_item_array);
                }
            }

            for ($a = 0; $a < $scrollContent_count; $a++) {
?>
                <div class='scrollContent_content_item sw_90 carousel_item <?php if ($a == 0) { echo 'active'; } ?>'>
<?php
                    if ($scrollContent_array[$a]['has_icons']) {
?>
                        <div class='scrollContent_content_icons'>
<?php
                            for ($b = 0; $b < $scrollContent_count; $b++) {
                                if ($a == $b) {
                                    $icon = 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon/Images/Pigeon_pink.svg';

                                } else {
                                    $icon = 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon/Images/Pigeon_black.svg';
                                }
?>
                                <span class='bgImage_width100' style='background-image:url(<?php echo $icon; ?>);' onclick='do_scrollContent_text_with_phoneImages_goToSection(this)'></span>
<?php
                            }
?>
                        </div>
<?php
                    }

                    if ($scrollContent_array[$a]['content_heading'] != null && $scrollContent_array[$a]['content_heading'] != '') {
?>
                        <h2 class='fnt_bold'><?php echo $scrollContent_array[$a]['content_heading'];?></h2>
<?php
                    }

                    if ($scrollContent_array[$a]["content_copy"] != null && $scrollContent_array[$a]["content_copy"] != '') {
                        if ($scrollContent_array[$a]["content_has_readMore"]) {
                            $readMore_desktop = $scrollContent_array[$a]["readmore_wordCount_desktop"];
                            $readMore_tablet = $scrollContent_array[$a]["readmore_wordCount_tablet"];
                            $readMore_mobile = $scrollContent_array[$a]["readmore_wordCount_mobile"];
                            $readMore_args = array (
                                'content' => $scrollContent_array[$a]["content_copy"],
                                'readMore_desktop' => $readMore_desktop,
                                'readMore_tablet' => $readMore_tablet,
                                'readMore_mobile' => $readMore_mobile,
                            );

                            set_readMore($readMore_args); //custom function

                        } else {
?>
                         <p><?php echo $scrollContent_array[$a]["content_copy"]; ?></p>
<?php
                        }
                    }

                    if ($scrollContent_array[$a]["content_cta_copy"] != null && $scrollContent_array[$a]["content_cta_copy"] != '') {
?>
                        <div>
                            <p class="btn_black">
                                <span></span>
                                <a href='<?php echo $scrollContent_array[$a]["content_cta_href"]; ?>' <?php if ($scrollContent_array[$a]["content_cta_opensInNewWindow"]) { echo 'target="_blank"'; } ?>><?php echo $scrollContent_array[$a]["content_cta_copy"]; ?></a>
                            </p>
                        </div>
<?php
                    }
?>
                </div>
<?php
        }
?>
        </div>
    </div> 

    <div class='scrollContent_phoneImages_container'>
        <div class='scrollContent_phoneImages_outer'>
<?php
            if ($scrollContent_outerPhoneImage_mobile != null && $scrollContent_outerPhoneImage_mobile != '') {
?>
                <div class='scrollContent_phoneImage_outer_mobile bgImage_height100 hide_desktop hide_tablet' style='background-image:url(<?php echo $scrollContent_outerPhoneImage_mobile; ?>);'></div>
<?php
                if ($scrollContent_outerPhoneImage_desktop != null && $scrollContent_outerPhoneImage_desktop != '') {
?>
                    <div class="scrollContent_phoneImage_outer_dektop bgImage_height100 hide_mobile" style="background-image: url(<?php echo $scrollContent_outerPhoneImage_desktop; ?>);"></div>
<?php
                }

            } else {
                if ($scrollContent_outerPhoneImage_desktop != null && $scrollContent_outerPhoneImage_desktop != '') {
?>
                    <div class='scrollContent_phoneImage_outer_desktop bgImage_height100' style='background-image:url(<?php echo $scrollContent_outerPhoneImage_desktop; ?>);'></div>
<?php
                }
            }
?>            
            <div class='scrollContent_phoneImages_inner'>
<?php


                for ($a = 0; $a < $scrollContent_count; $a++) {
                    if ($scrollContent_array[$a]['content_phone_image_mobile'] != null && $scrollContent_array[$a]['content_phone_image_mobile'] != '') {
?>
                        <div class='scrollContent_phoneImages_item_mobile bgImage_height100 hide_desktop hide_tablet' style='background-image: url(<?php echo $scrollContent_array[$a]['content_phone_image_mobile']; ?>);'></div>
<?php
                        if ($scrollContent_array[$a]['content_phone_image_desktop'] != null && $scrollContent_array[$a]['content_phone_image_desktop'] != '') {
?>
                            <div class='scrollContent_phoneImages_item_desktop bgImage_height100' style='background-image: url(<?php echo $scrollContent_array[$a]['content_phone_image_desktop']; ?>);'></div>
<?php
                        }

                    } else {
                        if ($scrollContent_array[$a]['content_phone_image_desktop'] != null && $scrollContent_array[$a]['content_phone_image_desktop'] != '') {
?>
                            <div class='scrollContent_phoneImages_item_desktop bgImage_height100 <?php if ($a == 0) { echo 'active'; } ?>' style='background-image: url(<?php echo $scrollContent_array[$a]['content_phone_image_desktop']; ?>);'></div>
<?php
                        }
                    }
                }
?>
            </div>

            <div class='scrollContent_video_container' id='promoVid'>
                <div class='scrollContent_video_container_video'>
                    <div onclick='do_carouselItem_playPause_SiblingVideo()' playpause='play' class='scrollContent_video_container_video_overlay overlay_playButton' style="background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon'; ?>/Images/pigeon-play.svg);"></div>

                    <video poster='<?php echo $scrollContent_video_poster; ?>' id='promoVidPlayer'>
                        <source src='<?php echo $scrollContent_video_source; ?>' id='videoSrc'></source>
                    </video>
                </div>
            </div>
        </div>
    </div>