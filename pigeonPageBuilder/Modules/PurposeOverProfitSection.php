<?php

    $hasCustomClass = get_sub_field("popSection_customClass_include");
    $customClass = get_sub_field("popSection_customClass");
    $backgroundImageOne_desktop = get_sub_field("popSection_backgroundImage_one_desktop");
    $backgroundImageOne_mobile = get_sub_field("popSection_backgroundImage_one_mobile");
    $header = get_sub_field("popSection_header");
    $copy = get_sub_field("popSection_copy");
    $hasReadMore = get_sub_field('popSection_hasReadMore');


?>
    <section class="popSection">
        <div class="popSection_outer">
<?php
            if ($backgroundImageOne_mobile) {
                if ($backgroundImageOne_desktop) {
?>
                    <div class="imageContainer backgroundImageOneMobile" style='background-image: url(<?php echo $backgroundImageOne_mobile; ?>);'></div>
                    <div class="imageContainer backgroundImageOneDesktop" style='background-image: url(<?php echo $backgroundImageOne_desktop; ?>);'></div>
<?php
                } else {
?>
                    <div class="imageContainer backgroundImageOne" style='background-image: url(<?php echo $backgroundImageOne_mobile; ?>);'></div>
<?php
                }

            } else if ($backgroundImageOne_desktop) {
?>
                <div class="imageContainer backgroundImageOne" style='background-image: url(<?php echo $backgroundImageOne_desktop; ?>);'></div>
<?php
            }
?>
            <div class="popSection_inner">
                <div>
<?php
                    if ($header) {
?>
                        <h2><?php echo $header; ?></h2>
<?php
                    }

                    if ($copy) {
                        if ($hasReadMore) {
                            $readMore_desktop = get_sub_field('popSection_readMore_desktop');
                            $readMore_tablet = get_sub_field('popSection_readMore_tablet');
                            $readMore_mobile = get_sub_field('popSection_readMore_mobile');
                            $readMore_args = array (
                                'content' => $copy,
                                'readMore_desktop' => $readMore_desktop,
                                'readMore_tablet' => $readMore_tablet,
                                'readMore_mobile' => $readMore_mobile,
                            );
        
                            set_readMore($readMore_args); //custom function found in functions.php

                        } else {
?>
                            <p><?php echo $copy; ?></p>
<?php
                        }
                    }
?>
                </div>
            </div>
        </div>
    </section>