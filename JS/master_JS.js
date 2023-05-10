window.addEventListener("beforeunload", set_toTop_onPageLoad);
window.addEventListener('load', do_onloadFunctions);

function do_onloadFunctions() {
    set_buttonMouseUpDownEvents();
    set_inputValidationFunction();
    set_contactForm7_ladingPage_ajaxResponses();

    do_windowScrollFunctions();
    do_resizeFunctions();

    window.addEventListener('resize', do_resizeFunctions);
    window.addEventListener('orientationchange', do_resizeFunctions);
    window.addEventListener('scroll', do_windowScrollFunctions);
}
function do_resizeFunctions() {
    set_carouselInnerWidth('tab_container_parent carousel_parent', 30, 8);
    set_carouselInnerWidth('navigation_parent carousel_parent', 40, 4);
    set_switchContent_carouselInnerWidth('switchContent_carousel_container carousel_parent', 20, 8);
    set_switchContent_text_width_carousel_height(); 

    do_switchContent_resetAll();
    do_switchContent_text_with_carousel_alignCarouselAndText_left();
    do_readMore_reset();

    set_scrollContent_text_with_phoneImages_textContentWidth();
    
    //AM_PB
    //videoSwap();
}
function do_windowScrollFunctions() {
    do_landingPageBanner_scroll_functions();
    do_navigation_scroll_functions();
    do_scrollContent_text_with_phoneImages_changeOpacityOfPhoneImagesOnScroll();
    do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo();
    do_navigation_switchNavActiveItem_onScroll();
    //do_scrollContent_text_with_phoneImages_textContent_opacityChange();

    update_GLOBAL_scrollIsUp();

    //AM_PB
    sharerSwap();
}





//window variable functions
function get_windowWidth() {
    var window_width = window.innerWidth;
    var window_height = window.innerHeight;
    //var window_orientation = window.orientation;
    //var orientation_options = [90, 270, "window.orientation is not supported"];

    // if (window_orientation == undefined || window_orientation == null) {
    //     window_orientation = window.screen.orientation.type;
    //     orientation_options = ["landscape-primary", "landscape-secondary", "window.screen.orientation.type is not supported"];
    // }

    // if (window_orientation == orientation_options[0] || window_orientation == orientation_options[1]) {
    //     if (window_height > window_width) {
    //         window_width = window_height;
    //     }

    // } else if (window_orientation === undefined) {
    //     console.log('fucntion: get_windowWidth failed: ' + orientation_options[2]);
    // }

    return window_width;
}
function get_windowVerticalScrollAmount() {
    var body_element = document.getElementsByTagName('BODY')[0];
    var body_height = body_element.clientHeight;
    var window_vertical_scrollAmount = window.scrollY;
    var window_height = window.innerHeight;
    var window_vertical_scrollAmount_max = body_height - window_height;
    var return_array = [window_vertical_scrollAmount, window_vertical_scrollAmount_max];

    return return_array;

}
function windowWidthIsLessThanBreakPointIndex(index) {
    var window_width = get_windowWidth();
    var breakPoints_array = [400, 600, 880, 1080, 1200, 1400, 1600, 1800, 3000];
    var is_lessThan = false;

    if (window_width <= breakPoints_array[index]) {
        is_lessThan = true;
    }

    return is_lessThan;
}





//landingPageBanner functions
var GLOABL_pageIsScrolling = false;
function do_landingPageBanner_scroll_functions() {
    do_landingPageBanner_scale_onScroll();
    do_landingPageBanner_textAndArrow_opacity_onScroll();
    do_landingPageBanner_smallImage_opacity_onScroll();
    do_landingPageBanner_largeImage_opacity_onScroll();
}
function do_landingPageBanner_scale_onScroll() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');

        if (landingPageBanner_parent && navigation_parent) {
            var triggerPoint_start = 0;
            var triggerPoint_end = window.innerHeight * (95 / 100);
            var triggerPoint_dispalcement = Math.abs(triggerPoint_end - triggerPoint_start); 
            var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

            if (window.screen.width <= 1300) {
                scrollAmount_from_triggerPoint += 60;
            }

            if (scrollAmount_from_triggerPoint >= 0) {
                var landingPageBanner_container = landingPageBanner_parent.getElementsByClassName('landingPageBanner_container')[0];
                var landingPageBanner_image_container = landingPageBanner_container.getElementsByClassName('landingPageBanner_images')[0];
                var landingPageBanner_image_container_width =  Math.ceil(landingPageBanner_image_container.clientWidth);
                var landingPageBanner_image_max_width = Math.ceil(landingPageBanner_container.clientWidth);
                var navigation_image = navigation_parent.getElementsByClassName('navigation_logo')[0];
                var navigation_image_width = Math.ceil(navigation_image.clientWidth);

                var ratio_scale_maxToMin = true;
                var scaling_ratio = navigation_image_width / landingPageBanner_image_max_width;
                var scroll_ratio = scrollAmount_from_triggerPoint / triggerPoint_dispalcement;
                var scale_value = 10 * scaling_ratio * scroll_ratio;

                if (ratio_scale_maxToMin) {
                    scale_value = 1 - scale_value;
                }

                scale_value = parseFloat(scale_value.toFixed(3));

                if ((landingPageBanner_image_container_width * scale_value) <=  navigation_image_width) {
                    scale_value = scaling_ratio;
                }

                landingPageBanner_image_container.style.transform = 'scale(' + scale_value + ')';

            } else {
                return;
            }

        } else {
            return;
        }

    } catch (err) {
        console.log(err);
    }
}
function do_landingPageBanner_textAndArrow_opacity_onScroll() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');

        if (landingPageBanner_parent && navigation_parent) {
            var landingPageBanner_arrow = landingPageBanner_parent.getElementsByClassName('landingPageBanner_quickScrollButton')[0];
            var triggerPoint_start = window.innerHeight * (1 / 2);
            var triggerPoint_end = window.innerHeight * (3 / 4);
            var triggerPoint_dispalcement = Math.abs(triggerPoint_end - triggerPoint_start); 
            var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

            if (window.screen.width <= 1300) {
                scrollAmount_from_triggerPoint += 60;
            }

            if (scrollAmount_from_triggerPoint >= 0) {
                var ratio_scale_maxToMin = true;
                var scroll_ratio = scrollAmount_from_triggerPoint / triggerPoint_dispalcement;
                var opacity_ratio = 1;
                var opacity_value = opacity_ratio * scroll_ratio;

                if (ratio_scale_maxToMin) {
                    opacity_value = 1 - opacity_value;
                }

                opacity_value = parseFloat(opacity_value.toFixed(2));

                if (opacity_value <= 0) {
                    opacity_value = 0;

                } else if (opacity_value >= 1) {
                    opacity_value = 1;
                }
                
                landingPageBanner_arrow.style.opacity = opacity_value;

            } else {
                landingPageBanner_arrow.style.opacity = 1;
            }
        } else {
            return;
        }

    } catch (err) {
        console.log(err);
    }
}
function do_landingPageBanner_smallImage_opacity_onScroll() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');

        if (landingPageBanner_parent && navigation_parent) {
            var landingPageBanner_smallImage = landingPageBanner_parent.getElementsByClassName('landingPageBanner_logo_small')[0];
            var triggerPoint_start = window.innerHeight * (1 / 2);
            var triggerPoint_end = window.innerHeight * (3 / 4);
            var triggerPoint_dispalcement = Math.abs(triggerPoint_end - triggerPoint_start); 
            var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

            if (window.screen.width <= 1300) {
                scrollAmount_from_triggerPoint += 60;
            }

            if (scrollAmount_from_triggerPoint >= 0) {
                var ratio_scale_maxToMin = false;
                var scroll_ratio = scrollAmount_from_triggerPoint / triggerPoint_dispalcement;
                var opacity_ratio = 1;
                var opacity_value = opacity_ratio * scroll_ratio;

                if (ratio_scale_maxToMin) {
                    opacity_value = 1 - opacity_value;
                }

                opacity_value = parseFloat(opacity_value.toFixed(2));

                if (opacity_value <= 0) {
                    opacity_value = 0;

                } else if (opacity_value >= 1) {
                    opacity_value = 1;
                }
                
                landingPageBanner_smallImage.style.opacity = opacity_value;

            } else {
                landingPageBanner_smallImage.style.opacity = 0;
            }
        } else {
            return;
        }

    } catch (err) {
        console.log(err);
    }
}
function do_landingPageBanner_largeImage_opacity_onScroll() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');

        if (landingPageBanner_parent && navigation_parent) {
            var landingPageBanner_backgroundMedia = landingPageBanner_parent.getElementsByClassName('landingPageBanner_backgroundMedia')[0];
            var triggerPoint_start = window.innerHeight * (1 / 2);
            var triggerPoint_end = window.innerHeight * (3 / 4);
            var triggerPoint_dispalcement = Math.abs(triggerPoint_end - triggerPoint_start); 
            var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

            if (window.screen.width <= 1300) {
                scrollAmount_from_triggerPoint += 60;
            }

            if (scrollAmount_from_triggerPoint >= 0) {
                var ratio_scale_maxToMin = true;
                var scroll_ratio = scrollAmount_from_triggerPoint / triggerPoint_dispalcement;
                var opacity_ratio = 1;
                var opacity_value = opacity_ratio * scroll_ratio;

                if (ratio_scale_maxToMin) {
                    opacity_value = 1 - opacity_value;
                }

                opacity_value = parseFloat(opacity_value.toFixed(2));

                if (opacity_value <= 0) {
                    opacity_value = 0;

                } else if (opacity_value >= 1) {
                    opacity_value = 1;
                }
                
                landingPageBanner_backgroundMedia.style.opacity = opacity_value;

            } else {
                landingPageBanner_backgroundMedia.style.opacity = 1;
            }
        } else {
            return;
        }

    } catch (err) {
        console.log(err);
    }
}
function do_scrollWindowToStartOfPage() {
    try {
        if (GLOABL_pageIsScrolling) {
            return;
        } else {
            var navigation_parent = document.getElementById('navigation_parent');

            if (navigation_parent) {
                var navigation_position = navigation_parent.style.position;
                var window_scrollTo_value = 0;


                if (navigation_position == 'relative') {
                    var navigation_offsetFromTopOfWindow_buffer = 30;
                    var window_vertical_scrollAmount = get_windowVerticalScrollAmount()[0];
                    var navigation_offsetFromTopOfWindow = navigation_parent.getBoundingClientRect().top + navigation_offsetFromTopOfWindow_buffer + window_vertical_scrollAmount;

                    window_scrollTo_value = navigation_offsetFromTopOfWindow;
                }

                window.scroll({
                    top: window_scrollTo_value, 
                    left: 0, 
                    behavior: 'smooth'
                });

            } else {
                window.scroll({
                    top: window_scrollTo_value, 
                    left: 0, 
                    behavior: 'smooth'
                });
            }
        }
    } catch (err) {
        console.log('do_scrollWindowToStartOfPage failed, error : ' + err);
    }
}




