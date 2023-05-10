<?php
    $hasCustomClass = get_sub_field("lsSection_customClass_include");
    $customClass = get_sub_field("lsSection_customClass");
    $sharer_header = get_sub_field("lsSection_sharer_header");
    $sharer_copy = get_sub_field("lsSection_sharer_copy");
    $sharer_cta_copy = get_sub_field("lsSection_sharer_cta_copy");
    $sharer_cta_href = get_sub_field("lsSection_sharer_cta_href");
    $sharer_carouselItem_array = [];

    $learner_header = get_sub_field("lsSection_learner_header");
    $learner_copy = get_sub_field("lsSection_learner_copy");
    $learner_cta_copy = get_sub_field("lsSection_learner_cta_copy");
    $learner_cta_href = get_sub_field("lsSection_learner_cta_href");
    $learner_carouselItem_array = [];

    while (have_rows("lsSection_sharer_repeater")) {
        the_row();
        $carouselItem_details = array();

        $itemType = get_sub_field("item_type");
        $itemVideoThumbnail = get_sub_field("item_video_thumbnail");
        $itemVideo = get_sub_field("item_video");
        $itemImage = get_sub_field("item_image");
        $itemName = get_sub_field("item_name");
        $itemTagline =get_sub_field("item_tagline");
        $itemCategories = [];
        $itemLevel = get_sub_field("item_level");
        $itemLevelAttribute = get_sub_field("item_levelAttribute");
        $itemContactLink = get_sub_field("item_contactLink");

        while (have_Rows("item_categories_repeater")) {
            the_row();
            $itemCategoryCopy = get_sub_field("item_category");

            array_push($itemCategories, $itemCategoryCopy);
        }

        $carouselItem_details["itemType"] = $itemType;
        $carouselItem_details["itemVideoThumbnail"] = $itemVideoThumbnail;
        $carouselItem_details["itemVideo"] = $itemVideo;
        $carouselItem_details["itemImage"] = $itemImage;
        $carouselItem_details["itemName"] = $itemName;
        $carouselItem_details["itemTagline"] = $itemTagline;
        $carouselItem_details["itemCategories"] = $itemCategories;
        $carouselItem_details["itemLevel"] = $itemLevel;
        $carouselItem_details["itemLevelAttribute"] = $itemLevelAttribute;
        $carouselItem_details["itemContactLink"] = $itemContactLink;

        array_push($sharer_carouselItem_array, $carouselItem_details);
    }

    while (have_rows("lsSection_learner_repeater")) {
        the_row();
        $carouselItem_details = array();

        $itemType = get_sub_field("item_type");
        $itemVideoThumbnail = get_sub_field("item_video_thumbnail");
        $itemVideo = get_sub_field("item_video");
        $itemImage = get_sub_field("item_image");
        $itemName = get_sub_field("item_name");
        $itemTagline =get_sub_field("item_tagline");
        $itemCategories = [];
        $itemLevel = get_sub_field("item_level");
        $itemLevelAttribute = get_sub_field("item_levelAttribute");
        $itemContactLink = get_sub_field("item_contactLink");

        while (have_Rows("item_categories_repeater")) {
            the_row();
            $itemCategoryCopy = get_sub_field("item_category");

            array_push($itemCategories, $itemCategoryCopy);
        }

        $carouselItem_details["itemType"] = $itemType;
        $carouselItem_details["itemVideoThumbnail"] = $itemVideoThumbnail;
        $carouselItem_details["itemVideo"] = $itemVideo;
        $carouselItem_details["itemImage"] = $itemImage;
        $carouselItem_details["itemName"] = $itemName;
        $carouselItem_details["itemTagline"] = $itemTagline;
        $carouselItem_details["itemCategories"] = $itemCategories;
        $carouselItem_details["itemLevel"] = $itemLevel;
        $carouselItem_details["itemLevelAttribute"] = $itemLevelAttribute;
        $carouselItem_details["itemContactLink"] = $itemContactLink;

        array_push($learner_carouselItem_array, $carouselItem_details);
    }
