<?php

    $hasCustomClass = get_sub_field("popSection_customClass_include");
    $customClass = get_sub_field("popSection_customClass");
    $backgroundImageOne_desktop = get_sub_field("popSection_backgroundImage_one_desktop");
    $backgroundImageOne_mobile = get_sub_field("popSection_backgroundImage_one_mobile");
    $header = get_sub_field("popSection_header");
    $copy = get_sub_field("popSection_copy");


?>
    <section class="popSection">
        <div class="popSection_outer">
<?php
            if ($backgroundImageOne_desktop) {
                if ($backgroundImageOne_mobile) {
?>
                    <div class="imageContainer backgroundImageOneMobile">
                        <img src="<?php echo $backgroundImageOne_mobile; ?>" />
                    </div>
<?php
                }
?>
                <div class="imageContainer backgroundImageOne">
                    <img src="<?php echo $backgroundImageOne_desktop; ?>" />
                </div>
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
?>
                        <p><?php echo $copy; ?></p>
<?php
                    }
?>
                </div>
            </div>
        </div>
    </section>