<?php

    $hasCustomClass = get_sub_field("introSection_customClass_include");
    $customClass = get_sub_field("introSection_customClass");
    $backgroundImageOne_desktop = get_sub_field("introSection_backgroundImage_one_desktop");
    $backgroundImageOne_mobile = get_sub_field("introSection_backgroundImage_one_mobile");
    $backgroundImageTwo_desktop = get_sub_field("introSection_backgroundImage_two_desktop");
    $backgroundImageTwo_mobile = get_sub_field("introSection_backgroundImage_two_mobile");
    $header = get_sub_field("introSection_header");
    $copy = get_sub_field("introSection_copy");
    $cta_copy = get_sub_field("introSection_cta_copy");
    $cta_href = get_sub_field("introSection_cta_href");
    $signIn_copy = get_sub_field("introSection_signIn_copy");
    $signIn_href = get_sub_field("introSection_signIn_href");
    $testimonial_stars = get_sub_field("introSection_testimonial_stars");
    $testimonial_copy = get_sub_field("introSection_testimonial_copy");
    $testimonial_author = get_sub_field("introSection_testimonial_author");


?>
    <section class="introSection <?php if ($hasCustomClass) { echo $customClass; } ?>">
        <div class="introSection_outer">
<?php
            if ($backgroundImageOne_desktop) {
                if  ($backgroundImageOne_mobile) {
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

            if ($backgroundImageTwo_desktop) {
                if ($backgroundImageTwo_mobile) {
?>
                    <div class="imageContainer backgroundImageTwoMobile">
                        <img src="<?php echo $backgroundImageTwo_mobile; ?>" />
                    </div>
<?php
                }
?>
                <div class="imageContainer backgroundImageTwo">
                    <img src="<?php echo $backgroundImageTwo_desktop; ?>" />
                </div>
<?php
            }
?>
            <div class="introSection_inner">  
<?php 
                if ($header) {
?>
                    <h1 class="introHeader"><?php echo $header; ?></h1>
<?php    
                }   
                
                if ($copy) {
?>
                    <p class="introCopy"><?php echo $copy; ?></p>
<?php    
                }  

                if ($cta_copy) {
?>
                    <div class="ctaButton buttonGreen introCTA">
                        <div class="ctaButton_inner">
                            <a href="<?php echo $cta_href; ?>"><?php echo $cta_copy; ?></a>
                        </div>
                    </div>
<?php    
                } 

                if ($signIn_copy) {
?>
                    <p class="introSignIn">
                        <a href="<?php echo $signIn_href; ?>"><strong><?php echo $signIn_copy; ?></strong></a>
                    </p>
<?php    
                } 

                if ($testimonial_copy) {
?>
                    <div class="testimonialContainer introTestimonial">
                        <div class="testimonialContainer_inner">
                            <div class="starContainer">
<?php
                                for ($a = 0; $a < intval($testimonial_stars); $a++) {
?>
                                    <img src="<?php echo "https://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/Pigeon/pigeonImages/star.png"; ?>" />
<?php
                                }
?>
                            </div>

                            <p><em><?php echo $testimonial_copy; ?></em></p>

                            <p><strong><?php echo $testimonial_author; ?></strong></p>
                        </div>
                    </div>
<?php    
                } 
?>
                <div class="introBlank"></div>
            </div>
        </div>
    </section>