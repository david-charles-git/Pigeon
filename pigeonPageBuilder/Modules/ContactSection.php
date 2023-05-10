<?php

?>
    <section class="contactSection">
        <div class="contactSection_outer">
            <div class="contactSection_inner">
                <p>Got a question? Fancy a chat? Pop us a message below and a member of the PIGEON Community Team will be happy to help!</p>

                <div class="ctaButton">
                    <div class="ctaButton_inner">
                        <a onclick="do_openForm(event)">Get in touch</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="contactForm" class="contactFormParent">
            <div class="contactFormOuter">
                <div class="contactFormClose" onclick="do_closeForm(event)"><p>X</p></div>
                
                <div class="contactFormInner presendContainer active">
                    <h4>Get in touch</h4>
                    <p>Got a question? Fancy a chat? Pop us a message below and a member of the PIGEON Community Team will be happy to help.</p>

                    <div class="contactForm">
<?php
                        echo do_shortcode("[contact-form-7 id='351']");
?>
                    </div>
                </div>
                
                <div class="successContainer">
                    <div class="contactFormInner inner">
                        <h4>Thank you for getting in touch!</h4>
                        <p>We appreciate you contacting us. Our lovely PIGEON Support team will get back in touch with you soon!</p>
                        <div class="homeButtonContainer btn_black">
                            <div class="inner">
                                <a onclick="handleSuccessCloseForm()">BACK TO HOMEPAGE</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="errorContainer">
                    <div class="contactFormInner inner">
                        <h4>Oops, looks like we have a flightless bird!</h4>
                        <p>We’re sorry it looks like that messenger PIGEON didn’t take off. Please check your connection, before trying again.</p>
                        <div class="homeButtonContainer btn_black">
                            <div class="inner">
                                <a onclick="handleErrorFormReset()">Try again</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>