?>
    <section id="learnerSharer" class="lsSection <?php if ($hasCustomClass) { echo $customClass; } ?>">
        <div class="lsSection_outer">
            <div class="lsSection_switch">
                <div class="lsSection_switchInner">
                    <div class="lsSection_switchContainer">
                        <div class="lsSection_switchBackground"></div>
                        <p class="active" onclick="switch_sharerLearnerContent(this)">Sharers</p>
                        <p onclick="switch_sharerLearnerContent(this)">Learners</p>
                    </div>
                </div>
            </div>

            <div class="lsSection_inner">
                <div class="lsCarouselItem active">
                    <div class="lsCarousel_content grid-col-1-1">
                        <div class="contentContainer">
<?php
                            if ($sharer_header) {
?>
                                <h4><?php echo $sharer_header; ?></h4>
<?php
                            }

                            if ($sharer_copy) {
?>
                                <p><?php echo $sharer_copy; ?></p>
<?php
                            }

                            if ($sharer_cta_copy) {
?>
                                <div class="ctaButton buttonblue">
                                    <div class="ctaButton_inner">
                                        <a href="<?php echo $sharer_cta_href; ?>"><?php echo $sharer_cta_copy; ?></a>
                                    </div>
                                </div>
<?php
                            }
?>
                        </div>
                    </div>
                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
<?php
                                    for ($a = 0; $a < count($sharer_carouselItem_array); $a++) {
                                        $itemType = $sharer_carouselItem_array[$a]["itemType"];
                                        $itemVideoThumbnail = $sharer_carouselItem_array[$a]["itemVideoThumbnail"];
                                        $itemVideo = $sharer_carouselItem_array[$a]["itemVideo"];
                                        $itemImage = $sharer_carouselItem_array[$a]["itemImage"];
                                        $itemName = $sharer_carouselItem_array[$a]["itemName"];
                                        $itemTagline =$sharer_carouselItem_array[$a]["itemTagline"];
                                        $itemCategories = $sharer_carouselItem_array[$a]["itemCategories"];
                                        $itemLevel = $sharer_carouselItem_array[$a]["itemLevel"];
                                        $itemLevelAttribute = $sharer_carouselItem_array[$a]["itemLevelAttribute"];
                                        $itemContactLink = $sharer_carouselItem_array[$a]["itemContactLink"];

                                        if ($itemType == "video") {
?>
                                            <div class="carouselItem video <?php if ($a == 0) { echo "active"; } ?>">
                                                <div class="videoItem">
                                                    <div class='video_container' playPause='play'>
                                                        <div class='video_thumbnail' style='background-image: url(<?php echo $itemVideoThumbnail; ?>);'></div>
                        
                                                        <div class='video_overlay'>                        
                                                            <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                                <div class="ctaButton_inner">
                                                                    <a><span></span> watch video</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="videoContainer">
                                                            <video class='video' onclick="do_playPauseVideo(this)">
                                                                <source src='<?php echo $itemVideo; ?>'>
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php
                                        } else if ($itemType == "profileCard") {
?>
                                            <div class="carouselItem <?php if ($a == 0) { echo "active"; } ?>">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $itemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">sharing</p>

                                                        <p class="profileName"><?php echo $itemName; ?></p>

                                                        <p class="profileTag"><?php echo $itemTagline; ?></p>

                                                        <div class="profileCategoriesContainer">
<?php
                                                            for ($b = 0; $b < count($itemCategories); $b++) {
?>
                                                                <p class="profileCategory"><?php echo $itemCategories[$b]; ?></p>
<?php
                                                            }
?>
                                                        </div>
<?php
                                                        if ($itemLevelAttribute) {
?>
                                                            <div class="levelContainer">
                                                                <p>Level <?php echo $itemLevel; ?></p>
                                                                <p><?php echo $itemLevelAttribute; ?></p>
                                                            </div>
<?php
                                                        }

                                                        if ($itemContactLink) {
?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a target="_blank" href="<?php echo $itemContactLink; ?>">Book a chat</a>
                                                                </div>
                                                            </div>
<?php
                                                        }
?>                                                        
                                                    </div>
                                                </div>
                                            </div> 
<?php
                                        }
                                    }