//navigation functions
function do_navigation_scroll_functions() {
    do_navigation_image_opacity_onScroll();
    do_navigation_position_fixed_realtive_switch();

}
function do_navigation_image_opacity_onScroll() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');

        if (landingPageBanner_parent && navigation_parent) {
            var navigation_logo = navigation_parent.getElementsByClassName('navigation_logo')[0];
            var triggerPoint_start = window.innerHeight;
            var triggerPoint_end = triggerPoint_start;
            var triggerPoint_dispalcement = Math.abs(triggerPoint_end - triggerPoint_start); 
            var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

            if (window.screen.width <= 1300) {
                scrollAmount_from_triggerPoint += 60;
            }

            if (scrollAmount_from_triggerPoint >= 0) {
                var ratio_scale_maxToMin = false;
                var scroll_ratio = scrollAmount_from_triggerPoint / triggerPoint_dispalcement;
                var opacity_ratio = 1;
                var opacity_value = opacity_ratio * scroll_ratio;

                if (ratio_scale_maxToMin) {
                    opacity_value = 1 - opacity_value;
                }

                opacity_value = parseFloat(opacity_value.toFixed(2));

                if (opacity_value <= 0) {
                    opacity_value = 0;

                } else if (opacity_value >= 1) {
                    opacity_value = 1;
                }
                
                navigation_logo.style.opacity = opacity_value;

            } else {
                navigation_logo.style.opacity = 0;
            }

        } else {
            return;
        }

    } catch (err) {
        console.log(err);
    }
}
function do_navigation_position_fixed_realtive_switch() {
    try {
        var landingPageBanner_parent = document.getElementById('landingPageBanner_parent');
        var navigation_parent = document.getElementById('navigation_parent');
        var headerHeight = document.getElementById("navigation_parent").clientHeight;
        var marginShift = document.getElementById("landingPage_about");
        var triggerPoint_start = window.innerHeight;
        var scrollAmount_from_triggerPoint = get_windowVerticalScrollAmount()[0] - triggerPoint_start;

        if (window.screen.width <= 1300) {
            scrollAmount_from_triggerPoint += 60;
        }

        if (scrollAmount_from_triggerPoint >= 0) {
            var navigation_position_value = 'fixed';
            var navigation_dropShadow_value = '0px 5px 10px rgba(0,0,0,0.1)';
            var landingPageBanner_opacity = 0;
                
            navigation_parent.style.position = navigation_position_value;
            navigation_parent.style.boxShadow = navigation_dropShadow_value;
            landingPageBanner_parent.style.opacity = landingPageBanner_opacity;
            navigation_parent.classList.add('bclr_beige');
            marginShift.style.marginTop = headerHeight + "px";
        } else {
            navigation_parent.style.position = 'relative';
            navigation_parent.style.boxShadow = '0px 5px 10px rgba(0,0,0,0)';
            landingPageBanner_parent.style.opacity = 1;
            navigation_parent.classList.remove('bclr_beige');
            marginShift.style.marginTop = "0px";
        }

    } catch (err) {
        console.log(err);
    }
}
function get_sectionTopValue(elmt) {
    var navigation_section = document.getElementById('navigation_parent');

    if (element_exists(navigation_section) && element_exists(elmt)) {
        var window_scrollY = window.scrollY;
        var window_clientTop = document.documentElement.clientTop;
        var navigation_height = navigation_section.clientHeight;
        var scroll_buffer = 100;
        var elmt_top_value = elmt.getBoundingClientRect().top;

        if (windowWidthIsLessThanBreakPointIndex(3)) {
            scroll_buffer = 0;
        }

        var elmt_breakPoint = Math.floor(elmt_top_value + window_scrollY - window_clientTop - navigation_height - scroll_buffer);

        return elmt_breakPoint;

    } else {
        return 0;
    }
}
function goTo_aboutSection() {
    event.preventDefault();

    var target_section = document.getElementById('landingPage_about');

    if (element_exists(target_section)) {
        var section_breakPoint = get_sectionTopValue(target_section);

        window.scroll({
            top: section_breakPoint, 
            left: 0, 
            behavior: 'smooth'
        });
        do_navigation_switchNavActiveItem(0);

    } else {
        return;
    }
}
function goTo_howToSection() {
    event.preventDefault();

    var target_section = document.getElementById('landingPage_about');
    var navigation_section = document.getElementById('navigation_parent');

    if (element_exists(navigation_section) && element_exists(target_section)) {
        var window_height = window.innerHeight;
        var window_scrollY = window.scrollY;
        var window_clientTop = document.documentElement.clientTop;        
        var navigation_height = navigation_section.clientHeight;
        var section_top_value = target_section.getBoundingClientRect().top;
        var section_height = target_section.clientHeight;
        var section_breakPoint = section_top_value + window_scrollY - window_clientTop + section_height - window_height - navigation_height;

        window.scroll({
            top: section_breakPoint, 
            left: 0, 
            behavior: 'smooth'
        });
        do_navigation_switchNavActiveItem(1);

    } else {
        return;
    }
}
function goTo_shareSkill() {
    event.preventDefault();

    var target_section = document.getElementById('landingPage_sharerLearner');

    if (element_exists(target_section)) {
        var sharer_button = target_section.getElementsByClassName('switchContent_switchs')[0].getElementsByTagName('P')[0];

        if (element_exists(sharer_button)) {
            var section_breakPoint = get_sectionTopValue(target_section);
            GLOBAL_shareClick = 1;

            window.scroll({
                top: section_breakPoint, 
                left: 0, 
                behavior: 'smooth'
            });
            sharer_button.click();
            do_navigation_switchNavActiveItem(2);

        } else {
            return;
        }
    } else {
        return;
    }
}
function goTo_learnSkill() {
    event.preventDefault();

    var target_section = document.getElementById('landingPage_sharerLearner');

    if (element_exists(target_section)) {
        var learner_button = target_section.getElementsByClassName('switchContent_switchs')[0].getElementsByTagName('P')[1];

        if (element_exists(learner_button)) {
            var section_breakPoint = get_sectionTopValue(target_section);
            GLOBAL_shareClick = 1;

            window.scroll({
                top: section_breakPoint, 
                left: 0, 
                behavior: 'smooth'
            });
            learner_button.click();
            do_navigation_switchNavActiveItem(3);

        } else {
            return;
        }

    } else {
        return;
    }
}
function goTo_contact() {
    event.preventDefault();

    var target_section = document.getElementById('landingPage_contactForm');

    if (element_exists(target_section)) {
        var section_breakPoint = get_sectionTopValue(target_section);

        window.scroll({
            top: section_breakPoint, 
            left: 0, 
            behavior: 'smooth'
        });
        do_navigation_switchNavActiveItem(4);

    } else {
        return;
    }
}
function do_navigation_switchNavActiveItem(itemIndex) {
    var navigation_parent = document.getElementById('navigation_parent');

    if (element_exists(navigation_parent)) {
        var nav_item_array = navigation_parent.getElementsByClassName('tab_item');

        itemIndex = parseInt(itemIndex);

        for (var a = 0; a < nav_item_array.length; a++) {
            nav_item_array[a].classList.remove('active');
        }

        if (itemIndex == NaN || itemIndex < 0 || itemIndex > (nav_item_array.length - 1)) {
            itemIndex = 0;

        }

        nav_item_array[itemIndex].classList.add('active');

        if (windowWidthIsLessThanBreakPointIndex(3)) {
            set_carouselInnerWidth('navigation_parent carousel_parent', 40, 4);
            do_shiftToActiveItem(navigation_parent);
        }

    } else {
        return;
    }
}
function get_landingPageSection_breakPoints() {
    try {       
        var landingPageSection_breakPoints = []; 
        var howToSection = document.getElementById('landingPage_about');
        var shareLearnSkillSection = document.getElementById('landingPage_sharerLearner');
        var contactSection = document.getElementById('landingPage_contactForm');

        if (element_exists(howToSection)) {
            var navigation_section = document.getElementById('navigation_parent');
            var window_height = window.innerHeight;
            var window_scrollY = window.scrollY;
            var window_clientTop = document.documentElement.clientTop;        
            var navigation_height = navigation_section.clientHeight;
            var section_top_value = howToSection.getBoundingClientRect().top;
            var section_height = howToSection.clientHeight;
            var howToSection_breakPoint = section_top_value + window_scrollY - window_clientTop + section_height - window_height - navigation_height;

        } else {
            var howToSection_breakPoint = 0;

        }

        landingPageSection_breakPoints.push(howToSection_breakPoint);

        if (element_exists(shareLearnSkillSection)) {
            var shareLearnSkillSection_breakPoint = get_sectionTopValue(shareLearnSkillSection);

        } else {
            var shareLearnSkillSection_breakPoint = 0;
        }

        landingPageSection_breakPoints.push(shareLearnSkillSection_breakPoint);

        if (element_exists(contactSection)) {
            var contactSection_breakPoint = get_sectionTopValue(contactSection);

        } else {
            var contactSection_breakPoint = 0;

        }

        landingPageSection_breakPoints.push(contactSection_breakPoint);

        return landingPageSection_breakPoints;

    } catch (err) {

    }
}
function do_navigation_switchNavActiveItem_onScroll() {
    try {   
        var landingPageSection_breakPoints = get_landingPageSection_breakPoints();
        var navigation_section = document.getElementById('navigation_parent');
        var navigation_height = navigation_section.clientHeight;
        var window_scrollY = window.scrollY;
        var window_scrollY_and_height = Math.floor(window_scrollY + navigation_height);

        if (window_scrollY_and_height >= landingPageSection_breakPoints[0] && window_scrollY_and_height < landingPageSection_breakPoints[1]) {
            do_navigation_switchNavActiveItem(1);

        } else if (window_scrollY_and_height >= landingPageSection_breakPoints[1] && window_scrollY_and_height < landingPageSection_breakPoints[2]) {
            var sharerLearnerSection = document.getElementById('landingPage_sharerLearner');
            
            if (element_exists(sharerLearnerSection)) {
                var switchContainer = sharerLearnerSection.getElementsByClassName('switchContent_switchs')[0];
                var switchSlider = switchContainer.getElementsByClassName('switchContent_switch_slider')[0];

                if (switchSlider.classList.contains('bclr_blue')) {
                    do_navigation_switchNavActiveItem(2);

                } else if (switchSlider.classList.contains('bclr_coral')) {
                    do_navigation_switchNavActiveItem(3);

                }
            }

        } else if (window_scrollY_and_height >= landingPageSection_breakPoints[2]) {
            do_navigation_switchNavActiveItem(4);

        } else {
            do_navigation_switchNavActiveItem(0);

        }
    } catch (err) {
        console.log(err);
    }
}
function do_shiftToActiveItem(elmt) {
    if (element_exists(elmt)) {
        var carousel_outer = elmt.getElementsByClassName('carousel_outer')[0];
        var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];
        var active_item = carousel_inner.getElementsByClassName('active')[0];
        var active_item_marginLeft = 40;
        var active_item_offsetLeft = active_item.offsetLeft;

        carousel_outer.scrollLeft = active_item_offsetLeft - active_item_marginLeft;

    } else {
        return;
    }
}





