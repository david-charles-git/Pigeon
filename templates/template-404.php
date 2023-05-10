<?php

/**
 * Template Name: 404 Template
 * Template Post Type: page, post
 * The Template for the new landing page.
 */
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
    <link rel='stylesheet' type='text/css' href='<?php echo get_stylesheet_directory_uri(); ?>/CSS/dist/pigeonCSS.min.css?=v3.9' />

    <title>PIGEON | Page Not Found</title>

    <style>
        main {
            max-width: 1200px;
            padding: 20vh 0%;
        }

        #errorPageContainer h1 {
            margin-bottom: 30px;
        }

        #errorPageContainer p {
            margin-bottom: 30px;
        }

        footer {
            background-color: none !important;
            padding: 0 !important;
        }
    </style>
    <?php
    wp_head();
    ?>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2T39VZ&gtm_auth=VS_xHfyrfVNa9hr0zrxazw&gtm_preview=env-1&gtm_cookies_win=x" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <main>
        <section id="errorPageContainer">
            <div>
                <h1>Page Not Found</h1>
                <p>The page you are looking for does not exist.</p>
                <div class="ctaButton buttonGreen introCTA">
                    <div class="ctaButton_inner">
                        <a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/'; ?>">Home</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php
        wp_footer();
        ?>
    </footer>
</body>

</html>