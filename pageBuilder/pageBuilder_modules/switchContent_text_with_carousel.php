<?php
    /*
        File Name : switchContent_text_with_carousel
        Author : David Charles - Add Mustard
        Date created : 26/04/2022
        Description : 
            This script will create the text width carousel switch content module.
        
        EXTENDS - switchContent_initial
    */

    if (have_rows('switchContent_text_with_carousel_repeater')) {
        $switchContent_array = array();

        while (have_rows('switchContent_text_with_carousel_repeater')) {
            the_row();
            $content_array = array();
            $switch_copy = get_sub_field('switch_copy');
            $content_header = get_sub_field('content_header');
            $content_copy = get_sub_field('content_copy');
            $content_copy_hasReadMore = get_sub_field('content_readMore_include');
            $readMore_wordCount_desktop = get_sub_field('content_wordCount_desktop');
            $readMore_wordCount_tablet = get_sub_field('content_wordCount_tablet');
            $readMore_wordCount_mobile = get_sub_field('content_wordCount_mobile');
            $content_button_link = get_sub_field('content_button_link');
            $content_button_copy = get_sub_field('content_button_copy');
            $content_button_opensInNewWindow = get_sub_field('content_button_opensInNewWindow');
            $carousel_item_array = array();

            if (have_rows('switchContent_text_with_carousel_carousel_repeater')) {
                while (have_rows('switchContent_text_with_carousel_carousel_repeater')) {
                    the_row();
                    $carousel_item = array();
                    $carousel_item_type = get_sub_field('carousel_item_type');
                    $carousel_item_image = get_sub_field('carousel_item_image');
                    $carousel_item_media = get_sub_field('carousel_item_media');
                    $carousel_item_heading = get_sub_field('carousel_item_heading');
                    $carousel_item_profileType = get_sub_field('carousel_item_profileType');
                    $carousel_item_tagLine = get_sub_field('carousel_item_tagLine');
                    $carousel_item_categories = get_sub_field('carousel_item_categories');

                    $carousel_item["item_type"] = $carousel_item_type;
                    $carousel_item["item_image"] = $carousel_item_image;
                    $carousel_item["item_media"] = $carousel_item_media;
                    $carousel_item["item_profileType"] = $carousel_item_profileType;
                    $carousel_item["item_heading"] = $carousel_item_heading;
                    $carousel_item["item_tagLine"] = $carousel_item_tagLine;
                    $carousel_item["item_categories"] = $carousel_item_categories;

                    array_push($carousel_item_array, $carousel_item);
                }
            }

            $content_array["switch_copy"] = $switch_copy;
            $content_array["content_header"] = $content_header;
            $content_array["content_copy"] = $content_copy;
            $content_array["content_copy_hasReadMore"] = $content_copy_hasReadMore;
            $content_array["readMore_wordCount_desktop"] = $readMore_wordCount_desktop;
            $content_array["readMore_wordCount_tablet"] = $readMore_wordCount_tablet;
            $content_array["readMore_wordCount_mobile"] = $readMore_wordCount_mobile;
            $content_array["content_button_opensInNewWindow"] = $content_button_opensInNewWindow;
            $content_array["content_button_link"] = $content_button_link;
            $content_array["content_button_copy"] = $content_button_copy;
            $content_array["carousel_item_array"] = $carousel_item_array;

            array_push($switchContent_array, $content_array);
        }

        $switchContent_array_count = count($switchContent_array);

        if ($switchContent_array_count > 0) {
?>
            <div class='switchContent_switchContainer_outer'>
                <div class='switchContent_switchContainer_inner'>
                    <div class='switchContent_switchs bclr_white'>
                        <!--<div class='switchContent_switch_slider bclr_coral' style="width: <?php echo (100 / $switchContent_array_count); ?>%; left: 134px;"></div>-->
                        <div class='switchContent_switch_slider bclr_coral' style="width: 50%; left: 50%;"></div>
<?php
                        for ($a = 0; $a < $switchContent_array_count; $a++){
                            if ($switchContent_array[$a]["switch_copy"] != null && $switchContent_array[$a]["switch_copy"] != '') {
?>
                                <p class='p_xLarge <?php if ($a == 1) { echo "clr_white"; } ?>' onclick='do_switchContent_switchAll()'><?php echo $switchContent_array[$a]["switch_copy"]; ?></p>
<?php
                            }
                        }
?>
                    </div>
                </div>
            </div>

<?php
            for ($b = 0; $b < $switchContent_array_count; $b++) {
?>
                <div class='switchContent_text_width_carousel_item <?php if ($b == 1) { echo "active"; } ?>' style='display: <?php if ($b == 1) { echo 'block'; } else { echo 'none'; } ?>;' >
                    <div class='switchContent_textContent_container_outer'>
                        <div class='switchContent_textContent_container_inner sw_90'>
                            <div class='switchContent_textContent'>
<?php
                                if ($switchContent_array[$b]["content_header"] != null && $switchContent_array[$b]["content_header"] != '') {
?>
                                    <h3 class='<?php if ($b == 1) { echo 'clr_coral'; } else { echo 'clr_blue'; } ?>'><?php echo $switchContent_array[$b]["content_header"]; ?></h3>
<?php
                                } 

                                if ($switchContent_array[$b]["content_copy"] != null && $switchContent_array[$b]["content_copy"] != '') {
                                    if ($switchContent_array[$b]["content_copy_hasReadMore"]) {
                                        $readMore_desktop = $switchContent_array[$b]["readMore_wordCount_desktop"];
                                        $readMore_tablet = $switchContent_array[$b]["readMore_wordCount_tablet"];
                                        $readMore_mobile = $switchContent_array[$b]["readMore_wordCount_mobile"];
                                        $readMore_args = array (
                                            'content' => $switchContent_array[$b]["content_copy"],
                                            'readMore_desktop' => $readMore_desktop,
                                            'readMore_tablet' => $readMore_tablet,
                                            'readMore_mobile' => $readMore_mobile,
                                        );

                                        set_readMore($readMore_args); //custom function

                                    } else {
?>
                                        <p><?php echo $switchContent_array[$b]["content_copy"]; ?></p>
<?php
                                    }
                                }
?>
                                <div>
                                    <p class="btn_black">
                                        <span></span>
                                        <a href="<?php echo $switchContent_array[$b]["content_button_link"]; ?>" <?php if ($switchContent_array[$b]["content_button_opensInNewWindow"]) { echo 'target="_blank"'; } ?>><?php echo $switchContent_array[$b]["content_button_copy"]; ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='switchContent_carousel_container carousel_parent'>
                        <div class='carousel_hoverScroll_container right hide_tablet hide_mobile' onmouseenter='do_switchContent_text_with_carousel_mouseOverScroll()'></div>
                        
                        <div class='carousel_outer' ontouchstart='do_switchContent_text_with_carousel_touchStart()'>
<?php
                            $carousel_array = $switchContent_array[$b]["carousel_item_array"];
                            $carousel_array_count = count($carousel_array);

                            if ($carousel_array_count > 0) {
?>
                                <div class='carousel_inner'>
<?php
                                    for ($c = 0; $c < $carousel_array_count; $c++) {
?>
                                        <div class='carousel_item <?php echo $carousel_array[$c]['item_type']; if ($c == 0) { echo ' active'; } ?>'>
<?php
                                            if ($carousel_array[$c]['item_type'] == 'video') {
?>
                                                <div class='overlay_playButton' onclick='do_carouselItem_playPause_SiblingVideo()' playPause='play'></div>

                                                <div class='carousel_item_video'>
                                                    <video poster='<?php echo $carousel_array[$c]["item_image"]; ?>'>
                                                        <source src='<?php echo $carousel_array[$c]["item_media"]; ?>' />
                                                    </video>
                                                </div>
<?php
                                            } else if ($carousel_array[$c]['item_type'] == 'profile_card') {
                                                $carousel_category_array = explode(',', $carousel_array[$c]["item_categories"]);
                                                $carousel_category_count = count($carousel_category_array);
?>
                                                <div class='carousel_item_backgroundImage bgImage_cover' style='background-image: url(<?php echo $carousel_array[$c]["item_image"]; ?>);'></div>
                                                
                                                <div class='overlay bclr_black'></div>
                                                
                                                <div class='carousel_item_content bclr_white'>
                                                    <p class='p_xSmall fnt_caps fnt_bold <?php if ($b == 1) { echo "clr_coral"; } else { echo "clr_blue"; } ?>'><?php echo $carousel_array[$c]["item_profileType"]; ?></p>
                                                        
                                                    <h4 class='fnt_bold <?php if ($b == 1) { echo "clr_coral"; } else { echo "clr_blue"; } ?>'><?php echo $carousel_array[$c]["item_heading"]; ?></h4>

                                                    <h5 class='fnt_bold'><?php echo $carousel_array[$c]["item_tagLine"]; ?></h5>
<?php
                                                    if ($carousel_category_count > 1) {
?>
                                                        <div class='item_categories_container'>
<?php
                                                            for ($d = 0; $d < $carousel_category_count; $d++) {
?>
                                                                <p class='p_xSmall <?php if ($b == 1) { echo "clr_coral"; } else { echo "clr_blue"; } ?>'><?php echo $carousel_category_array[$d]; ?></p>
<?php
                                                            }
?>
                                                        </div>
<?php
                                                    }
?>
                                                </div>
<?php
                                            }
?>
                                        </div>
<?php
                                    }
?>
                                </div>
<?php
                            }
?>
                        </div>
<?php
                        if ($carousel_array_count > 0) {
?>
                            <div class='switchContent_carousel_buttons'>
                                <div class='switchContent_carousel_button left bgImage_cover' onclick='do_switchContent_text_with_carousel_carousel_shift()'></div>

                                <div class='switchContent_carousel_button right bgImage_cover' onclick='do_switchContent_text_with_carousel_carousel_shift()'></div>
                            </div>
<?php
                        }
?>
                    </div>
                </div>
<?php
            }
        } else {
            //do nothing
        }

    } else {
        //do nothing
    }
?>
