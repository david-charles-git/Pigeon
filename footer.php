        <footer>
            <section id="footer_parent" class="footer_parent bclr_black">
                <div class="footer_container sw_90">
                    <div class="footer_left_bottom">
                        <p class="hide_desktop hide_tablet"><a class='clr_beige fnt_bold p_xSmall' target='_blank' href='https://app.pigeon.me/static/pigeon-terms-and-conditions.35f5113a88bd.pdf'>Terms and Conditions</a></p>
                        <p class="clr_beige fnt_bold p_xSmall">© Pigeon <?php echo date("Y"); ?></p>
                        <p class="hide_mobile"><a class='clr_beige fnt_bold p_xSmall' href='https://app.pigeon.me/static/pigeon-terms-and-conditions.pdf' target='_blank'>Terms and Conditions</a></p>
                    </div>

                    <div class="footer_right_top">
<?php
                        if (have_rows('page_builder_modules_footer', 'options')) {
                            while (have_rows('page_builder_modules_footer', 'options')) {
                                the_row();

                                if (get_row_layout() == 'footer_socialMenu') {
                                    if (have_rows('footer_socialMenu_repeater')) {
                                        while (have_rows('footer_socialMenu_repeater')) {
                                            the_row();
                                            $socialIcon = get_sub_field('socialIcon');
                                            $page_href = get_sub_field('page_url');
                                            $has_openInNewWindow = get_sub_field('openInNewWindow');
?>
                                            <div class="bgImage_contain" style="background-image: url(<?php echo $socialIcon; ?>);">
                                                <a href="<?php echo $page_href; ?>" <?php if ($has_openInNewWindow) { echo 'target="_blank"'; } ?>></a>
                                            </div>
<?php
                                        }
                                    }
                                }
                            }
                        }
?>
                    </div>
                </div>
            </section>
<?php
            wp_footer();
?>
        </footer>
    </body>
</html>