?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft" onclick="shift_carouselLeft(this)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lsCarouselItem">
                    <div class="lsCarousel_content grid-col-1-1">
                        <div class="contentContainer">
<?php
                            if ($learner_header) {
?>
                                <h4><?php echo $learner_header; ?></h4>
<?php
                            }

                            if ($learner_copy) {
?>
                                <p><?php echo $learner_copy; ?></p>
<?php
                            }

                            if ($learner_cta_copy) {
?>
                                <div class="ctaButton buttonblue">
                                    <div class="ctaButton_inner" style="background-color: rgb(255, 114, 115); border-color: rgb(255, 114, 115);">
                                        <a href="<?php echo $learner_cta_href; ?>"><?php echo $learner_cta_copy; ?></a>
                                    </div>
                                </div>
<?php
                            }
?>
                        </div>
                    </div>
                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
<?php
                                    for ($a = 0; $a < count($learner_carouselItem_array); $a++) {
                                        $itemType = $learner_carouselItem_array[$a]["itemType"];
                                        $itemVideoThumbnail = $learner_carouselItem_array[$a]["itemVideoThumbnail"];
                                        $itemVideo = $learner_carouselItem_array[$a]["itemVideo"];
                                        $itemImage = $learner_carouselItem_array[$a]["itemImage"];
                                        $itemName = $learner_carouselItem_array[$a]["itemName"];
                                        $itemTagline =$learner_carouselItem_array[$a]["itemTagline"];
                                        $itemCategories = $learner_carouselItem_array[$a]["itemCategories"];
                                        $itemLevel = $learner_carouselItem_array[$a]["itemLevel"];
                                        $itemLevelAttribute = $learner_carouselItem_array[$a]["itemLevelAttribute"];
                                        $itemContactLink = $learner_carouselItem_array[$a]["itemContactLink"];

                                        if ($itemType == "video") {
?>
                                            <div class="carouselItem video <?php if ($a == 0) { echo "active"; } ?>">
                                                <div class="videoItem">
                                                    <div class='video_container' playPause='play'>
                                                        <div class='video_thumbnail' style='background-image: url(<?php echo $itemVideoThumbnail; ?>);'></div>
                        
                                                        <div class='video_overlay'>                        
                                                            <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                                <div class="ctaButton_inner">
                                                                    <a><span></span> watch video</a>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div class="videoContainer">
                                                            <video class='video' onclick="do_playPauseVideo(this)">
                                                                <source src='<?php echo $itemVideo; ?>'>
                                                            </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php
                                        } else if ($itemType == "profileCard") {
?>
                                            <div class="carouselItem <?php if ($a == 0) { echo "active"; } ?>">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $itemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">learning</p>

                                                        <p class="profileName"><?php echo $itemName; ?></p>

                                                        <p class="profileTag"><?php echo $itemTagline; ?></p>

                                                        <div class="profileCategoriesContainer">
<?php
                                                            for ($b = 0; $b < count($itemCategories); $b++) {
?>
                                                                <p class="profileCategory"><?php echo $itemCategories[$b]; ?></p>
<?php
                                                            }
?>
                                                        </div>
<?php
                                                        if ($itemLevelAttribute) {
?>
                                                            <div class="levelContainer">
                                                                <p><?php echo $itemLevelAttribute; ?></p>
                                                            </div>
<?php
                                                        }

                                                        if ($itemContactLink) {
?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a href="<?php echo $itemContactLink; ?>">View profile</a>
                                                                </div>
                                                            </div>
<?php
                                                        }
?>                                                           
                                                    </div>
                                                </div>
                                            </div> 
<?php
                                        }
                                    }
?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft" onclick="shift_carouselLeft(this)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>