//button functions
function set_buttonMouseUpDownEvents() {
    try {
        var btn_black_array = document.getElementsByClassName('btn_black');
        
        for (var a = 0; a < btn_black_array.length; a++) {
            btn_black_array[a].addEventListener('mousedown', do_buttonMouseDownEvent);
            btn_black_array[a].addEventListener('mouseup', do_buttonMouseUpEvent);
        }

    } catch (err) {
        console.log(err);

    }

}
function do_buttonMouseDownEvent() {
    try {
        var target_button = event.target.parentElement;

        target_button.classList.add('btn_clicked');

    } catch (err) {
        console.log(err);

    }

}
function do_buttonMouseUpEvent() {
    try {
        var target_button = event.target.parentElement;

        target_button.classList.remove('btn_clicked');

    } catch (err) {
        console.log(err);

    }

}





//carousel functions
function set_carouselInnerWidth(carousel_parent_class, carousel_item_margin, carousel_screenWidth_trigger_index) {
    try{
        if (windowWidthIsLessThanBreakPointIndex(carousel_screenWidth_trigger_index)) {
            var carousel_parent_array = document.getElementsByClassName(carousel_parent_class);

            for (var a = 0; a < carousel_parent_array.length; a++) {
                var carousel_inner = carousel_parent_array[a].getElementsByClassName('carousel_inner')[0];

                if (element_exists(carousel_inner)) {
                    var carousel_inner_width = 0;
                    var roundingError_value = 1;
                    var carousel_items_array = carousel_inner.getElementsByClassName('carousel_item');
                    var carousel_items_count = carousel_items_array.length;
                    var carousel_items_total_margin = carousel_item_margin * (carousel_items_count - 1); //the minus 1 is because the first element has no margin

                    for (var b = 0; b < carousel_items_count; b++) {
                        var carousel_item_width = Math.ceil(carousel_items_array[b].clientWidth);

                        carousel_inner_width += carousel_item_width;
                    }

                    carousel_inner_width += carousel_items_total_margin + roundingError_value;
                    carousel_inner.style.width = carousel_inner_width + 'px';
                }
            }

        } else {
            var carousel_parent_array = document.getElementsByClassName(carousel_parent_class);

            for (var a = 0; a < carousel_parent_array.length; a++) {
                var carousel_inner = carousel_parent_array[a].getElementsByClassName('carousel_inner')[0];
                if (element_exists(carousel_inner)) {
                    carousel_inner.style.width = '';
                }
            }

            return;
        }

    } catch (err) {
        console.log(err);

    }
}





//tab functions
function do_switchActiveTab(elmt) {
    try {
        var element_parent = elmt.parentElement;
        var element_sibling_array = element_parent.children;
        var active_element_index = 0;

        for (var a = 0; a < element_sibling_array.length; a++) {
            if (element_sibling_array[a] == elmt) {
                active_element_index = a;

            }

            element_sibling_array[a].classList.remove('active');
        }

        element_sibling_array[active_element_index].classList.add('active');

    } catch (err) {
        console.log(err);

    }
}




//read more functions
function do_readMore(elmt) {
    var parent = elmt.parentElement.parentElement;
    var container = parent.getElementsByClassName('readMore_container')[0];
    var element_array = container.getElementsByTagName('P');
    var open_close = elmt.innerText;

    if (open_close == '... Read more') {
        var button_innerText = ' Read less';
        var element_display = 'inline';

    } else if (open_close == 'Read less') {
        var button_innerText = '... Read more';
        var element_display = '';

    } else {
        console.log('do_readMore error');
        return;

    }

    parent.style.opacity = 0;

    setTimeout(function() {
        for (var a = 0; a < element_array.length; a++) {
            if (element_array[a] != elmt) {
                element_array[a].style.display = element_display;
    
            }
        }

        var parent_height = container.clientHeight;

        elmt.innerText = button_innerText;
        parent.style.height = parent_height + 'px';

    }, 300);

    setTimeout(function() {
        parent.style.opacity = 1;

    }, 300);
}
function do_readMore_reset() {
    var parent_array = document.getElementsByClassName('readMore_parent');

    for (var a = 0; a < parent_array.length; a++) {
        var parent = parent_array[a];
        var container = parent.getElementsByClassName('readMore_container')[0];
        var element_array = container.getElementsByTagName('P');
        var button = container.getElementsByClassName('readMore_button')[0];
        var button_innerText = '... Read more';
        var element_display = '';

        parent.style.opacity = '';
        parent.style.height = '';
        button.innerText = button_innerText;

        for (var a = 0; a < element_array.length; a++) {
            if (element_array[a] != button) {
                element_array[a].style.display = element_display;
    
            }
        }
    }
}





//general functions
var GLOBAL_scrollIsUp = false;
var GLOBAL_previousScollValue = window.scrollY;
function update_GLOBAL_scrollIsUp() {
    if (window.scrollY < GLOBAL_previousScollValue) {
        GLOBAL_scrollIsUp = true;

    } else {
        GLOBAL_scrollIsUp = false;

    }

    GLOBAL_previousScollValue = window.scrollY;
}
function element_exists(elmt) {
    if (elmt) {
        return true;

    } else {
        return false;
    }
}
function get_activeCarouselItem(carousel_parent) {
    if (element_exists(carousel_parent)) {
        var carousel_item_array = carousel_parent.getElementsByClassName('carousel_item');

        for (var a = 0; a < carousel_item_array.length; a++) {
            if (carousel_item_array[a].classList.contains('active')) {
                return a;
            }
        }

        return 0;

    } else {
         return 0;
    }
}
function get_translateX_valueOfElement(targetElement) {
    var targetElement_transform = targetElement.style.transform;
    var transform_type = 'translateX(';
    var transform_type_index = targetElement_transform.indexOf(transform_type);
    var transform_type_closing_item = ')';

    if (transform_type_index > -1) {
        var transform_type_closing_item_index = targetElement_transform.indexOf(transform_type_closing_item, transform_type_index);
        var translateX_value = targetElement_transform.substring((transform_type_index + transform_type.length), transform_type_closing_item_index);
        var translateX_int = parseInt(translateX_value);

    } else {
        var translateX_int = 0;

    }

    return translateX_int;
}
function set_toTop_onPageLoad() {
    window.scrollTo(0,0);
}




