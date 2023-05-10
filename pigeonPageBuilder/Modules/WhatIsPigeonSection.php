<?php
    $hasCustomClass = get_sub_field("wipSection_customClass_include");
    $customClass = get_sub_field("wipSection_customClass");
    $header = get_sub_field("wipSection_header");
    $copy = get_sub_field("wipSection_copy");
    $hasReadMore = get_sub_field("wipSection_hasReadMore");
    $cta_copy = get_sub_field("wipSection_cta_copy");
    $cta_href = get_sub_field("wipSection_cta_href");
    $video_thumbnail = get_sub_field("wipSection_video_thumbnail");
    $video_overlay_copy = get_sub_field("wipSection_video_overlayCopy");
    $video = get_sub_field("wipSection_video");


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
?>
            </div>
        </div>
    </section>