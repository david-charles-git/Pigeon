<?php




if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl + '&gtm_auth=VS_xHfyrfVNa9hr0zrxazw&gtm_preview=env-1&gtm_cookies_win=x';
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T2T39VZ');
    </script>
    <!-- End Google Tag Manager -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel='stylesheet' type='text/css' href='<?php echo get_stylesheet_directory_uri(); ?>/CSS/dist/master_CSS.min.css?=v4.0' />
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/JS/dist/master_JS.min.js?=v4.0'></script>
    <title>PIGEON | It's Your Time</title>
    <?php
    wp_head();
    ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2T39VZ&gtm_auth=VS_xHfyrfVNa9hr0zrxazw&gtm_preview=env-1&gtm_cookies_win=x" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <section id="landingPageBanner_parent">
            <div class="landingPageBanner_container">
                <div class="landingPageBanner_images">
                    <div class="landingPageBanner_backgroundMedia bgImage_contain" style="background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon'; ?>/Images/PGN_Logo-Mask_strap_SITE.png);"></div>

                    <div class="landingPageBanner_logo_small bgImage_contain" style="background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon'; ?>/Images/PGN_Logo-Mask_small_SITE.png);"></div>
                </div>

                <div class="landingPageBanner_quickScrollButton bgImage_contain" onclick="do_scrollWindowToStartOfPage()" style="background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon'; ?>/Images/Arrow_coral.png);"></div>
            </div>
        </section>

        <section id="navigation_parent" class="navigation_parent carousel_parent">
            <div class="navigation_container carousel_outer">
                <nav class="naviation carousel_inner">
                    <div class="navigation_left carousel_item">
                        <div class="tab_item active">
                            <a class="p_large" onclick='goTo_aboutSection()'>About</a>
                        </div>

                        <div class="tab_item">
                            <a class="p_large" onclick='goTo_howToSection()'>How to</a>
                        </div>

                        <div class="tab_item">
                            <a class="p_large" onclick='goTo_shareSkill()'>Share something</a>
                        </div>
                    </div>

                    <div class="navigation_logo bgImage_width100" style="background-image: url(<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content/themes/Pigeon'; ?>/Images/logo-pink-tm_small.png);">
                        <a class="p_large" onclick='goTo_aboutSection()'></a>
                    </div>

                    <div class="navigation_right carousel_item">
                        <div class="tab_item">
                            <a class="p_large" onclick='goTo_learnSkill()'>Learn something</a>
                        </div>

                        <div class="tab_item">
                            <a class="p_large" onclick='goTo_contact()'>Get in touch</a>
                        </div>

                        <div>
                            <p class="btn_black">
                                <span></span>
                                <a href="https://app.pigeon.me/accounts/intro/">Join the flock</a>
                            </p>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
    </header>