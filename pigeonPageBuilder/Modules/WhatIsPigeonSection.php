<?php
    //module default variables
    $hasCustomClass = get_sub_field("wipSection_customClass_include");
    $customClass = get_sub_field("wipSection_customClass");
    
    //content variables
    $header = get_sub_field("wipSection_header");
    $copy = get_sub_field("wipSection_copy");
    $hasReadMore = get_sub_field("wipSection_hasReadMore");
    $cta_copy = get_sub_field("wipSection_cta_copy");
    $cta_href = get_sub_field("wipSection_cta_href");

    //video variables
    $video_thumbnail = get_sub_field("wipSection_video_thumbnail");
    $video_overlay_copy = get_sub_field("wipSection_video_overlayCopy");
    $video = get_sub_field("wipSection_video");

    //usp section variables
    $hasUspCarousel = get_sub_field("wipSection_hasUSPCarousel");
    $uspItemCount = count(get_sub_field("wipSection_uspRepeater"));


?>
    <section id="whatIsPigeon" class="wipSection <?php if ($hasCustomClass) { echo $customClass; } ?>">
        <div class="wipSection_outer">                        
            <div class="wipSection_inner">   
<?php
                if ($header) {
?>
                    <h2 class="wipHeader">What is PIGEON</h2>
<?php
                }

                if ($copy) {
                    if ($hasReadMore) {
                        $readMore_desktop = get_sub_field('wipSection_readMore_desktop');
                        $readMore_tablet = get_sub_field('wipSection_readMore_tablet');
                        $readMore_mobile = get_sub_field('wipSection_readMore_mobile');
                        $readMore_args = array (
                            'content' => $copy,
                            'readMore_desktop' => $readMore_desktop,
                            'readMore_tablet' => $readMore_tablet,
                            'readMore_mobile' => $readMore_mobile,
                        );
        
                        set_readMore($readMore_args); //custom function found in functions.php

                    } else {
?>
                        <p class="wipCopy"><?php echo $copy; ?></p>
<?php
                    }
                }

                if ($cta_copy) {
?>
                    <div class="wipCTA">
                        <div class="ctaButton buttonGreen">
                            <div class="ctaButton_inner">
                                <a href="<?php echo $cta_href; ?>"><?php echo $cta_copy; ?></a>
                            </div>
                        </div>
                    </div>
<?php
                }

                if ($video) {
?>
                    <div class='video_container wipVideo' playPause='play'>
                        <div class='video_thumbnail' style='background-image: url(<?php echo $video_thumbnail; ?>);'></div>

                        <div class='video_overlay'>
                            <h4><?php echo $video_overlay_copy; ?></h4>

                            <div class="ctaButton" onclick="do_playPauseVideo(this)">
                                <div class="ctaButton_inner">
                                    <a><span></span> watch video</a>
                                </div>
                            </div>
                        </div>

                        <div class="videoContainer">
                            <video class='video' onclick="do_playPauseVideo(this)">
                                <source src='<?php echo $video; ?>'>
                            </video>
                        </div>
                    </div>
<?php
                }

                if ($hasUspCarousel) {
                    $uspSectionTitle = get_sub_field("wipSection_uspTitle");
                    $uspCarouselInnerStyle = "width : calc(100px * " . $uspItemCount . "); grid-template-columns: repeat(" . $uspItemCount . ", 1fr);"; 
?>
                    <div class="uspContainer">
                        <div class="inner">
                            <h2><?php echo $uspSectionTitle; ?></h2>
<?php
                            if (have_rows("wipSection_uspRepeater")) {
?>
                                <div class="carousel">
                                    <div class="carouselOuter">
                                        <div class="carouselInner" style="<?php echo $uspCarouselInnerStyle; ?>">
<?php
                                            while (have_rows("wipSection_uspRepeater")) {
                                                the_row();

                                                $uspIcon = get_sub_field("icon");
                                                $uspTitle = get_sub_field("title");
                                                $uspLink = get_sub_field("link");
?>
                                                <div class="carouselItem">
                                                    <a href="<?php echo $uspLink; ?>" class="inner" target="_blank">
                                                        <div class="iconContianer">
                                                            <img src="<?php echo $uspIcon; ?>" />
                                                        </div>

                                                        <p><?php echo $uspTitle; ?></p>
                                                    </a>
                                                </div>
<?php
                                            }
?>
                                        </div>
                                    </div>
                                </div>
<?php
                            }
?>
                        </div>
                    </div>
<?php
                }
?>
            </div>
        </div>
    </section>