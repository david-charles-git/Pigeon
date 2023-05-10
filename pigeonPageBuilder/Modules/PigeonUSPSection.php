<?php

    $hasCustomClass = get_sub_field("uspSection_customClass_include");
    $customClass = get_sub_field("uspSection_customClass");


?>
    <section class="uspSection <?php if ($hasCustomClass) { echo $customClass; } ?>">
        <div class="uspSection_outer">
            <h2>Join the Flock</h2>

            <div class="uspContainer">
                <div class="uspContainerInner"
                    ontouchstart="updateUspTouchX(event)"
                    ontouchend="shiftUspByTouch(event)"
                    ontouchcancel="shiftUspByTouch(event)"
                >
                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo get_stylesheet_directory_uri() .  "/pigeonImages/freeIcon@2x.png"; ?>" />
                            </div>

                            <h5>Sign up free</h5>

                            <p>Create your unique profile today in a matter of minutes.</p>
                        </div>
                    </div>

                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo get_stylesheet_directory_uri() .  "/pigeonImages/giftIcon@2x.png"; ?>" />
                            </div>

                            <h5>Paid video sessions</h5>

                            <p>Video meet with your customers from wherever you are, whenever you want.</p>
                        </div>
                    </div>

                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo get_stylesheet_directory_uri() .  "/pigeonImages/moneyBagIcon@2x.png"; ?>" />
                            </div>

                            <h5>Hassle-free payments</h5>

                            <p>Get paid for your time automatically within 3 days.</p>
                        </div>
                    </div>                
                </div>

                <div class="uspDotContainer">
                    <div class="dot active" onclick="updateUspActiveItem(this)"></div>
                    <div class="dot" onclick="updateUspActiveItem(this)"></div>
                    <div class="dot" onclick="updateUspActiveItem(this)"></div>
                </div>
            </div>

            <div class="ctaButton buttonGreen">
                <div class="ctaButton_inner">
                    <a href="https://app.pigeon.me/accounts/registration/">Sign Up For Free</a>
                </div>
            </div>
        </div>
    </section>