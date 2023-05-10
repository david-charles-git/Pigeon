<footer>
    <?php
    get_template_part('./pigeonPageBuilder/Modules/ContactSection');
    ?>
    <nav id="footerNavigation" class="footerNavigation">
        <div class="footerNavigation_inner">
            <div class="footerNavigation_left">
                <div class="footerNavigationLeftContent">
                    <div class="pigeonLogoContainer"></div>

                    <p><span>© PIGEON 2022 |</span> <a href="https://app.pigeon.me/static/pigeon-terms-and-conditions.pdf" target="_blank">Terms & Conditions</a></p>
                </div>
            </div>

            <div class="footerNavigation_right">
                <p>Follow us</p>

                <div class="socialIconContainer">
                    <div class="socialIcon">
                        <a href="https://www.instagram.com/pigeonmenow/" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri() . "/pigeonImages/instagramIcon.svg"; ?>);"></a>
                    </div>

                    <div class="socialIcon">
                        <a href="https://www.facebook.com/Pigeon-111528551534103" target="_blank" style="background-image: url(<?php echo  get_stylesheet_directory_uri() . "/pigeonImages/facebookIcon.svg"; ?>);"></a>
                    </div>
                    <div class="socialIcon">
                        <a href="https://www.twitter.com/pigeonmenow/" target="_blank" style="background-image: url(<?php echo  get_stylesheet_directory_uri() . "/pigeonImages/twitterIcon.svg"; ?>);"></a>
                    </div>
                    <div class="socialIcon">
                        <a href="https://www.linkedin.com/company/pigeon-me/" target="_blank" style="background-image: url(<?php echo  get_stylesheet_directory_uri() . "/pigeonImages/linkedIcaon.svg"; ?>);"></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script src="<?php echo get_stylesheet_directory_uri() .  "/JS/dist/pigeonJS.min.js?v4.0" ?>"></script>
    <?php
    wp_footer();
    ?>
</footer>
</body>

</html>