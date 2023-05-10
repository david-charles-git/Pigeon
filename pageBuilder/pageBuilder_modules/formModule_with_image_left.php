<?php
    /*
        File Name : formModule_with_image_left
        Author : David Charles - Add Mustard
        Date created : 25/04/2022
        Description : 
            This script will created the given form width an image.
        
        EXTENDS - formModule_initial
    */

    $image_desktop = get_sub_field('image_desktop');
    $image_mobile = get_sub_field('image_mobile');
    $form_heading = get_sub_field('formModule_heading');
    $form_copy = get_sub_field('formModule_copy');
    $has_readMore = get_sub_field('formModule_copy_hasReadMore');
    $form_shortCodeID = get_sub_field('formModule_formshortcodeID');
    $form_shortcodeString = '[contact-form-7 id="' . $form_shortCodeID . '"]';
?>
    <div class="form_image_left_bottom">
<?php
        if ($image_mobile != null && $image_mobile != '') {
?>
            <div class="form_image_image bgImage_cover hide_desktop hide_tablet" style="background-image: url(<?php echo $image_mobile; ?>);"></div>

<?php
            if ($image_desktop != null && $image_desktop != '') {
?>
                <div class="form_image_image bgImage_cover hide_mobile" style="background-image: url(<?php echo $image_desktop; ?>);"></div>
<?php
            }

        } else {
            if ($image_desktop != null && $image_desktop != '') {
?>
                <div class="form_image_image bgImage_cover" style="background-image: url(<?php echo $image_desktop; ?>);"></div>
<?php
            }
        }
?>
    </div>

    <div class="form_image_right_top sw_90">
        <div class="form_image_formContainer">
<?php
            if ($form_heading != null && $form_heading != '') {
?>
                <h2 class="fnt_bold"><?php echo $form_heading; ?></h2>
<?php
            }

            if ($form_copy != null && $form_copy != '') {
                if ($has_readMore) {
                    $readMore_desktop = get_sub_field('formModule_wordCount_desktop');
                    $readMore_tablet = get_sub_field('formModule_wordCount_tablet');
                    $readMore_mobile = get_sub_field('formModule_wordCount_mobile');
                    $readMore_args = array (
                        'content' => $form_copy,
                        'readMore_desktop' => $readMore_desktop,
                        'readMore_tablet' => $readMore_tablet,
                        'readMore_mobile' => $readMore_mobile,
                    );

                    set_readMore($readMore_args); //custom function

                } else {
?>
                    <p class='form_image_formContainer_introCopy'><?php echo $form_copy; ?></p>
<?php
                }
            }
?>
            <div class="form_parent">
<?php 
                echo do_shortcode($form_shortcodeString);
?>
            </div>

            <div class='form_successContent'>
                <p>Thanks for reaching out!<br>A member of our rather lovely Community team will be in touch soon to chat through your enquiry.</p>

                <div onclick='do_formValidation_resetForm(this)'>
                    <p class="btn_black">
                        <span></span>
                        <a>SUBMIT ANOTHER</a>
                    </p>
                </div>
            </div>

            <div class='form_failerPopUp'>
                <div class='form_failerPopUp_inner bclr_beige sw_90'>
                    <div class='form_failerPopUp_close' onclick='do_formValidation_closeErrorPopUp(this)'><span>X</span></div>

                    <p>Hmm sorry, it looks like your message hasn't sent. Please double check all of your details and try again.</p>

                    <div onclick='do_formValidation_closeErrorPopUp(this)'>
                        <p class="btn_black">
                            <span></span>
                            <a>TRY AGAIN</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>