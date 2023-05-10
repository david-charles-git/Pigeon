<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $serverName = "https://" . $_SERVER["HTTP_HOST"] . ""; //change for PROD
?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?> >
        <head>
            <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=VS_xHfyrfVNa9hr0zrxazw&gtm_preview=env-1&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-T2T39VZ');</script>
            <!-- End Google Tag Manager -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
            wp_head();
?>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
            <link rel='stylesheet' type='text/css' href='<?php echo get_stylesheet_directory_uri(); ?>/CSS/pigeonCSS_update.css?=v3.9' />
            
            <title>PIGEON | It's Your Time</title>
        </head>

        <body>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2T39VZ&gtm_auth=VS_xHfyrfVNa9hr0zrxazw&gtm_preview=env-1&gtm_cookies_win=x" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->

            <header>
                <nav id="mainNavigation" class="mainNavigation">
                    <div class="mainNavigation_inner">
                        <div class="mainNavigation_left">
                            <div class="navigationItem navigationText">
                                <a href="#whatIsPigeon" onclick="goto_section('whatIsPigeon')">What is PIGEON?</a>
                            </div>

                            <div class="navigationItem navigationText">
                                <a href="#learnerSharer" onclick="goto_section('learnerSharer')" learnerSharer="sharer">Become a Sharer</a>
                            </div>
                        </div>

                        <div class="mainNavigation_center imageContainer">
                            <a href="#">
                                <img src="<?php echo get_stylesheet_directory_uri() . "/pigeonImages/PGN_Logo.png"; ?>" />
                            </a>
                        </div>

                        <div class="mainNavigation_right">
                            <div class="navigationItem navigationText">
                                <a href="#learnerSharer" onclick="goto_section('learnerSharer')" learnerSharer="learner">Become a Learner</a>
                            </div>

                            <div class="navigationItem navigationButton">
                                <a href="https://app.pigeon.me/accounts/login/">Log In</a>
                                <a href="https://app.pigeon.me/accounts/registration/">Sign up</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <nav id="mainNavigationMobile" class="mainNavigationMobile">
                    <div class="mainNavigationMobile_inner">
                        <div class="mainNavigationMobile_top">
                            <div class="mainNavigationMobile_logo imageContainer">
                                <a href="#">
                                    <img src="<?php echo $serverName . "/wp-content/themes/Pigeon/pigeonImages/PGN_Logo.png"; ?>" />
                                </a>
                            </div>

                            <div class="mainNavigationMobile_menuButton">
                            <div class="ctaButton buttonGreen">
                                <div class="ctaButton_inner">
                                    <a href="https://app.pigeon.me/accounts/registration/">Sign up for free</a>
                                </div>
                            </div>

                                <div class='mobileNavigationMenuButton' onclick="do_openCloseMobileMenu(this)">
                                    <div class="menuButton"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mainNavigationMobile_menu">
                            <div class="navigationItem navigationText">
                                <a href="#whatIsPigeon" onclick="goto_section('whatIsPigeon')">What is PIGEON?</a>
                            </div>

                            <div class="navigationItem navigationText">
                                <a href="#learnerSharer" onclick="goto_section('learnerSharer')" learnerSharer="sharer">Become a Sharer</a>
                            </div>

                            <div class="navigationItem navigationText">
                                <a href="#learnerSharer" onclick="goto_section('learnerSharer')" learnerSharer="learner">Become a Learner</a>
                            </div>

                            <div class="navigationItem navigationButton">
                                <a href="https://app.pigeon.me/accounts/login/">Log In</a>
                                <a href="https://app.pigeon.me/accounts/registration/">Sign up</a>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <div id="headerScrollCta" class="headerScrollCta">
                    <div class="headerScrollCta_inner">
                        <div class="ctaButton buttonGreen">
                            <div class="ctaButton_inner">
                                <a href="https://app.pigeon.me/accounts/registration/">Sign up for free</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>