//form & input functions
function set_inputValidationFunction() {
    try {
        var target_input_array = document.getElementsByClassName('validate_input');

        for (var a = 0; a < target_input_array.length; a++) {
            target_input_array[a].addEventListener('blur', do_inputValidation_onBlur_Function);
        }

    } catch (err) {
        console.log(err);

    }
}
function do_inputValidation_onBlur_Function() {
    try {
        var input = event.target;
        var input_type = input.getAttribute('type');

        if (input_type == 'text') {
            validate_text_input_element(input);

        } else if (input_type == 'email') {
            validate_email_input_element(input);

        } else if (input_type == 'tel') {
            validate_phoneNumber_input_element(input);
        
        } else if (input_type == 'textarea') {
            validate_textarea_input_element(input);
        
        } else {
            console.log('do_inputValidationFunction cannot find the input type');
        }

    } catch (err) {
        console.log(err);

    }
}
function validate_text_input_element(elmt) {
    try {
        var input = elmt;
        var input_value = input.value;
        var allowed_characters = /^[A-Za-z-' ]+$/;
        var validation_failed = true;

        if (input_value.match(allowed_characters)) {
            validation_succesful_text_input_element(input);
            validation_failed = false;

            return validation_failed;

        } else {
            validation_error_text_input_element(input);

            return validation_failed;

        }

    } catch (err) {
        console.log(err);

    }
}
function validate_textarea_input_element(elmt) {
    try {
        var input = elmt;
        var input_value = input.value;
        var allowed_characters = /^[A-Za-z0-9.,!"£$%&#~'@;:/?++-_ ]+$/;
        var validation_failed = true;

        if (input_value.match(allowed_characters)) {
            validation_succesful_text_input_element(input);
            validation_failed = false;

            return validation_failed;

        } else {
            validation_error_text_input_element(input);

            return validation_failed;

        }

    } catch (err) {
        console.log(err);

    }
}
function validate_select_input_element(elmt) {
    try {
        var input = elmt;
        var input_value = elmt.value;
        var option_array = elmt.getElementsByTagName('OPTION');
        var option_value_array = [];
        var accepted_option = false;
        var validation_failed = true;

        for (var a = 0; a < option_array.length; a++) {
            var option_value = option_array[a].getAttribute('value');

            option_value_array.push(option_value);
        }

        for (var b = 0; b < option_value_array.length; b++) {
            if (option_value_array[b] == '' || option_value_array[b] == null) {
                //do nothing
            } else if (input_value == option_value_array[b]) {
                accepted_option = true;
            }
        }

        if (accepted_option) {
            validation_succesful_select_input_element(input);
            validation_failed = false;

            return validation_failed;

        } else {
            validation_error_select_input_element(input);

            return validation_failed;

        }

    } catch (err) {
        console.log(err);

    }
}
function validate_email_input_element(elmt) {
    try {
        var input = elmt;
        var input_value = input.value;
        var allowed_characters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var validation_failed = true;

        if (input_value.match(allowed_characters)) {
            validation_succesful_text_input_element(input);
            validation_failed = false;

            return validation_failed;

        } else {
            validation_error_text_input_element(input);

            return validation_failed;

        }

    } catch (err) {
        console.log(err);

    }
}
function validate_phoneNumber_input_element(elmt) {
    try {
        var input = elmt;
        var input_value = input.value;
        var allowed_characters = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        var validation_failed = true;

        if (input_value.match(allowed_characters)) {
            validation_succesful_text_input_element(input);
            validation_failed = false;

            return validation_failed;

        } else {
            validation_error_text_input_element(input);

            return validation_failed;

        }

    } catch (err) {
        console.log(err);

    }
}
function validation_succesful_text_input_element(elmt) {
    try {
        var input = elmt;
        var input_parent = input.parentElement;
        var error_span_array = input_parent.getElementsByClassName('validation_error_message');

        elmt.classList.remove('validation_error');
        elmt.classList.add('validation_success');

        for (var a = 0; a < error_span_array.length; a++) {
            error_span_array[a].remove();
        }

    } catch (err) {
        console.log(err);

    }
}
function validation_error_text_input_element(elmt) {
    try {
        var input = elmt;                    
        var input_parent = input.parentElement;
        var error_span_array = input_parent.getElementsByClassName('validation_error_message');

        elmt.classList.remove('validation_success');
        elmt.classList.add('validation_error');

        for (var a = 0; a < error_span_array.length; a++) {
            error_span[a].style.height = 0;

            setTimeout(function() {
                error_span_array[a].remove();
            }, 300);
        }

        var input_error_filed = input.getAttribute('placeholder');
        var error_span = document.createElement('SPAN');
        var error_span_innerText = 'Please enter a valid ' + input_error_filed;
        
        error_span.classList.add('validation_error_message');
        error_span.classList.add('fnt_small');
        error_span.classList.add('clr_red');
        error_span.innerText = error_span_innerText;
        error_span.style.height = 0;
        input_parent.appendChild(error_span);
        error_span.style.height = '50px';

    } catch (err) {
        console.log(err);

    }
}
function validation_succesful_select_input_element(elmt) {
    try {
        var input = elmt;
        var input_parent = input.parentElement.parentElement;
        var target_element = input_parent.getElementsByClassName('select_element')[0];
        var error_span_array = input_parent.getElementsByClassName('validation_error_message');

        target_element.classList.remove('validation_error');
        target_element.classList.add('validation_success');

        for (var a = 0; a < error_span_array.length; a++) {
            error_span_array[a].style.height = 0;
            setTimeout(function() {
                
            error_span_array[a].remove();
            }, 300);
        }

    } catch (err) {
        console.log(err);

    }
}
function validation_error_select_input_element(elmt) {
    try {
        var input = elmt;                    
        var input_parent = input.parentElement.parentElement;
        var target_element = input_parent.getElementsByClassName('select_element')[0];
        var error_span_array = input_parent.getElementsByClassName('validation_error_message');

        target_element.classList.remove('validation_success');
        target_element.classList.add('validation_error');

        for (var a = 0; a < error_span_array.length; a++) {
            error_span_array[a].remove();
        }

        var error_span = document.createElement('SPAN');
        var error_span_innerText = 'Please select a valid option';
        
        error_span.classList.add('validation_error_message');
        error_span.classList.add('fnt_small');
        error_span.classList.add('clr_red');
        error_span.innerText = error_span_innerText;
        error_span.style.height = 0;
        input_parent.appendChild(error_span);
        error_span.style.height = '50px';

    } catch (err) {
        console.log(err);

    }
}
function show_selectInputOptions(elmt) {
    window.removeEventListener('click', hide_selectInputOptions);

    try {
        var select_element = elmt;
        var select_element_openClose = elmt.getAttribute('openClose');
        var select_element_parent = select_element.parentElement;
        var select_input = select_element_parent.getElementsByClassName('select_input')[0];
        var select_options_container = select_element_parent.getElementsByClassName('options_container')[0];
        var select_options_array = select_options_container.getElementsByClassName('option');
        var select_options_container_height = 0;
        var roundingError_value = 1;

        if (select_element_openClose == 'open') {
            for (var a = 0; a < select_options_array.length; a++) {
                var option_height = Math.ceil(select_options_array[a].clientHeight);
    
                select_options_container_height += option_height;
            }
    
            select_options_container_height += roundingError_value;
            select_options_container.style.height = select_options_container_height + 'px';
            select_element.classList.add('rotateArrow_180');
            select_element.setAttribute('openClose', 'close');
    
            setTimeout(function() { window.addEventListener('click', hide_selectInputOptions); }, 10);

        } else {
            select_options_container.style.height = select_options_container_height + 'px';
            select_element.classList.remove('rotateArrow_180');
            select_element.setAttribute('openClose', 'open');

        }

    } catch (err) {
        console.log(err);

    }
}
function update_selectInputValue(elmt) {
    try {
        var option = elmt;
        var option_index = 0;
        var option_innerText = option.innerText;
        var select_options_container = option.parentElement;
        var select_options_container_parent = select_options_container.parentElement;
        var select_input = select_options_container_parent.getElementsByClassName('select_input')[0];
        var select_input_option_array = select_input.getElementsByTagName('OPTION');
        var select_element = select_options_container_parent.getElementsByClassName('select_element')[0];
        var select_options_container_height = 0;
        var selected_option_array = select_options_container.getElementsByClassName('option');

        for (var a = 0; a < selected_option_array.length; a++) {
            selected_option_array[a].classList.remove('active');

            if (selected_option_array[a] == option) {
                option_index = a;
            }
        }

        for (var b = 0; b < select_input_option_array.length; b++) {
            select_input_option_array[b].selected = false;
        }

        select_input_option_array[option_index + 1].selected = true;
        select_element.innerText = option_innerText;
        option.classList.add('active');
        select_options_container.style.height = select_options_container_height + 'px';
        select_element.classList.remove('rotateArrow_180');
        select_element.setAttribute('openClose', 'open');
        window.removeEventListener('click', hide_selectInputOptions);

        validate_select_input_element(select_input);

    } catch (err) {
        console.log(err);
    }
}
function hide_selectInputOptions() {
    try {
        var click_target = event.target;
        var leave_while_loop = false;
        var hide_options = false;

        while (leave_while_loop == false) {
            if (click_target.classList.contains('options_container')) {
                leave_while_loop = true;

            } else if (click_target.tagName == 'BODY' || click_target.tagName == 'HTML') {
                leave_while_loop = true;
                hide_options = true;

            } else {
                click_target = click_target.parentElement;
            }
        }

        if (hide_options == true) {
            var select_options_container_array = document.getElementsByClassName('options_container');

            for (var a = 0; a < select_options_container_array.length; a++) {
                var select_options_container = select_options_container_array[a];
                var select_options_container_height = 0;
                var select_options_container_parent = select_options_container.parentElement;
                var select_element = select_options_container_parent.getElementsByClassName('select_element')[0];

                select_element.classList.remove('rotateArrow_180');
                select_element.setAttribute('openClose', 'open');
                select_options_container.style.height = select_options_container_height + 'px';
            }

            window.removeEventListener('click', hide_selectInputOptions);

        } else {
            return;
        }

    } catch (err) {
        console.log(err);

    }
}
function validate_inquiryForm(elmt) {
    try {
        var form = elmt.parentElement.parentElement.parentElement;
        var form_body = form.getElementsByClassName('form_body')[0];
        var inputs_to_validate_array = form_body.getElementsByClassName('validate_input');
        var input_error_count = 0;
        var submitButton = form.getElementsByClassName('formSendButton')[0];

        for (var a = 0; a < inputs_to_validate_array.length; a++) {
            var input = inputs_to_validate_array[a];
            var input_type = input.getAttribute('type');

            if (input_type == null || input_type == '') {
                input_type = input.tagName
                input_type = input_type.toLowerCase();
            }
            console.log(input_type);

            if (input_type == 'text') {
                var validation_failed = validate_text_input_element(input);
    
            } else if (input_type == 'email') {
                var validation_failed = validate_email_input_element(input);
    
            } else if (input_type == 'tel') {
                var validation_failed = validate_phoneNumber_input_element(input);
            
            } else if (input_type == 'select') {
                var validation_failed = validate_select_input_element(input);
            
            } else if (input_type == 'textarea') {
                var validation_failed = validate_textarea_input_element(input);
            
            } else {
                console.log('do_inputValidationFunction cannot find the input type');
            }

            if (validation_failed) { input_error_count++; }
        }

        if (input_error_count == 0) {
            
            submitButton.click();

        } else {
            console.log('error count : ' + input_error_count);

        }

    } catch (err) {
        console.log('form send failed, error : ' + err);

    }
}
function set_contactForm7_ladingPage_ajaxResponses() {
    var contactForm_parent = document.getElementById('landingPage_contactForm');

    if (element_exists(contactForm_parent)) {
        document.addEventListener( 'wpcf7mailsent', do_contactForm7_ladingPage_ajaxResponse_success);
        document.addEventListener('wpcf7invalid', do_contactForm7_ladingPage_ajaxResponse_fail);
        document.addEventListener('wpcf7spam', do_contactForm7_ladingPage_ajaxResponse_fail);
        document.addEventListener('wpcf7mailfailed', do_contactForm7_ladingPage_ajaxResponse_fail);
    }
}
function do_contactForm7_ladingPage_ajaxResponse_success() {
    var contactForm_parent_container = document.getElementById('landingPage_contactForm');
    var form_parent = contactForm_parent_container.getElementsByClassName('form_parent')[0];

    if (element_exists(form_parent)) {
        if (windowWidthIsLessThanBreakPointIndex(2)) {
            var contactForm_parent_container_height = '';

        } else {
            var contactForm_parent_container_height = contactForm_parent_container.clientHeight + 'px';

        }
        var contactForm_parent_container_height = contactForm_parent_container.clientHeight;
        var contactForm_success_container = contactForm_parent_container.getElementsByClassName('form_successContent')[0];
        var form_intro_container = contactForm_parent_container.getElementsByClassName('form_image_formContainer_introCopy')[0];

        contactForm_success_container.style.height = contactForm_parent_container_height;
        form_parent.style.height = 0;
        form_intro_container.style.opacity = 0;
        contactForm_success_container.style.display = 'block';
        
        // if (typeof ga === 'function'){
        //     ga('send', 'event', 'Enquiry', 'Enquiry Submitted');
        //     console.log('ga form subbition event fired');
            window.dataLayer.push({
                "event" : "cf7submission",
                "formId" : event.detail.contactFormId,
                "response" : event.detail.inputs
            });

            console.log(window.dataLayer);
            console.log('ga form subbition event fired abc');
            
        // }

        setTimeout(function() {
            contactForm_success_container.style.opacity = 1;
        }, 50);

        setTimeout(function() {
            form_intro_container.style.display = 'none';
            goTo_contact();
        }, 300);

        
    }
}
function do_contactForm7_ladingPage_ajaxResponse_fail() {
    var contactForm_parent_container = document.getElementById('landingPage_contactForm');
    var form_parent = contactForm_parent_container.getElementsByClassName('form_parent')[0];

    if (element_exists(contactForm_parent_container) && element_exists(form_parent)) {
        var contactForm_failer_container = contactForm_parent_container.getElementsByClassName('form_failerPopUp')[0];

        contactForm_failer_container.style.display = 'block';

        setTimeout(function() {
            contactForm_failer_container.style.opacity = 1;
        }, 50);
    }
}
function do_formValidation_resetForm() {
    var contactForm_parent_container = document.getElementById('landingPage_contactForm');
    var form_parent = contactForm_parent_container.getElementsByClassName('form_parent')[0];

    if (element_exists(form_parent)) {
        var contact_form = form_parent.getElementsByTagName('FORM')[0];
        var contactForm_success_container = contactForm_parent_container.getElementsByClassName('form_successContent')[0];
        var form_intro_container = contactForm_parent_container.getElementsByClassName('form_image_formContainer_introCopy')[0];

        form_parent.style.height = '';
        form_intro_container.style.display = 'block';
        contactForm_success_container.style.opacity = 0;
        contact_form.reset();

        setTimeout(function() {
            form_intro_container.style.opacity = 1;
        }, 50);

        setTimeout(function() {
            contactForm_success_container.style.display = 'none';
        }, 300);
    }
}
function do_formValidation_closeErrorPopUp(elmt) {
    var elmt_parent = elmt.parentElement.parentElement;

    if (element_exists(elmt_parent)) {
        elmt_parent.style.opacity = '';

        setTimeout(function() {
            elmt_parent.style.display = '';
        }, 300);
    }

}





// Switch Content Module Functions
var GLOBAL_switchContent_textWithCarousel_carouselIsAnimating = false;
var GLOBAL_switchContent_textWithCarousel_touchStart_position = 0;

function set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(trueFalse) {
    GLOBAL_switchContent_textWithCarousel_carouselIsAnimating = trueFalse;
}
function do_switchContent_switchAll() {
    var elmt = event.currentTarget;

    do_switchContent_switchSlider(elmt);
    do_switchContent_switchContent();
    do_switchContent_switchNavActiveitem(elmt);

}
function set_switchContent_carouselInnerWidth(carousel_parent_class, carousel_item_margin, carousel_screenWidth_trigger_index) {
    try{
        if (windowWidthIsLessThanBreakPointIndex(carousel_screenWidth_trigger_index)) {
            var carousel_parent_array = document.getElementsByClassName(carousel_parent_class);

            for (var a = 0; a < carousel_parent_array.length; a++) {
                var parent_container = carousel_parent_array[a].parentElement;
                var parent_container_previous_display = parent_container.style.display;
                var parent_container_previous_opacity = parent_container.style.opacity;
                var carousel_inner = carousel_parent_array[a].getElementsByClassName('carousel_inner')[0];

                if (element_exists(carousel_inner)) {
                    var carousel_inner_width = 0;
                    var roundingError_value = 2;
                    var carousel_items_array = carousel_inner.getElementsByClassName('carousel_item');
                    var carousel_items_count = carousel_items_array.length;
                    var carousel_items_total_margin = carousel_item_margin * (carousel_items_count - 1); //the minus 1 is because the first element has no margin

                    
                    parent_container.style.opacity = 0;
                    parent_container.style.display = 'block';

                    for (var b = 0; b < carousel_items_count; b++) {
                        var carousel_item_width = Math.ceil(carousel_items_array[b].clientWidth);

                        carousel_inner_width += carousel_item_width;
                    }

                    carousel_inner_width += carousel_items_total_margin + roundingError_value;
                    carousel_inner.style.width = carousel_inner_width + 'px';
                    parent_container.style.opacity = parent_container_previous_opacity;
                    parent_container.style.display = parent_container_previous_display;
                }
            }

        } else {
            var carousel_parent_array = document.getElementsByClassName(carousel_parent_class);

            for (var a = 0; a < carousel_parent_array.length; a++) {
                var carousel_inner = carousel_parent_array[a].getElementsByClassName('carousel_inner')[0];

                if (element_exists(carousel_inner)) {
                    carousel_inner.style.width = '';
                }
            }

            return;
        }

    } catch (err) {
        console.log(err);

    }
}
function do_switchContent_switchNavActiveitem(elmt) {
    try {   
        var elmt_parent = elmt.parentElement;
        var sibling_array = elmt_parent.getElementsByTagName('P');

        for (var a = 0; a < sibling_array.length; a++) {
            if (elmt == sibling_array[a]) {
                var elmt_index = a;
            }
        }

        elmt_index += 2;
        do_navigation_switchNavActiveItem(elmt_index);

    } catch (err) {

    }
}
function do_switchContent_resetAll() {
    do_switchContent_switchSlider_reset();
}
function do_switchContent_switchSlider(elmt) {
    try {
        var switch_container = elmt.parentElement;
        var sibling_array = switch_container.getElementsByTagName('P');
        var switch_slider = switch_container.getElementsByClassName('switchContent_switch_slider')[0];
        var sibling_trigger_class = 'clr_white';
        var switch_slider_class_array = ['bclr_blue', 'bclr_coral'];

        if (sibling_array.length <= 2) {
            for (var a = 0; a < sibling_array.length; a++) {
                sibling_array[a].classList.remove(sibling_trigger_class);

                if (sibling_array[a] == elmt) {
                    var content_index = a;

                }
            }

            // var switch_slider_position = (content_index * Math.ceil(sibling_array[0].clientWidth));
            var switch_slider_position = document.getElementsByClassName("p_xLarge")[0].clientWidth;
            var switch_slider_width = (Math.ceil(sibling_array[content_index].clientWidth));

            sibling_array[content_index].classList.add(sibling_trigger_class);
            if (document.getElementsByClassName("p_xLarge")[0].classList.contains("clr_white")) {
                switch_slider.style.left = '0px';
            } else {
                switch_slider.style.left = switch_slider_position + 'px';
            }
            switch_slider.style.width = switch_slider_width + 'px';
            switch_slider.classList.add(switch_slider_class_array[content_index]);

            for (var b = 0; b < switch_slider_class_array.length; b++) {
                if (b != content_index) {
                    switch_slider.classList.remove(switch_slider_class_array[b]);

                }
            }

        } else {
            //do nothing
        }
    } catch (err) {
        console.log(err);
    }
}
function do_switchContent_switchContent() {
    try {
        var elmt = event.currentTarget;
        var switch_container = elmt.parentElement;
        var switchContainer_parent = switch_container.parentElement.parentElement.parentElement.parentElement;
        var sibling_array = switch_container.getElementsByTagName('P');
        var item_array = switchContainer_parent.getElementsByClassName('switchContent_text_width_carousel_item');

        if (sibling_array.length <= 2) {
            for (var a = 0; a < sibling_array.length; a++) {
                if (sibling_array[a] == elmt) {
                    var content_index = a;

                }
            }

            for (var b = 0; b < item_array.length; b++) {
                item_array[b].classList.remove('active');
            }

            setTimeout(function() {
                for (var b = 0; b < item_array.length; b++) {
                    item_array[b].style.display = 'none';
                }

                item_array[content_index].style.display = 'block';     

            }, 300);

            setTimeout(function() {
                item_array[content_index].classList.add('active');

                do_switchContent_text_with_carousel_carousel_resetAll();
                set_switchContent_text_width_carousel_height();

            }, 310);

        } else {
            //do nothing
        }
    } catch (err) {
        console.log(err);
    }
}
function do_switchContent_switchSlider_reset() {
    try {
        var parent_array = document.getElementsByClassName('switchContent_parent');

        for (var a = 0; a < parent_array.length; a++) {
            var switch_container = parent_array[a].getElementsByClassName('switchContent_switchs')[0];
            var switch_slider = switch_container.getElementsByClassName('switchContent_switch_slider')[0];
            var sibling_array = switch_container.getElementsByTagName('P');
            var switchIsBlue = switch_slider.contains('bclr_blue');

            if (switchIsBlue) {
                var sibling_index = 0;

            } else {
                var sibling_index = 1;

            }

            var sibling_width = sibling_array[sibling_index].clientWidth;

            switch_slider.style.width = sibling_width + 'px';

        }

    } catch (err) {

    }
}
function do_switchContent_text_with_carousel_reset() {
    try {
        var parent_array = document.getElementsByClassName('switchContent_parent text_with_carousel');

        for (var a = 0; a < parent_array.length; a++) {
            var item_array = parent_array[a].getElementsByClassName('switchContent_text_width_carousel_item');

            for (var b = 0; b < item_array.length; b++) {
                item_array[b].classList.remove('active');
                item_array[b].style.display = 'none';
            }

            item_array[0].style.display = 'block';
            item_array[0].classList.add('active');
        }
        
    } catch (err) {

    }
}
function do_switchContent_text_with_carousel_alignCarouselAndText_left() {
    try {
        var parent_array = document.getElementsByClassName('switchContent_parent text_with_carousel');

        for (var a = 0; a < parent_array.length; a++) {
            var window_max_width = 1920; //max width of the body of the page
            var window_min_width = 880; //threshold for mobile design
            var textContent_container_max_width = 1200; //max width of text container element
            var window_width = get_windowWidth();
            var text_and_carousel_item_array = parent_array[a].getElementsByClassName('switchContent_text_width_carousel_item');
            var textContent_container = text_and_carousel_item_array[0].getElementsByClassName('switchContent_textContent_container_outer')[0];

            for (var b = 0; b < text_and_carousel_item_array.length; b++) {
                var carousel_container = text_and_carousel_item_array[b].getElementsByClassName('switchContent_carousel_container')[0];
                var textContent_container = text_and_carousel_item_array[b].getElementsByClassName('switchContent_textContent_container_outer')[0];
                var alignment_target = textContent_container.getElementsByClassName('switchContent_textContent')[0];


                var current_display = text_and_carousel_item_array[b].style.display;

                text_and_carousel_item_array[b].style.display = 'block';

                var target_offset_from_screen = alignment_target.getBoundingClientRect().left;
                var alignment_value = target_offset_from_screen;

                text_and_carousel_item_array[b].style.display = current_display;

                if (window_width >= window_max_width) {
                    alignment_value = (window_max_width - textContent_container_max_width) / 2; //divided by 2 as 100% is the total margin and we just want the left
                    
                } else if (window_width <= window_min_width) {
                    alignment_value = 0; //remove on mobile
    
                }

                carousel_container.style.marginLeft = alignment_value + 'px';
            
            }
        }
    } catch (err) {
        console.log(err)
    }
}
function do_switchContent_text_with_carousel_carousel_shift() {
    try {
        if (GLOBAL_switchContent_textWithCarousel_carouselIsAnimating) {
            console.log('animation currently running');

        } else {
            var elmt = event.currentTarget;

            if (elmt.classList.contains('left')) {
                do_switchContent_text_with_carousel_carousel_shift_leftRight(elmt, 'left');

            } else if (elmt.classList.contains('right')) {
                do_switchContent_text_with_carousel_carousel_shift_leftRight(elmt, 'right');

            } else {
                console.log('button is not left or right. element : ' + elmt);
            }
        }
    } catch (err) {

    }
}
function do_switchContent_text_with_carousel_carousel_shift_leftRight(elmt, leftRight) { //ideally wants to be broken down into smaller functions
    try {
        set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(true);

        if (leftRight == 'left'  || leftRight == 'right') {
            var carousel_parent = elmt.parentElement.parentElement;
            var carousel_outer = carousel_parent.getElementsByClassName('carousel_outer')[0];
            var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];
            var carousel_inner_width = carousel_inner.clientWidth;
            var carousel_item_array = carousel_inner.getElementsByClassName('carousel_item');
            var carousel_item_last_width = carousel_item_array[carousel_item_array.length - 1].clientWidth;
            var carousel_item_margin = 20;
            var active_item_index = get_activeCarouselItem(carousel_inner);
            var active_item = carousel_item_array[active_item_index];
            var active_item_width = active_item.clientWidth;
            var transform_value_max = 0;
            var transform_value_min = (-1) * (carousel_inner_width - carousel_item_last_width);
            var translateX_int_initial = get_translateX_valueOfElement(carousel_inner);

            do_stopAllVideos_inCarousel(carousel_inner);

            if (leftRight == 'left') {
                if (active_item_index == 0) {
                    console.log('active item is first item in carousel');
                    set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                    return;

                } else {
                    var active_item = carousel_item_array[active_item_index];

                    active_item.classList.remove('active');
                    carousel_item_array[active_item_index - 1].classList.add('active');
                    active_item_index = get_activeCarouselItem(carousel_inner);
                    active_item = carousel_item_array[active_item_index];

                    var active_item_width = active_item.clientWidth + carousel_item_margin;
                    var translateX_int_new = translateX_int_initial + active_item_width;
                }
            }
            
            if (leftRight == 'right') {
                if (active_item_index == (carousel_item_array.length - 1)) {
                    console.log('active item is final item in carousel');
                    set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                    return;

                } else {     
                    var active_item = carousel_item_array[active_item_index];
                    var active_item_width = active_item.clientWidth  + carousel_item_margin;
                    var translateX_int_new = translateX_int_initial - active_item_width;

                    active_item.classList.remove('active');
                    carousel_item_array[active_item_index + 1].classList.add('active');
                }
            }

            if (translateX_int_new > transform_value_max) {
                translateX_int_new = transform_value_max;

            } else if (translateX_int_new <= transform_value_min) {
                translateX_int_new  = transform_value_min;

            } else {
                translateX_int_new = Math.floor(translateX_int_new);

            }

            carousel_inner.style.transform = 'translateX(' + translateX_int_new + 'px)';

        } else {
            console.log('do_switchContent_text_with_carousel_carousel_shift_leftRight : left or right a parameter not set');
        }

        set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
        return;
        
    } catch (err) {
        console.log(err);
    }
}
function do_switchContent_text_with_carousel_carousel_resetAll() {
    var parent_array = document.getElementsByClassName('switchContent_parent text_with_carousel');

    for (var a = 0; a < parent_array.length; a++) {
        var carousel_parent_array = parent_array[a].getElementsByClassName('carousel_parent');

        for (var b = 0; b < carousel_parent_array.length; b++) {
            var carousel_outer = carousel_parent_array[b].getElementsByClassName('carousel_outer')[0];
            var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];

            if (element_exists(carousel_inner)) {
                var carousel_item_array = carousel_inner.getElementsByClassName('carousel_item');

                for (var c = 0; c < carousel_item_array.length; c++) {
                    carousel_item_array[c].classList.remove('active');

                }

                carousel_item_array[0].classList.add('active');
                carousel_inner.style.transform = 'translateX(0)';
                do_stopAllVideos_inCarousel(carousel_inner);
            }
        }

    }
}
function set_switchContent_text_width_carousel_height() {
    try {
        var parent_array = document.getElementsByClassName('switchContent_parent text_with_carousel');

        for (var a = 0; a < parent_array.length; a++) {
            var target_container = parent_array[a].getElementsByClassName('switchContent_container')[0];
            var target_item_array = target_container.getElementsByClassName('switchContent_text_width_carousel_item');
            var switchs_container = parent_array[a].getElementsByClassName('switchContent_switchContainer_outer')[0];
            var target_container_height = switchs_container.clientHeight;

            if (windowWidthIsLessThanBreakPointIndex(2)) {
                var switchs_container_mobile_margin = 50;

                target_container_height += switchs_container_mobile_margin;
            }

            for (var b = 0; b < target_item_array.length; b++) {
                if (target_item_array[b].classList.contains('active')) {
                    var item_height = target_item_array[b].clientHeight;

                    target_container_height += item_height
                }
            }

            target_container_height = Math.ceil(target_container_height);
            target_container.style.height = target_container_height + 'px';

        }
    } catch (err) {

    }
}
function do_switchContent_text_with_carousel_touchStart() {
    if (GLOBAL_switchContent_textWithCarousel_carouselIsAnimating) {
        return;

    } else {
        set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(true);

        var elmt = event.currentTarget;
        var carousel_inner = elmt.getElementsByClassName('carousel_inner')[0];

        GLOBAL_switchContent_textWithCarousel_touchStart_position = Math.floor(event.touches[0].clientX);
        carousel_inner.addEventListener('touchend', do_switchContent_text_with_carousel_touchEnd_snapToClosest);
        carousel_inner.addEventListener('touchcancel', do_switchContent_text_with_carousel_touchEnd_snapToClosest);

        setTimeout(function() {
            carousel_inner.addEventListener('touchend', do_switchContent_text_with_carousel_touchEnd_snapToClosest);
            carousel_inner.addEventListener('touchcancel', do_switchContent_text_with_carousel_touchEnd_snapToClosest);

            var event = new Event('touchend'); 

            carousel_inner.dispatchEvent(event);

        }, 100);
    }    
}
function do_switchContent_text_with_carousel_touchEnd_snapToClosest() {
    try {
        var elmt = event.currentTarget;

        if (event.changedTouches[0]) {
            var touchEnd_position = Math.ceil(event.changedTouches[0].clientX);

            if (touchEnd_position > GLOBAL_switchContent_textWithCarousel_touchStart_position) {
                do_switchContent_text_with_carousel_carousel_shift_leftRight(elmt, 'left');

            }
            
            if (touchEnd_position < GLOBAL_switchContent_textWithCarousel_touchStart_position) {
                do_switchContent_text_with_carousel_carousel_shift_leftRight(elmt, 'right');

            }
        }

        elmt.removeEventListener('touchend', do_switchContent_text_with_carousel_touchEnd_snapToClosest);
        elmt.removeEventListener('touchcancel', do_switchContent_text_with_carousel_touchEnd_snapToClosest);

        set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
    } catch (err) {

    }
}
function do_switchContent_text_with_carousel_mouseOverScroll() {
    try {
        set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(true);

        var elmt = event.currentTarget;
        var carousel_parent = elmt.parentElement;
        var carousel_outer = carousel_parent.getElementsByClassName('carousel_outer')[0];
        var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];
        var scroll_interval = setInterval(function () { 
            carousel_inner.style.transition = 'all 1000ms linear';
            do_switchContent_text_with_carousel_carousel_shift_leftRight(carousel_inner, 'right'); 

        }, 1000);
        var stop_interval_function = function stop_interval_function() {
            clearInterval(scroll_interval);
            carousel_inner.style.transition = '';
            set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
            elmt.removeEventListener('mouseout', stop_interval_function);

        }

        elmt.addEventListener('mouseout', stop_interval_function);

    } catch (err) {
        console.log(err);
    }
}
function do_carouselItem_playPause_SiblingVideo() {
    try {
        var elmt = event.currentTarget;
        var parent_container = elmt.parentElement;
        var video = parent_container.getElementsByTagName('VIDEO')[0];
        var playPause = elmt.getAttribute('playPause');

        if (playPause == 'play') {
            elmt.style.opacity = 0;
            video.play();
            elmt.setAttribute('playPause', 'pause');

        } else if (playPause == 'pause') {
            elmt.style.opacity = 1;
            video.pause();
            elmt.setAttribute('playPause', 'play');

        } else {
            return;
        }
    } catch (err) {
        console.log(err);
    }
}
function do_stopAllVideos_inCarousel(carosuel_element) {
    var video_container_array = carosuel_element.getElementsByClassName('carousel_item video');

    for (var a = 0; a < video_container_array.length; a++) {
        var overlay = video_container_array[a].getElementsByClassName('overlay_playButton')[0];
        var video = video_container_array[a].getElementsByTagName('VIDEO')[0];

        video.pause();
        overlay.style.opacity = 1;
        overlay.setAttribute('playPause', 'play');
    }
}

