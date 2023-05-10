<?php
    //module default variables
    $hasCustomClass = get_sub_field("introSection_customClass_include");
    $customClass = get_sub_field("introSection_customClass");

    //background image variables
    $backgroundImageOne_desktop = get_sub_field("introSection_backgroundImage_one_desktop");
    $backgroundImageOne_mobile = get_sub_field("introSection_backgroundImage_one_mobile");
    $backgroundImageTwo_desktop = get_sub_field("introSection_backgroundImage_two_desktop");
    $backgroundImageTwo_mobile = get_sub_field("introSection_backgroundImage_two_mobile");

    //content variables
    $header = get_sub_field("introSection_header");
    $copy = get_sub_field("introSection_copy");
    $cta_copy = get_sub_field("introSection_cta_copy");
    $cta_href = get_sub_field("introSection_cta_href");
    $signIn_copy = get_sub_field("introSection_signIn_copy");
    $signIn_href = get_sub_field("introSection_signIn_href");

    //carousel variables
    $includeCarousel = get_sub_field("inroSection_hasTestimonialCarousel");
    $numberOfCarouselItems = get_sub_field("introSection_numberOfCarouselItems");

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

                if ($includeCarousel) {
                    $testimonialQueryArgs = array (
                        'post_type' => 'testimonials',
                        'posts_per_page' => $numberOfCarouselItems
                    );
                    $testimonialQuery = new WP_Query( $testimonialQueryArgs );
                    $testimonialCount = $numberOfCarouselItems;

                    if ($testimonialQuery -> found_posts < $testimonialCount) {
                        $testimonialCount = $testimonialQuery -> found_posts;

                    }

                    if ($testimonialQuery -> have_posts()) {
                        $carouselInnerStyle = "grid-template-columns: repeat(" . $testimonialCount . ", 1fr); width: calc(100% * " . $testimonialCount . ");";
                        $whileCount = 0;
?>
                        <div class="testimonialContainer introTestimonial">
                            <div class="testimonialContainer_inner">
                                <div class="carousel">
                                    <div class="carouselOuter">
                                        <div class="carouselInner" style="<?php echo $carouselInnerStyle; ?>" >
<?php
                                            while ($testimonialQuery -> have_posts()) {
                                                $testimonialQuery -> the_post();

                                                $author = ""; //string
                                                $accountType = ""; //string
                                                $testimonial = ""; //string
                                                $numebrOfStars = ""; //number
                                                $starContainerStyle = ""; //string
                                                $starImageURL = ""; //

                                                if (have_rows('pigeon_testimonialBuilder')) {
                                                    while (have_rows('pigeon_testimonialBuilder')) {
                                                        the_row();
                                                        $author = get_sub_field("author");
                                                        $accountType = get_sub_field("accountType");
                                                        $testimonial = get_sub_field("testimonial");
                                                        $numebrOfStars = get_sub_field("numberOfStars");
                                                        $starContainerStyle = "grid-template-columns: repeat(" . $numebrOfStars . ", 1fr);";

                                                        if ($accountType === "learner") {
                                                            $starImageURL = get_stylesheet_directory_uri() . "/pigeonImages/star.png"; //pink star

                                                        } else {
                                                            $starImageURL = get_stylesheet_directory_uri() . "/Images/PGN_Blue_star.png"; //blue star

                                                        }
                                                    }
                                                }
?>
                                                <div class="carouselItem" index="<?php echo $whileCount; ?>">
                                                    <div class="inner">
                                                        <div class="starContainer">
                                                            <div class="inner" style="<?php echo $starContainerStyle; ?>">
<?php
                                                                for ($a = 0; $a < $numebrOfStars; $a++) {
?>
                                                                    <div class="star">
                                                                        <img src="<?php echo $starImageURL; ?>" />
                                                                    </div>
<?php
                                                                }
?>
                                                            </div>
                                                        </div>

                                                        <div class="contentContainer">
                                                            <div class="inner">
                                                                <p><em><?php echo $testimonial; ?></em></p>

                                                                <p><strong><?php echo $author; ?> - <?php echo ucfirst($accountType); ?></strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php
                                                $whileCount++;
                                            }

                                            wp_reset_postdata();
?>
                                        </div>
                                    </div>

                                    <div class="carouselDotsContainer">
                                        <div class="inner" style="grid-template-columns: repeat(<?php echo $testimonialCount; ?>, 1fr);">
<?php
                                            for ($b = 0; $b < $testimonialCount; $b++) {
                                                $dotClass = "dot";

                                                if ($b === 0) {
                                                    $dotClass = $dotClass . " active";
                                                }
?>
                                                <div class="<?php echo $dotClass; ?>" index="<?php echo $b; ?>" onclick="handleCarouselDotNavigation(event)"></div>
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
                } 
?>
                <div class="introBlank"></div>
            </div>
        </div>  
    </section>