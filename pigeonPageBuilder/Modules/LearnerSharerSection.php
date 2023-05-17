<?php
$hasCustomClass = get_sub_field("lsSection_customClass_include");
$customClass = get_sub_field("lsSection_customClass");
$serviceDeisplay = get_sub_field("section_display");

$sharer_header = get_sub_field("lsSection_sharer_header");
$sharer_copy = get_sub_field("lsSection_sharer_copy");
$sharer_copyHasReadMore = get_sub_field("lsSection_sharer_hasReadMore");
$sharer_cta_copy = get_sub_field("lsSection_sharer_cta_copy");
$sharer_cta_href = get_sub_field("lsSection_sharer_cta_href");
$sharer_carouselVideo = get_sub_field("sharerVideo");
$sharer_carouselVideoThumbnail = get_sub_field("sharerVideoThumbnail");
$sharer_maxNumberOfCarouselItems = get_sub_field("sharerNumberOfItems");
$sharer_viewAllLink = get_sub_field("sharer_viewAllLink");

$learner_header = get_sub_field("lsSection_learner_header");
$learner_copy = get_sub_field("lsSection_learner_copy");
$learner_copyHasReadMore = get_sub_field("lsSection_learner_hasReadMore");
$learner_cta_copy = get_sub_field("lsSection_learner_cta_copy");
$learner_cta_href = get_sub_field("lsSection_learner_cta_href");
$learner_carouselVideo = get_sub_field("learnerVideo");
$learner_carouselVideoThumbnail = get_sub_field("learnerVideoThumbnail");
$learner_maxNumberOfCarouselItems = get_sub_field("learnerNumberOfItems");
$learner_viewAllLink = get_sub_field("learner_viewAllLink");
?>
<section id="learnerSharer" class="lsSection <?php if ($hasCustomClass) {
                                                    echo $customClass;
                                                } ?>">
    <div class="lsSection_outer">
        <?php
        if ($serviceDeisplay == "all") {
        ?>
            <div class="lsSection_switch">
                <div class="lsSection_switchInner">
                    <div class="lsSection_switchContainer">
                        <div class="lsSection_switchBackground"></div>
                        <p class="active" onclick="switch_sharerLearnerContent(this)">Sharers</p>
                        <p onclick="switch_sharerLearnerContent(this)">Learners</p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="lsSection_inner">
            <?php
            if ($serviceDeisplay == "all") {
            ?>
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
                                if ($sharer_copyHasReadMore) {
                                    $sharer_readMore_desktop = get_sub_field('lsSection_sharer_readMore_desktop');
                                    $sharer_readMore_tablet = get_sub_field('lsSection_sharer_readMore_tablet');
                                    $sharer_readMore_mobile = get_sub_field('lsSection_sharer_readMore_mobile');
                                    $sharer_readMore_args = array(
                                        'content' => $sharer_copy,
                                        'readMore_desktop' => $sharer_readMore_desktop,
                                        'readMore_tablet' => $sharer_readMore_tablet,
                                        'readMore_mobile' => $sharer_readMore_mobile,
                                    );

                                    set_readMore($sharer_readMore_args); //custom function found in functions.php

                                } else {
                                ?>
                                    <p><?php echo $sharer_copy; ?></p>
                                <?php
                                }
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

                        <div class="seeAllContainer">
                            <div class="inner">
                                <a href="<?php echo $sharer_viewAllLink; ?>">Show all</a>
                            </div>
                        </div>
                    </div>

                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
                                    <div class="carouselItem video active">
                                        <div class="videoItem">
                                            <div class='video_container' playPause='play'>
                                                <div class='video_thumbnail' style='background-image: url(<?php echo $sharer_carouselVideoThumbnail; ?>);'></div>

                                                <div class='video_overlay'>
                                                    <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                        <div class="ctaButton_inner">
                                                            <a><span></span> watch video</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="videoContainer">
                                                    <video class='video' onclick="do_playPauseVideo(this)">
                                                        <source src='<?php echo $sharer_carouselVideo; ?>'>
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $sharerQueryArgs = array(
                                        'post_type' => 'profiles',
                                        'posts_per_page' => $sharer_maxNumberOfCarouselItems,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'profileTypes',
                                                'field'    => 'slug',
                                                'terms'    => 'sharer',
                                            ),
                                        ),
                                    );
                                    $sharerQuery = new WP_QUERY($sharerQueryArgs);
                                    $sharerQueryCount = $sharerQuery->found_posts;

                                    if ($sharerQuery->have_posts()) {
                                        while ($sharerQuery->have_posts()) {
                                            $sharerQuery->the_post();
                                            $sharerItemID = get_the_ID();
                                            $sharerItemImage = get_the_post_thumbnail_url($sharerItemID, "full");
                                            $sharerItemName = get_the_title();
                                            $sharerItemTagline = "";
                                            $sharerItemRating = 1;
                                            $sharerItemLevel = "";
                                            $sharerItemCategories = [];
                                            $sharerItemLevelAttribute = "";
                                            $sharerItemContactLink = "";

                                            if (have_rows('pigeon_profileBuilder')) {
                                                while (have_rows('pigeon_profileBuilder')) {
                                                    the_row();
                                                    $sharerItemTagline = get_sub_field("tagline");
                                                    $sharerItemRating = get_sub_field("rating");
                                                    $sharerItemLevel = get_sub_field("level");
                                                    $sharerItemLevelAttribute = get_sub_field("levelAttribute");
                                                    $sharerItemContactLink = get_sub_field("link");

                                                    if (have_rows("categories")) {
                                                        while (have_rows("categories")) {
                                                            the_row();
                                                            $categoryTitle = get_sub_field("title");

                                                            array_push($sharerItemCategories, $categoryTitle);
                                                        }
                                                    }
                                                }
                                            }

                                            if ($sharerItemLevel === "learner") {
                                                $sharerItemLevel = "Learner";
                                            } else if ($sharerItemLevel === "one") {
                                                $sharerItemLevel = "Level 1";
                                            } else if ($sharerItemLevel === "two") {
                                                $sharerItemLevel = "Level 2";
                                            } else if ($sharerItemLevel === "three") {
                                                $sharerItemLevel = "Level 3";
                                            } else if ($sharerItemLevel === "four") {
                                                $sharerItemLevel = "Level 4";
                                            }
                                    ?>
                                            <div class="carouselItem">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $sharerItemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">sharing</p>

                                                        <p class="profileName"><?php echo $sharerItemName; ?></p>

                                                        <p class="profileTag"><?php echo $sharerItemTagline; ?></p>

                                                        <div class="profileRating">
                                                            <?php
                                                            for ($a = 0; $a < $sharerItemRating; $a++) {

                                                            ?>
                                                                <div class="ratingItem">
                                                                    <img src="<?php echo get_stylesheet_directory_uri() . "/Images/Path388(2).svg"; ?>" />
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="profileCategoriesContainer">
                                                            <?php
                                                            for ($b = 0; $b < count($sharerItemCategories); $b++) {
                                                            ?>
                                                                <p class="profileCategory"><?php echo $sharerItemCategories[$b]; ?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($sharerItemLevelAttribute) {
                                                        ?>
                                                            <div class="levelContainer">
                                                                <p><?php echo $sharerItemLevel; ?></p>
                                                                <span>-</span>
                                                                <p><?php echo $sharerItemLevelAttribute; ?></p>
                                                            </div>
                                                        <?php
                                                        }

                                                        if ($sharerItemContactLink) {
                                                        ?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a target="_blank" href="<?php echo $sharerItemContactLink; ?>">Book a chat</a>
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

                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft hidden" onclick="shift_carouselLeft(this)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)"></div>
                            </div>

                            <div class="dotContainer">
                                <div class="inner" style="grid-template-columns: repeat(<?php echo $sharerQueryCount; ?>, auto);">
                                    <?php
                                    for ($f = 0; $f < $sharerQueryCount; $f++) {
                                    ?>
                                        <div class="dot <?php if ($f === 0) {
                                                            echo " active";
                                                        } ?>" onclick="handleCarouselFrameChange(event)" index="<?php echo $f; ?>"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
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
                                if ($learner_copyHasReadMore) {
                                    $learner_readMore_desktop = get_sub_field('lsSection_learner_readMore_desktop');
                                    $learner_readMore_tablet = get_sub_field('lsSection_learner_readMore_tablet');
                                    $learner_readMore_mobile = get_sub_field('lsSection_learner_readMore_mobile');
                                    $learner_readMore_args = array(
                                        'content' => $learner_copy,
                                        'readMore_desktop' => $learner_readMore_desktop,
                                        'readMore_tablet' => $learner_readMore_tablet,
                                        'readMore_mobile' => $learner_readMore_mobile,
                                    );

                                    set_readMore($learner_readMore_args); //custom function found in functions.php
                                } else {
                                ?>
                                    <p><?php echo $learner_copy; ?></p>
                                <?php
                                }
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

                        <div class="seeAllContainer">
                            <div class="inner">
                                <a href="<?php echo $learner_viewAllLink; ?>">Show all</a>
                            </div>
                        </div>
                    </div>

                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
                                    <div class="carouselItem video active">
                                        <div class="videoItem">
                                            <div class='video_container' playPause='play'>
                                                <div class='video_thumbnail' style='background-image: url(<?php echo $learner_carouselVideoThumbnail; ?>);'></div>

                                                <div class='video_overlay'>
                                                    <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                        <div class="ctaButton_inner">
                                                            <a><span></span> watch video</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="videoContainer">
                                                    <video class='video' onclick="do_playPauseVideo(this)">
                                                        <source src='<?php echo $learner_carouselVideo; ?>'>
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $learnerQueryArgs = array(
                                        'post_type' => 'profiles',
                                        'posts_per_page' => $learner_maxNumberOfCarouselItems,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'profileTypes',
                                                'field'    => 'slug',
                                                'terms'    => 'learner',
                                            ),
                                        ),
                                    );
                                    $learnerQuery = new WP_QUERY($learnerQueryArgs);
                                    $learnerQueryCount = $learnerQuery->found_posts;

                                    if ($learnerQuery->have_posts()) {
                                        while ($learnerQuery->have_posts()) {
                                            $learnerQuery->the_post();
                                            $learnerItemID = get_the_ID();
                                            $learnerItemImage = get_the_post_thumbnail_url($learnerItemID, "full");
                                            $learnerItemName = get_the_title();
                                            $learnerItemTagline = "";
                                            $learnerItemRating = 1;
                                            $learnerIemLevel = -1;
                                            $learnerItemCategories = [];
                                            $learnerItemLevelAttribute = "";
                                            $learnerItemContactLink = "";

                                            if (have_rows('pigeon_profileBuilder')) {
                                                while (have_rows('pigeon_profileBuilder')) {
                                                    the_row();
                                                    $learnerItemTagline = get_sub_field("tagline");
                                                    $learnerItemRating = get_sub_field("rating");
                                                    $learnerItemLevel = get_sub_field("level");
                                                    $learnerItemLevelAttribute = get_sub_field("levelAttribute");
                                                    $learnerItemContactLink = get_sub_field("link");

                                                    if (have_rows("categories")) {
                                                        while (have_rows("categories")) {
                                                            the_row();
                                                            $categoryTitle = get_sub_field("title");

                                                            array_push($learnerItemCategories, $categoryTitle);
                                                        }
                                                    }
                                                }
                                            }

                                            if ($learnerItemLevel === "learner") {
                                                $learnerItemLevel = "Learner";
                                            } else if ($learnerItemLevel === "one") {
                                                $learnerItemLevel = "Level 1";
                                            } else if ($learnerItemLevel === "two") {
                                                $learnerItemLevel = "Level 2";
                                            } else if ($learnerItemLevel === "three") {
                                                $learnerItemLevel = "Level 3";
                                            } else if ($learnerItemLevel === "four") {
                                                $learnerItemLevel = "Level 4";
                                            }
                                    ?>
                                            <div class="carouselItem">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $learnerItemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">learning</p>

                                                        <p class="profileName"><?php echo $learnerItemName; ?></p>

                                                        <p class="profileTag"><?php echo $learnerItemTagline; ?></p>

                                                        <div class="profileRating">
                                                            <?php
                                                            for ($c = 0; $c < $learnerItemRating; $c++) {

                                                            ?>
                                                                <div class="ratingItem">
                                                                    <img src="<?php echo get_stylesheet_directory_uri() . "/Images/Path388.svg"; ?>" />
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="profileCategoriesContainer">
                                                            <?php
                                                            for ($d = 0; $d < count($learnerItemCategories); $d++) {
                                                            ?>
                                                                <p class="profileCategory"><?php echo $learnerItemCategories[$d]; ?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($learnerItemLevelAttribute) {
                                                        ?>
                                                            <div class="levelContainer">
                                                                <p><?php echo $learnerItemLevel; ?></p>
                                                                <p><?php echo $learnerItemLevelAttribute; ?></p>
                                                            </div>
                                                        <?php
                                                        }

                                                        if ($learnerItemContactLink) {
                                                        ?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a target="_blank" href="<?php echo $learnerItemContactLink; ?>">Book a chat</a>
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

                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft hidden" onclick="shift_carouselLeft(this)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)"></div>
                            </div>

                            <div class="dotContainer">
                                <div class="inner" style="grid-template-columns: repeat(<?php echo $learnerQueryCount; ?>, auto);">
                                    <?php
                                    for ($e = 0; $e < $learnerQueryCount; $e++) {
                                    ?>
                                        <div class="dot <?php if ($e === 0) {
                                                            echo " active";
                                                        } ?>" onclick="handleCarouselFrameChange(event)" index="<?php echo $e; ?>"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else if ($serviceDeisplay == "sharers") {
            ?>
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
                                if ($sharer_copyHasReadMore) {
                                    $sharer_readMore_desktop = get_sub_field('lsSection_sharer_readMore_desktop');
                                    $sharer_readMore_tablet = get_sub_field('lsSection_sharer_readMore_tablet');
                                    $sharer_readMore_mobile = get_sub_field('lsSection_sharer_readMore_mobile');
                                    $sharer_readMore_args = array(
                                        'content' => $sharer_copy,
                                        'readMore_desktop' => $sharer_readMore_desktop,
                                        'readMore_tablet' => $sharer_readMore_tablet,
                                        'readMore_mobile' => $sharer_readMore_mobile,
                                    );

                                    set_readMore($sharer_readMore_args); //custom function found in functions.php

                                } else {
                                ?>
                                    <p><?php echo $sharer_copy; ?></p>
                                <?php
                                }
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

                        <div class="seeAllContainer">
                            <div class="inner">
                                <a href="<?php echo $sharer_viewAllLink; ?>">Show all</a>
                            </div>
                        </div>
                    </div>

                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
                                    <div class="carouselItem video active">
                                        <div class="videoItem">
                                            <div class='video_container' playPause='play'>
                                                <div class='video_thumbnail' style='background-image: url(<?php echo $sharer_carouselVideoThumbnail; ?>);'></div>
                                                <?php
                                                if ($sharer_carouselVideo) {
                                                ?>
                                                    <div class='video_overlay'>
                                                        <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                            <div class="ctaButton_inner">
                                                                <a><span></span> watch video</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="videoContainer">
                                                        <video class='video' onclick="do_playPauseVideo(this)">
                                                            <source src='<?php echo $sharer_carouselVideo; ?>'>
                                                        </video>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $sharerQueryArgs = array(
                                        'post_type' => 'profiles',
                                        'posts_per_page' => $sharer_maxNumberOfCarouselItems,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'profileTypes',
                                                'field'    => 'slug',
                                                'terms'    => 'sharer',
                                            ),
                                        ),
                                    );
                                    $sharerQuery = new WP_QUERY($sharerQueryArgs);
                                    $sharerQueryCount = $sharerQuery->found_posts;

                                    if ($sharerQuery->have_posts()) {
                                        while ($sharerQuery->have_posts()) {
                                            $sharerQuery->the_post();
                                            $sharerItemID = get_the_ID();
                                            $sharerItemImage = get_the_post_thumbnail_url($sharerItemID, "full");
                                            $sharerItemName = get_the_title();
                                            $sharerItemTagline = "";
                                            $sharerItemRating = 1;
                                            $sharerItemLevel = "";
                                            $sharerItemCategories = [];
                                            $sharerItemLevelAttribute = "";
                                            $sharerItemContactLink = "";

                                            if (have_rows('pigeon_profileBuilder')) {
                                                while (have_rows('pigeon_profileBuilder')) {
                                                    the_row();
                                                    $sharerItemTagline = get_sub_field("tagline");
                                                    $sharerItemRating = get_sub_field("rating");
                                                    $sharerItemLevel = get_sub_field("level");
                                                    $sharerItemLevelAttribute = get_sub_field("levelAttribute");
                                                    $sharerItemContactLink = get_sub_field("link");

                                                    if (have_rows("categories")) {
                                                        while (have_rows("categories")) {
                                                            the_row();
                                                            $categoryTitle = get_sub_field("title");

                                                            array_push($sharerItemCategories, $categoryTitle);
                                                        }
                                                    }
                                                }
                                            }

                                            if ($sharerItemLevel === "learner") {
                                                $sharerItemLevel = "Learner";
                                            } else if ($sharerItemLevel === "one") {
                                                $sharerItemLevel = "Level 1";
                                            } else if ($sharerItemLevel === "two") {
                                                $sharerItemLevel = "Level 2";
                                            } else if ($sharerItemLevel === "three") {
                                                $sharerItemLevel = "Level 3";
                                            } else if ($sharerItemLevel === "four") {
                                                $sharerItemLevel = "Level 4";
                                            }
                                    ?>
                                            <div class="carouselItem">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $sharerItemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">sharing</p>

                                                        <p class="profileName"><?php echo $sharerItemName; ?></p>

                                                        <p class="profileTag"><?php echo $sharerItemTagline; ?></p>

                                                        <div class="profileRating">
                                                            <?php
                                                            for ($a = 0; $a < $sharerItemRating; $a++) {
                                                            ?>
                                                                <div class="ratingItem">
                                                                    <img src="<?php echo get_stylesheet_directory_uri() . "/Images/Path388(2).svg"; ?>" />
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="profileCategoriesContainer">
                                                            <?php
                                                            for ($b = 0; $b < count($sharerItemCategories); $b++) {
                                                            ?>
                                                                <p class="profileCategory"><?php echo $sharerItemCategories[$b]; ?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($sharerItemLevelAttribute) {
                                                        ?>
                                                            <div class="levelContainer">
                                                                <p><?php echo $sharerItemLevel; ?></p>
                                                                <span>-</span>
                                                                <p><?php echo $sharerItemLevelAttribute; ?></p>
                                                            </div>
                                                        <?php
                                                        }

                                                        if ($sharerItemContactLink) {
                                                        ?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a target="_blank" href="<?php echo $sharerItemContactLink; ?>">Book a chat</a>
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

                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft hidden" onclick="shift_carouselLeft(this)" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/pigeonImages/carouselArrow_left.svg"; ?>)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/pigeonImages/carouselArrow_right.svg"; ?>)"></div>
                            </div>

                            <div class="dotContainer">
                                <div class="inner" style="grid-template-columns: repeat(<?php echo $sharerQueryCount; ?>, auto);">
                                    <?php
                                    for ($f = 0; $f < $sharerQueryCount; $f++) {
                                    ?>
                                        <div class="dot <?php if ($f === 0) {
                                                            echo " active";
                                                        } ?>" onclick="handleCarouselFrameChange(event)" index="<?php echo $f; ?>"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else if ($serviceDeisplay == "learners") {
            ?>
                <div class="lsCarouselItem active">
                    <div class="lsCarousel_content grid-col-1-1">
                        <div class="contentContainer">
                            <?php
                            if ($learner_header) {
                            ?>
                                <h4><?php echo $learner_header; ?></h4>
                                <?php
                            }

                            if ($learner_copy) {
                                if ($learner_copyHasReadMore) {
                                    $learner_readMore_desktop = get_sub_field('lsSection_learner_readMore_desktop');
                                    $learner_readMore_tablet = get_sub_field('lsSection_learner_readMore_tablet');
                                    $learner_readMore_mobile = get_sub_field('lsSection_learner_readMore_mobile');
                                    $learner_readMore_args = array(
                                        'content' => $learner_copy,
                                        'readMore_desktop' => $learner_readMore_desktop,
                                        'readMore_tablet' => $learner_readMore_tablet,
                                        'readMore_mobile' => $learner_readMore_mobile,
                                    );

                                    set_readMore($learner_readMore_args); //custom function found in functions.php
                                } else {
                                ?>
                                    <p><?php echo $learner_copy; ?></p>
                                <?php
                                }
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

                        <div class="seeAllContainer">
                            <div class="inner">
                                <a href="<?php echo $learner_viewAllLink; ?>">Show all</a>
                            </div>
                        </div>
                    </div>

                    <div class="lsCarousel_carousel">
                        <div class="carouselParent">
                            <div class="carouselOuter" onTouchStart="update_carouselTouchX(event)" onTouchEnd="shiftCarouselByTouch(event)" onTouchCancel="shiftCarouselByTouch(event)">
                                <div class="carouselInner" style="width: 2140px;" translateXValue="0">
                                    <div class="carouselItem video active">
                                        <div class="videoItem">
                                            <div class='video_container' playPause='play'>
                                                <div class='video_thumbnail' style='background-image: url(<?php echo $learner_carouselVideoThumbnail; ?>);'></div>
                                                <?php
                                                if ($learner_carouselVideo) {
                                                ?>
                                                    <div class='video_overlay'>
                                                        <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                                            <div class="ctaButton_inner">
                                                                <a><span></span> watch video</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="videoContainer">
                                                        <video class='video' onclick="do_playPauseVideo(this)">
                                                            <source src='<?php echo $learner_carouselVideo; ?>'>
                                                        </video>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $learnerQueryArgs = array(
                                        'post_type' => 'profiles',
                                        'posts_per_page' => $learner_maxNumberOfCarouselItems,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'profileTypes',
                                                'field'    => 'slug',
                                                'terms'    => 'learner',
                                            ),
                                        ),
                                    );
                                    $learnerQuery = new WP_QUERY($learnerQueryArgs);
                                    $learnerQueryCount = $learnerQuery->found_posts;

                                    if ($learnerQuery->have_posts()) {
                                        while ($learnerQuery->have_posts()) {
                                            $learnerQuery->the_post();
                                            $learnerItemID = get_the_ID();
                                            $learnerItemImage = get_the_post_thumbnail_url($learnerItemID, "full");
                                            $learnerItemName = get_the_title();
                                            $learnerItemTagline = "";
                                            $learnerItemRating = 1;
                                            $learnerIemLevel = -1;
                                            $learnerItemCategories = [];
                                            $learnerItemLevelAttribute = "";
                                            $learnerItemContactLink = "";

                                            if (have_rows('pigeon_profileBuilder')) {
                                                while (have_rows('pigeon_profileBuilder')) {
                                                    the_row();
                                                    $learnerItemTagline = get_sub_field("tagline");
                                                    $learnerItemRating = get_sub_field("rating");
                                                    $learnerItemLevel = get_sub_field("level");
                                                    $learnerItemLevelAttribute = get_sub_field("levelAttribute");
                                                    $learnerItemContactLink = get_sub_field("link");

                                                    if (have_rows("categories")) {
                                                        while (have_rows("categories")) {
                                                            the_row();
                                                            $categoryTitle = get_sub_field("title");

                                                            array_push($learnerItemCategories, $categoryTitle);
                                                        }
                                                    }
                                                }
                                            }

                                            if ($learnerItemLevel === "learner") {
                                                $learnerItemLevel = "Learner";
                                            } else if ($learnerItemLevel === "one") {
                                                $learnerItemLevel = "Level 1";
                                            } else if ($learnerItemLevel === "two") {
                                                $learnerItemLevel = "Level 2";
                                            } else if ($learnerItemLevel === "three") {
                                                $learnerItemLevel = "Level 3";
                                            } else if ($learnerItemLevel === "four") {
                                                $learnerItemLevel = "Level 4";
                                            }
                                    ?>
                                            <div class="carouselItem">
                                                <div class="profileItem">
                                                    <div class="profileImage" style="background-image: url(<?php echo $learnerItemImage; ?>)"></div>

                                                    <div class="profileOverlay"></div>

                                                    <div class="profileContent">
                                                        <p class="profileRole">learning</p>

                                                        <p class="profileName"><?php echo $learnerItemName; ?></p>

                                                        <p class="profileTag"><?php echo $learnerItemTagline; ?></p>

                                                        <div class="profileRating">
                                                            <?php
                                                            for ($c = 0; $c < $learnerItemRating; $c++) {

                                                            ?>
                                                                <div class="ratingItem">
                                                                    <img src="<?php echo get_stylesheet_directory_uri() . "/Images/Path388.svg"; ?>" />
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                        <div class="profileCategoriesContainer">
                                                            <?php
                                                            for ($d = 0; $d < count($learnerItemCategories); $d++) {
                                                            ?>
                                                                <p class="profileCategory"><?php echo $learnerItemCategories[$d]; ?></p>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($learnerItemLevelAttribute) {
                                                        ?>
                                                            <div class="levelContainer">
                                                                <p><?php echo $learnerItemLevel; ?></p>
                                                                <p><?php echo $learnerItemLevelAttribute; ?></p>
                                                            </div>
                                                        <?php
                                                        }

                                                        if ($learnerItemContactLink) {
                                                        ?>
                                                            <div class="ctaButton">
                                                                <div class="ctaButton_inner">
                                                                    <a target="_blank" href="<?php echo $learnerItemContactLink; ?>">Book a chat</a>
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

                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="carouselButtons">
                                <div class="carouselButton buttonLeft hidden" onclick="shift_carouselLeft(this)"></div>
                                <div class="carouselButton buttonRight" onclick="shift_carouselRight(this)"></div>
                            </div>

                            <div class="dotContainer">
                                <div class="inner" style="grid-template-columns: repeat(<?php echo $learnerQueryCount; ?>, auto);">
                                    <?php
                                    for ($e = 0; $e < $learnerQueryCount; $e++) {
                                    ?>
                                        <div class="dot <?php if ($e === 0) {
                                                            echo " active";
                                                        } ?>" onclick="handleCarouselFrameChange(event)" index="<?php echo $e; ?>"></div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>