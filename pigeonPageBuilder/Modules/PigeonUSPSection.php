<?php

    $hasCustomClass = get_sub_field("uspSection_customClass_include");
    $customClass = get_sub_field("uspSection_customClass");


?>
<h1>Lindsey Test</h1>
    <section class="uspSection <?php if ($hasCustomClass) { echo $customClass; } ?>">
        <div class="uspSection_outer">
            <h2>Join the flock</h2>

            <div class="uspContainer">
                <div class="uspContainerInner"
                    ontouchstart="updateUspTouchX(event)"
                    ontouchend="shiftUspByTouch(event)"
                    ontouchcancel="shiftUspByTouch(event)"
                >
                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon/pigeonImages/freeIcon@2x.png'; ?>" />
                            </div>

                            <h5>Sign up free</h5>

                            <p>Discover new talents and passions with no commitment.</p>
                        </div>
                    </div>

                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon/pigeonImages/giftIcon@2x.png'; ?>" />
                            </div>

                            <h5>Your first chat is on us</h5>

                            <p>Get to know how it works. Your first 10-minute chat is completely free.</p>
                        </div>
                    </div>

                    <div class="uspItem">
                        <div class="uspItemInner">
                            <div class="icon imageContainer">
                                <img src="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon/pigeonImages/moneyBagIcon@2x.png'; ?>" />
                            </div>

                            <h5>Earn up to £60 per hour</h5>

                            <p>Find financial flexibility in your own home and your own time.</p>
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
                    <a href="https://app.pigeon.me/accounts/registration/">Sign Up Free</a>
                </div>
            </div>
        </div>
    </section>