//AM_PB
var GLOBAL_shareClick = 0;
function sharerSwap() {
    var scrollTop = (document.documentElement || document.body.parentNode || document.body).scrollTop;
    if (scrollTop > (document.getElementById("landingPage_sharerLearner").offsetTop - (0.5 * window.innerHeight)) && GLOBAL_shareClick == 0) {
        document.getElementsByClassName("switchContent_switchs")[0].children[1].click();
        GLOBAL_shareClick = 1;
    }
}

function videoSwap() {
    var videoContainer = document.getElementById("promoVidPlayer");
    if (window.innerWidth <= 1080) {
        videoContainer.poster = 'https://pigeon.me/wp-content/uploads/2022/05/PGN_Launch_video_screen-save-mobile.jpg';
        videoContainer.src = 'https://pigeon.me/wp-content/uploads/2022/05/pigeon-mobile-video.mp4';
    }
}

// Scroll Content Module Functions
var GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating = false;
var GLOBAL_scrollContent_textWithPhoneImages_touchStart_position = 0;

function set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(trueFalse) {
    GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating = trueFalse;
}
function do_scrollContent_text_with_phoneImages_changeOpacityOfPhoneImagesOnScroll() {
    try {
        if (windowWidthIsLessThanBreakPointIndex(3)) {
            return;

        } else {
            var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

            for (var a = 0; a < parent_array.length; a++) {
                var textContent_container = parent_array[a].getElementsByClassName('scrollContent_text_with_phoneImage_container')[0];
                var textContent_child_array = textContent_container.getElementsByClassName('scrollContent_content_item');
                var textContent_child_height_array = [];
                var breakPoint_array = get_scrollContent_text_with_phoneImages_contentBreakPoints()[a];
                var phoneContent_container = parent_array[a].getElementsByClassName('scrollContent_phoneImages_container')[0];
                var phoneContent_child_array = phoneContent_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');
                var window_scrollY = window.scrollY;

                for (var b = 0; b < phoneContent_child_array.length; b++) {
                    phoneContent_child_array[b].classList.remove('active');
                }

                for (var b = 0; b < textContent_child_array.length; b++) {
                    var textContent_child_height = textContent_child_array[b].clientHeight;
                    var tranasition_start = breakPoint_array[b];
                    var transition_end = tranasition_start;

                    textContent_child_height_array.push(textContent_child_height);
                    transition_end += textContent_child_height_array[b] / 2;

                    if (b > 0) { tranasition_start -= textContent_child_height_array[b - 1] / 2; }

                    if (window_scrollY <  breakPoint_array[0]) {
                        phoneContent_active_index = 0;
                        break;

                    } else if (window_scrollY >= tranasition_start && window_scrollY <= transition_end) {
                        phoneContent_active_index = b;

                    }
                }

                phoneContent_child_array[phoneContent_active_index].classList.add('active');
            }
        }

    } catch (err) {
        console.log(err);
    }
}
function get_scrollContent_text_with_phoneImages_contentBreakPoints() {
    var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');
    var breakPoint_array = [];

        for (var a = 0; a < parent_array.length; a++) {
            var textContent_container = parent_array[a].getElementsByClassName('scrollContent_text_with_phoneImage_container')[0];
            var textContent_child_array = textContent_container.getElementsByClassName('scrollContent_content_item');
            var window_scrollY = window.scrollY;
            var window_clientTop = document.documentElement.clientTop;
            var breakPoint_child_array = [];

            for (var b = 0; b < textContent_child_array.length; b++) {
                var textContent_child_top_value = textContent_child_array[b].getBoundingClientRect().top;
                var textContent_child_breakPoint = textContent_child_top_value + window_scrollY - window_clientTop;

                breakPoint_child_array.push(Math.ceil(textContent_child_breakPoint));
            }

            breakPoint_array.push(breakPoint_child_array);
        }
    return breakPoint_array;
}
function do_scrollContent_text_with_phoneImages_goToSection(elmt) {
    var scrollContent_text_with_phoneImages_parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');
    var elmt_parent_container = elmt.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;

    for (var a = 0; a < scrollContent_text_with_phoneImages_parent_array.length; a++) {
        if (scrollContent_text_with_phoneImages_parent_array[a] == elmt_parent_container) {
            if (windowWidthIsLessThanBreakPointIndex(3)) {
                do_scrollContent_text_with_phoneImages_goToSection_mobile(elmt);

            } else {
                do_scrollContent_text_with_phoneImages_goToSection_desktop(elmt, a);

            }
        } else {
            //do nothing
        }
    }
}
function do_scrollContent_text_with_phoneImages_goToSection_desktop(elmt, parent_index) {
    var elmt_parent = elmt.parentElement;
    var sibling_array = elmt_parent.getElementsByTagName('SPAN');
    var elmt_parent_container = elmt.parentElement.parentElement.parentElement.parentElement.parentElement;
    var breakPoint_array = get_scrollContent_text_with_phoneImages_contentBreakPoints()[parent_index];
    var phoneContent_container = elmt_parent_container.getElementsByClassName('scrollContent_phoneImages_container')[0];
    var phoneContent_child_array = phoneContent_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');

    for (var a = 0; a < phoneContent_child_array.length; a++) {
        phoneContent_child_array[a].classList.remove('active');
    }

    for (var a = 0; a < sibling_array.length; a++) {
        if (elmt == sibling_array[a]) {
            var goTo_index = a;
        }
    }  

    window.scroll({
        top:  breakPoint_array[goTo_index] - 130,
        left: 0,
        behavior: 'smooth'
    });
    phoneContent_child_array[goTo_index].classList.add('active');
}
function do_scrollContent_text_with_phoneImages_goToSection_mobile(elmt) {
    if (GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating) {
        return;

    } else {
        set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(true);

        var window_width = get_windowWidth();
        var elmt_parent = elmt.parentElement;
        var sibling_array = elmt_parent.getElementsByTagName('SPAN');
        var parent_container = elmt.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
        var textContent_container = parent_container.getElementsByClassName('carousel_inner')[0];
        var textContent_container_width = textContent_container.clientWidth;
        var textContent_array = textContent_container.getElementsByClassName('carousel_item');
        var textContent_width = textContent_array[0].clientWidth;
        var textContent_margin = Math.ceil(window_width * 0.1);
        var phoneContent_container = parent_container.getElementsByClassName('scrollContent_phoneImages_container')[0];
        var phoneContent_child_array = phoneContent_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');
        var active_item_index = get_activeCarouselItem(textContent_container);
        var active_item = textContent_array[active_item_index];
        var transform_value_max = 0;
        var transform_value_min = (-1) * (textContent_container_width - textContent_width);
        var translateX_int_initial = get_translateX_valueOfElement(textContent_container);
        var leftRight = false;

        for (var a = 0; a < phoneContent_child_array.length; a++) {
            phoneContent_child_array[a].classList.remove('active');
        }

        for (var a = 0; a < sibling_array.length; a++) {
            if (elmt == sibling_array[a]) {
                var goTo_index = a;
            }
        }

        phoneContent_child_array[goTo_index].classList.add('active');

        if (goTo_index < active_item_index) {
            leftRight = 'left';

        } else if (goTo_index > active_item_index) {
            leftRight = 'right';

        }

        if (leftRight == 'left'  || leftRight == 'right') {
            if (leftRight == 'left') {
                if (active_item_index == 0) {
                    console.log('active item is first item in carousel');
                    set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                    return;

                } else {
                    var active_item = textContent_array[active_item_index];

                    active_item.classList.remove('active');
                    textContent_array[active_item_index - 1].classList.add('active');
                    active_item_index = get_activeCarouselItem(textContent_container);
                    active_item = textContent_array[active_item_index];

                    var active_item_width = active_item.clientWidth + textContent_margin;
                    var translateX_int_new = translateX_int_initial + active_item_width;
                }
            }

            if (leftRight == 'right') {
                if (active_item_index == (textContent_array.length - 1)) {
                    console.log('active item is final item in carousel');
                    set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                    return;

                } else {     
                    var active_item = textContent_array[active_item_index];
                    var active_item_width = active_item.clientWidth  + textContent_margin;
                    var translateX_int_new = translateX_int_initial - active_item_width;

                    active_item.classList.remove('active');
                    textContent_array[active_item_index + 1].classList.add('active');
                }
            }

            if (translateX_int_new > transform_value_max) {
                translateX_int_new = transform_value_max;

            } else if (translateX_int_new <= transform_value_min) {
                translateX_int_new  = transform_value_min;

            } else {
                translateX_int_new = Math.floor(translateX_int_new);

            }

            textContent_container.style.transform = 'translateX(' + translateX_int_new + 'px)';

        } else {

        }

        set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(false);
        return;
    }
}
function do_scrollContent_text_with_phoneImages_touchStart() {
    if (GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating) {
        return;

    } else {
        set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(true);

        var elmt = event.currentTarget;
        var carousel_inner = elmt.getElementsByClassName('carousel_inner')[0];

        GLOBAL_scrollContent_textWithPhoneImages_touchStart_position = Math.floor(event.touches[0].clientX);
        carousel_inner.addEventListener('touchend', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);
        carousel_inner.addEventListener('touchcancel', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);

        setTimeout(function() {
            carousel_inner.addEventListener('touchend', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);
            carousel_inner.addEventListener('touchcancel', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);

            var event = new Event('touchend'); 

            carousel_inner.dispatchEvent(event);

        }, 100);
    }   
}
function do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest() {
    try {
        var elmt = event.currentTarget;

        if (event.changedTouches[0]) {
            var touchEnd_position = Math.ceil(event.changedTouches[0].clientX);

            if (touchEnd_position > GLOBAL_scrollContent_textWithPhoneImages_touchStart_position) {
                do_scrollContent_text_with_phoneImages_carousel_shift_leftRight(elmt, 'left');

            }
            
            if (touchEnd_position < GLOBAL_scrollContent_textWithPhoneImages_touchStart_position) {
                do_scrollContent_text_with_phoneImages_carousel_shift_leftRight(elmt, 'right');

            }
        }

        elmt.removeEventListener('touchend', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);
        elmt.removeEventListener('touchcancel', do_scrollContent_text_with_phoneImages_touchEnd_snapToClosest);

        set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(false);
    } catch (err) {

    }
}
function do_scrollContent_text_with_phoneImages_carousel_shift_leftRight(elmt, leftRight) {
    set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(true);

    var window_width = get_windowWidth();
    var parent_container = elmt.parentElement.parentElement.parentElement;
    var textContent_container = elmt;
    var textContent_container_width = textContent_container.clientWidth;
    var textContent_array = textContent_container.getElementsByClassName('carousel_item');
    var textContent_width = textContent_array[0].clientWidth;
    var textContent_margin = Math.ceil(window_width * 0.1);
    var phoneContent_container = parent_container.getElementsByClassName('scrollContent_phoneImages_container')[0];
    var phoneContent_child_array = phoneContent_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');
    var active_item_index = get_activeCarouselItem(textContent_container);
    var active_item = textContent_array[active_item_index];
    var transform_value_max = 0;
    var transform_value_min = (-1) * (textContent_container_width - textContent_width);
    var translateX_int_initial = get_translateX_valueOfElement(textContent_container);

    for (var a = 0; a < phoneContent_child_array.length; a++) {
        phoneContent_child_array[a].classList.remove('active');
    }

    if (leftRight == 'left'  || leftRight == 'right') {
        if (leftRight == 'left') {
            if (active_item_index == 0) {
                phoneContent_child_array[active_item_index].classList.add('active');
                
                console.log('active item is first item in carousel');
                set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                return;

            } else {
                var active_item = textContent_array[active_item_index];

                active_item.classList.remove('active');
                textContent_array[active_item_index - 1].classList.add('active');
                phoneContent_child_array[active_item_index - 1].classList.add('active');
                active_item_index = get_activeCarouselItem(textContent_container);
                active_item = textContent_array[active_item_index];

                var active_item_width = active_item.clientWidth + textContent_margin;
                var translateX_int_new = translateX_int_initial + active_item_width;
            }
        }

        if (leftRight == 'right') {
            if (active_item_index == (textContent_array.length - 1)) {
                console.log('active item is final item in carousel');
                set_GLOBAL_switchContent_textWithCarousel_carouselIsAnimating(false);
                return;

            } else {     
                var active_item = textContent_array[active_item_index];
                var active_item_width = active_item.clientWidth  + textContent_margin;
                var translateX_int_new = translateX_int_initial - active_item_width;

                active_item.classList.remove('active');
                textContent_array[active_item_index + 1].classList.add('active');
                phoneContent_child_array[active_item_index + 1].classList.add('active');
            }
        }

        if (translateX_int_new > transform_value_max) {
            translateX_int_new = transform_value_max;

        } else if (translateX_int_new <= transform_value_min) {
            translateX_int_new  = transform_value_min;

        } else {
            translateX_int_new = Math.floor(translateX_int_new);

        }

        textContent_container.style.transform = 'translateX(' + translateX_int_new + 'px)';

    } else {

    }

    set_GLOBAL_scrollContent_textWithPhoneImages_carouselIsAnimating(false);
    return;
}
function set_scrollContent_text_with_phoneImages_textContentWidth() {
    try {
        if (windowWidthIsLessThanBreakPointIndex(3)) {
            var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

            for (var a = 0; a < parent_array.length; a++) {
                var carousel_outer = parent_array[a].getElementsByClassName('carousel_outer')[0];
                var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];
                var carousel_item_array = carousel_inner.getElementsByClassName('carousel_item');
                var window_width = get_windowWidth();
                var carousel_inner_width = 0;

                for (var b = 0; b < carousel_item_array.length; b++) {
                    var carousel_item_width = carousel_item_array[b].clientWidth;
                    var carousel_item_margin = window_width - carousel_item_width;

                    carousel_inner_width += carousel_item_width + carousel_item_margin + 1;
                }

                carousel_inner.style.width = Math.ceil(carousel_inner_width) + 'px';

            }

        } else {
            var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

            for (var a = 0; a < parent_array.length; a++) {
                var carousel_outer = parent_array[a].getElementsByClassName('carousel_outer')[0];
                var carousel_inner = carousel_outer.getElementsByClassName('carousel_inner')[0];

            }

            carousel_inner.style.width = '';
        }
    } catch (err) {

    }
}
function do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo() {
    if (windowWidthIsLessThanBreakPointIndex(3)) {
        do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo_mobile();
    } else {
        do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo_desktop();
    }
}
function do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo_desktop() {
    var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

    for (var a = 0; a < parent_array.length; a++) {
        var parent_height = parent_array[a].clientHeight;
        var window_height = window.innerHeight;
        var phoneImage_container = parent_array[a].getElementsByClassName('scrollContent_phoneImages_container')[0];
        var phoneImage_outer = phoneImage_container.getElementsByClassName('scrollContent_phoneImage_outer_desktop')[0];
        var phoneImage_inner_array = phoneImage_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');
        var video_container = phoneImage_container.getElementsByClassName('scrollContent_video_container')[0];
        var window_scrollY = window.scrollY;
        var window_scrollY_with_height = window_scrollY + window_height;
        var window_clientTop = document.documentElement.clientTop;
        var parnet_top_value = parent_array[a].getBoundingClientRect().top;
        var triggerPoint_start = Math.ceil(parnet_top_value + window_scrollY - window_clientTop + parent_height - (window_height / 2)); // half window height due to desired trigger point
        var phoneImage_outer_opacity = '';
        var phoneImage_outer_transform = '';
        var phoneImage_container_width = '';
        var phoneImage_container_left = '';
        var phoneImage_inner_opacity = '';
        var video_container_opacity = '';

        if (window_scrollY_with_height >= triggerPoint_start) {
            var phoneImage_outer_opacity = 0;
            var phoneImage_outer_transform = 'scale(8) translateX(1%)';
            var phoneImage_container_width = '100%';
            var phoneImage_container_left = 0;
            var phoneImage_inner_opacity = 0;
            var video_container_opacity = 1;
            
        }
        
        phoneImage_outer.style.opacity = phoneImage_outer_opacity;
        phoneImage_outer.style.transform = phoneImage_outer_transform;
        phoneImage_container.style.width = phoneImage_container_width;
        phoneImage_container.style.left = phoneImage_container_left;

        for (var b = 0; b < phoneImage_inner_array.length; b++) {
            phoneImage_inner_array[b].style.opacity = phoneImage_inner_opacity;

        }

        video_container.style.opacity = video_container_opacity;
    }
}
function do_scrollContent_text_with_phoneImages_zoomImageAndShowVideo_mobile() {
    var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

    for (var a = 0; a < parent_array.length; a++) {
        var parent_height = parent_array[a].clientHeight;
        var window_height = window.innerHeight;
        var phoneImage_container = parent_array[a].getElementsByClassName('scrollContent_phoneImages_container')[0];
        var phoneImage_outer = phoneImage_container.getElementsByClassName('scrollContent_phoneImage_outer_desktop')[0];
        var phoneImage_inner_array = phoneImage_container.getElementsByClassName('scrollContent_phoneImages_item_desktop');
        var video_container = phoneImage_container.getElementsByClassName('scrollContent_video_container')[0];
        var window_scrollY = window.scrollY;
        var window_scrollY_with_height = window_scrollY + window_height;
        var window_clientTop = document.documentElement.clientTop;
        var parnet_top_value = parent_array[a].getBoundingClientRect().top;
        var triggerPoint_start = Math.ceil(parnet_top_value + window_scrollY - window_clientTop + (parent_height)); // half window height due to desired trigger point
        var phoneImage_outer_opacity = '';
        var phoneImage_outer_scale = '';
        var phoneImage_inner_opacity = '';
        var video_container_opacity = '';

        if (window_scrollY_with_height >= triggerPoint_start) {
            phoneImage_outer_opacity = 0;
            phoneImage_outer_scale = 'scale(10)';
            phoneImage_inner_opacity = 0;
            video_container_opacity = 1;
            
        }
        
        phoneImage_outer.style.opacity = phoneImage_outer_opacity;
        phoneImage_outer.style.transform = phoneImage_outer_scale;

        for (var b = 0; b < phoneImage_inner_array.length; b++) {
            phoneImage_inner_array[b].style.opacity = phoneImage_inner_opacity;
            phoneImage_inner_array[b].classList.remove('has_zoom_delay');

            if (GLOBAL_scrollIsUp) {
                phoneImage_inner_array[b].classList.add('has_zoom_delay');

            }

        }

        video_container.style.opacity = video_container_opacity;
    }
}
function do_scrollContent_text_with_phoneImages_textContent_opacityChange() {
    var parent_array = document.getElementsByClassName('scrollContent_parent text_with_phoneImage');

    for (var a = 0; a < parent_array.length; a++) {
        var textContent_container = parent_array[a].getElementsByClassName('scrollContent_text_with_phoneImage_container')[0];
        var textContent_child_array = textContent_container.getElementsByClassName('scrollContent_content_item');
        var textContent_breakPoints = get_scrollContent_text_with_phoneImages_contentBreakPoints()[a];
        var window_scrollY = window.scrollY;


        for (var b = 0; b < textContent_child_array.length; b++) {

            if (windowWidthIsLessThanBreakPointIndex(3)) {
                var textContent_opacity = '';
            } else {
                var triggerBuffer = textContent_child_array[b].clientHeight / 2;
                var trigger_point = textContent_breakPoints[b] - 130;
                var trigger_start_a = trigger_point - triggerBuffer;
                var trigger_start_b = trigger_point;
                var trigger_end_b = trigger_point + (triggerBuffer / 2);
                var trigger_end_a = trigger_point + triggerBuffer;
                var textContent_opacity = 0;

                if (window_scrollY > trigger_start_a && window_scrollY < trigger_start_b) { 
                    textContent_opacity = ((window_scrollY - trigger_start_a) / triggerBuffer);

                } else if (window_scrollY >= trigger_start_b && window_scrollY < trigger_end_b) {
                    textContent_opacity = 1;

                } else if (window_scrollY >= trigger_end_b && window_scrollY < trigger_end_a) {
                    textContent_opacity = ((trigger_end_a - window_scrollY) / triggerBuffer);

                }
                if (textContent_opacity <= 0) {
                    textContent_opacity = 0;

                } else if (textContent_opacity >= 1) {
                    textContent_opacity = 1;

                } else {
                    textContent_opacity = textContent_opacity.toFixed(2);
                }
            }

            textContent_child_array[b].style.opacity = textContent_opacity;
        }

    }
}