"use strict";

window.addEventListener("scroll", do_onScrollEvents);
window.addEventListener("load", do_onLoadEvents);
window.addEventListener("resize", do_onResizeEvents); //Event functions

function do_onScrollEvents() {
  hideShow_floatingCta();
}

function do_onLoadEvents() {
  set_sharerLearnerSwitchBackground();
  set_carousel_width();
  set_sharerLearnerContentHeight();
}

function do_onResizeEvents() {
  set_sharerLearnerSwitchBackground();
  set_carousel_width();
  set_sharerLearnerContentHeight(); //do_readMore_reset();
} //navigation functions


function get_sectionTopValue() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (elmt) {
    var window_scrollY = window.scrollY;
    var window_clientTop = document.documentElement.clientTop;
    var scroll_buffer = 0;
    var elmt_top_value = elmt.getBoundingClientRect().top;
    var elmt_breakPoint = Math.floor(elmt_top_value + window_scrollY - window_clientTop - scroll_buffer);
    return elmt_breakPoint;
  } else {
    return 0;
  }
}

function goto_section() {
  var sectionID = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  event.preventDefault();
  var Section = document.getElementById(sectionID);

  if (Section) {
    do_closeMobileMenu();
    var section_breakPoint = get_sectionTopValue(Section);
    window.scroll({
      top: section_breakPoint,
      left: 0,
      behavior: "smooth"
    });

    if (sectionID == "learnerSharer") {
      var sharerLearnerAttribute = event.currentTarget.getAttribute("learnerSharer");
      var switchContainer = Section.getElementsByClassName("lsSection_switchContainer")[0];
      var switch_array = switchContainer.getElementsByTagName("P");

      if (sharerLearnerAttribute == "sharer") {
        switch_array[0].click();
      } else if (sharerLearnerAttribute == "learner") {
        switch_array[1].click();
      }
    }
  }
} //floating cta functions


function hideShow_floatingCta() {
  var floatingCta_parent = document.getElementById("headerScrollCta");

  if (floatingCta_parent) {
    var triggerContainer = document.getElementsByClassName("uspSection")[0];
    var triggerPoint = 100; //px

    if (triggerContainer) {
      triggerPoint = get_sectionTopValue(triggerContainer);
    }

    var windowScrollAmount = window.scrollY;

    if (windowScrollAmount >= triggerPoint) {
      floatingCta_parent.classList.add("active");
    } else {
      floatingCta_parent.classList.remove("active");
    }
  }
} //Video functions


function do_playPauseVideo() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var parent_element = elmt.parentElement.parentElement;

  if (parent_element) {
    var video_element = parent_element.getElementsByClassName("video")[0];

    if (video_element) {
      var parent_playPause_value = parent_element.getAttribute("playPause");

      if (parent_playPause_value == "play") {
        parent_element.classList.add("active");
        parent_element.setAttribute("playPause", "pause");
        video_element.play();
      } else if (parent_playPause_value == "pause") {
        parent_element.classList.remove("active");
        parent_element.setAttribute("playPause", "play");
        video_element.pause();
      }
    }
  } else {
    console.log("error. Function do_playPauseVideo : No parent element found.");
  }
} //sharerLearner functions


function set_sharerLearnerSwitchBackground() {
  var switchBackground_array = document.getElementsByClassName("lsSection_switchBackground");

  for (var a = 0; a < switchBackground_array.length; a++) {
    var switchParent = switchBackground_array[a].parentElement;

    if (switchParent.classList.contains("lsSection_switchContainer")) {
      var switch_array = switchParent.getElementsByTagName("P");

      for (var b = 0; b < switch_array.length; b++) {
        if (switch_array[b].classList.contains("active")) {
          var switchIndex = b;
        }
      }

      if (switchIndex || switchIndex === 0) {
        var activeSwitchWidth = Math.ceil(switch_array[switchIndex].clientWidth); //px

        var switchBackground_translateX = 0;
        var switchBackground_color = "#3B8DCA";

        if (switchIndex == 1) {
          switchBackground_translateX = Math.ceil(switch_array[0].clientWidth); //px

          switchBackground_color = "#FF7273";
        }

        switchBackground_array[a].style.width = activeSwitchWidth + "px";
        switchBackground_array[a].style.transform = "translateX(" + switchBackground_translateX + "px)";
        switchBackground_array[a].style.backgroundColor = switchBackground_color;
      }
    }
  }
}

function set_sharerLearnerContentHeight() {
  var conetntContainer_array = document.getElementsByClassName("lsSection_inner");

  for (var a = 0; a < conetntContainer_array.length; a++) {
    var content_array = conetntContainer_array[a].getElementsByClassName("lsCarouselItem");

    for (var b = 0; b < content_array.length; b++) {
      if (content_array[b].classList.contains("active")) {
        var activeContentIndex = b;
      }
    }

    if (activeContentIndex || activeContentIndex === 0) {
      var activeContentHeight = Math.ceil(content_array[activeContentIndex].clientHeight + 100); //px

      conetntContainer_array[a].style.height = activeContentHeight + "px";
    }
  }
}

function switch_sharerLearnerContent() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (elmt) {
    var elmtGrandParent = elmt.parentElement.parentElement.parentElement.parentElement.parentElement;

    if (elmtGrandParent.classList.contains("lsSection") && !elmt.classList.contains("active")) {
      var switch_array = elmt.parentElement.getElementsByTagName("P");
      var content_array = elmtGrandParent.getElementsByClassName("lsCarouselItem");

      for (var a = 0; a < switch_array.length; a++) {
        switch_array[a].classList.remove("active");

        if (switch_array[a] == elmt) {
          var switchIndex = a;
        }
      }

      for (var a = 0; a < content_array.length; a++) {
        content_array[a].classList.remove("active");
      }

      if (switchIndex || switchIndex === 0) {
        switch_array[switchIndex].classList.add("active");
        content_array[switchIndex].classList.add("active");
        set_sharerLearnerSwitchBackground();
        set_sharerLearnerContentHeight();
      }
    }
  } else {
    console.log("error. Function switch_sharerLearnerContent : No parent element found.");
  }
} //carousel functions


var carouselTouchX = 0;

function set_carousel_width() {
  var carouselParent_array = document.getElementsByClassName("carouselParent");

  for (var a = 0; a < carouselParent_array.length; a++) {
    var carouselInner = carouselParent_array[a].getElementsByClassName("carouselInner")[0];

    if (carouselInner) {
      var carouselInner_width = 0; //px

      var carouselItem_array = carouselInner.getElementsByClassName("carouselItem");

      for (var b = 0; b < carouselItem_array.length; b++) {
        var carouselItem_width = carouselItem_array[b].clientWidth;
        carouselInner_width += carouselItem_width;
      }

      carouselInner.style.width = Math.ceil(carouselInner_width) + "px";
    }
  }
}

function get_carousel_activeItemIndex() {
  var carouselParent = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var activeItemIndex = -1;

  if (carouselParent) {
    var carouselItem_array = carouselParent.getElementsByClassName("carouselItem");

    for (var a = 0; a < carouselItem_array.length; a++) {
      if (carouselItem_array[a].classList.contains("active")) {
        activeItemIndex = a;
      }
    }
  }

  return activeItemIndex;
}

function set_carouselActiveItem() {
  var carouselParent = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var activeItemIndex = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : -1;

  if (carouselParent && activeItemIndex > -1) {
    var carouselItem_array = carouselParent.getElementsByClassName("carouselItem");

    for (var a = 0; a < carouselItem_array.length; a++) {
      carouselItem_array[a].classList.remove("active");
    }

    carouselItem_array[activeItemIndex].classList.add("active");
  }
}

function shift_carouselLeft() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (elmt) {
    var carouselParent = elmt.parentElement.parentElement;

    if (carouselParent.classList.contains("carouselParent")) {
      var carouselInner = carouselParent.getElementsByClassName("carouselInner")[0];
      var activeItemIndex = get_carousel_activeItemIndex(carouselParent);

      if (carouselInner && activeItemIndex > 0) {
        var carouselInner_translateXValue = parseInt(carouselInner.getAttribute("translateXValue"));
        var carouselItem_array = carouselInner.getElementsByClassName("carouselItem");
        var carouselItem_width = carouselItem_array[activeItemIndex - 1].clientWidth;
        var carouselInner_translateXValue_new = carouselInner_translateXValue + Math.ceil(carouselItem_width);
        activeItemIndex--;

        if (carouselInner_translateXValue_new > 0) {
          carouselInner_translateXValue_new = 0;
        }

        if (activeItemIndex < 0) {
          activeItemIndex = 0;
        }

        carouselInner.style.transform = "translateX(" + carouselInner_translateXValue_new + "px)";
        carouselInner.setAttribute("translateXValue", carouselInner_translateXValue_new);
        set_carouselActiveItem(carouselParent, activeItemIndex);
        updatecarouselDots(carouselParent, activeItemIndex);
      }
    }
  }
}

function shift_carouselRight() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (elmt) {
    var carouselParent = elmt.parentElement.parentElement;

    if (carouselParent.classList.contains("carouselParent")) {
      var carouselInner = carouselParent.getElementsByClassName("carouselInner")[0];
      var activeItemIndex = get_carousel_activeItemIndex(carouselParent);

      if (carouselInner) {
        var carouselItem_array = carouselInner.getElementsByClassName("carouselItem");

        if (activeItemIndex > -1 && activeItemIndex <= carouselItem_array.length) {
          var carouselInner_translateXValue = parseInt(carouselInner.getAttribute("translateXValue"));
          var carouselInner_translateXValue_max = -1 * Math.ceil(carouselInner.clientWidth - carouselItem_array[carouselItem_array.length - 1].clientWidth);
          var carouselItem_width = carouselItem_array[activeItemIndex].clientWidth;
          var carouselInner_translateXValue_new = carouselInner_translateXValue - Math.ceil(carouselItem_width);
          console.log(carouselInner.getAttribute("translateXValue"), carouselItem_width);
          activeItemIndex++;

          if (carouselInner_translateXValue_new < carouselInner_translateXValue_max) {
            carouselInner_translateXValue_new = carouselInner_translateXValue_max;
          }

          if (activeItemIndex >= carouselItem_array.length - 1) {
            activeItemIndex = carouselItem_array.length - 1;
          }

          carouselInner.style.transform = "translateX(" + carouselInner_translateXValue_new + "px)";
          carouselInner.setAttribute("translateXValue", carouselInner_translateXValue_new);
          set_carouselActiveItem(carouselParent, activeItemIndex);
          updatecarouselDots(carouselParent, activeItemIndex);
        }
      }
    }
  }
}

function updatecarouselDots(parent, index) {
  if (parent && (index || index > 0)) {
    var dotArray = parent.getElementsByClassName("dot");
    var buttonArray = parent.getElementsByClassName("carouselButton");

    for (var a = 0; a < dotArray.length; a++) {
      dotArray[a].classList.remove("active");
    }

    if (dotArray[index]) {
      dotArray[index].classList.add("active");
    }

    if (index === 0) {
      buttonArray[0].classList.add("hidden");
    } else {
      buttonArray[0].classList.remove("hidden");
    }
  }
}

function update_carouselTouchX() {
  var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var eventTouchX = Math.ceil(event.touches[0].clientX);
  carouselTouchX = eventTouchX;
}

function shiftCarouselByTouch() {
  var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var eventTouchX = Math.ceil(event.changedTouches[0].clientX);
  var carouselParent = event.currentTarget.parentElement;

  if (carouselParent.classList.contains("carouselParent")) {
    var carouselButtons = carouselParent.getElementsByClassName("carouselButton");
    console.log(carouselButtons, eventTouchX >= carouselTouchX);

    if (eventTouchX >= carouselTouchX) {
      //shift_carouselLeft(carouselButtons[0]);
      carouselButtons[0].click();
      console.log("left");
    } else {
      //shift_carouselRight(carouselButtons[1]);
      carouselButtons[1].click();
      console.log("right");
    }
  }
} //form functions


function set_inputValidationFunction() {
  try {
    var target_input_array = document.getElementsByClassName("validate_input");

    for (var a = 0; a < target_input_array.length; a++) {
      target_input_array[a].addEventListener("blur", do_inputValidation_onBlur_Function);
    }
  } catch (err) {
    console.log(err);
  }
}

function do_inputValidation_onBlur_Function() {
  try {
    var input = event.target;
    var input_type = input.getAttribute("type");

    if (input_type == "text") {
      validate_text_input_element(input);
    } else if (input_type == "email") {
      validate_email_input_element(input);
    } else if (input_type == "tel") {
      validate_phoneNumber_input_element(input);
    } else if (input_type == "textarea") {
      validate_textarea_input_element(input);
    } else {
      console.log("do_inputValidationFunction cannot find the input type");
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
    var option_array = elmt.getElementsByTagName("OPTION");
    var option_value_array = [];
    var accepted_option = false;
    var validation_failed = true;

    for (var a = 0; a < option_array.length; a++) {
      var option_value = option_array[a].getAttribute("value");
      option_value_array.push(option_value);
    }

    for (var b = 0; b < option_value_array.length; b++) {
      if (option_value_array[b] == "" || option_value_array[b] == null) {//do nothing
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
    var error_span_array = input_parent.getElementsByClassName("validation_error_message");
    elmt.classList.remove("validation_error");
    elmt.classList.add("validation_success");

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
    var error_span_array = input_parent.getElementsByClassName("validation_error_message");
    elmt.classList.remove("validation_success");
    elmt.classList.add("validation_error");

    for (var a = 0; a < error_span_array.length; a++) {
      error_span[a].style.height = 0;
      setTimeout(function () {
        error_span_array[a].remove();
      }, 300);
    }

    var input_error_filed = input.getAttribute("placeholder");
    var error_span = document.createElement("SPAN");
    var error_span_innerText = "Please enter a valid " + input_error_filed;
    error_span.classList.add("validation_error_message");
    error_span.classList.add("fnt_small");
    error_span.classList.add("clr_red");
    error_span.innerText = error_span_innerText;
    error_span.style.height = 0;
    input_parent.appendChild(error_span);
    error_span.style.height = "50px";
  } catch (err) {
    console.log(err);
  }
}

function validation_succesful_select_input_element(elmt) {
  try {
    var input = elmt;
    var input_parent = input.parentElement.parentElement.parentElement.parentElement.parentElement;
    var target_element = input_parent.getElementsByClassName("select_element")[0];
    var error_span_array = input_parent.getElementsByClassName("validation_error_message");
    target_element.classList.remove("validation_error");
    target_element.classList.add("validation_success");

    for (var a = 0; a < error_span_array.length; a++) {
      error_span_array[a].style.height = 0;
      setTimeout(function () {
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
    var target_element = input_parent.getElementsByClassName("select_element")[0];
    var error_span_array = input_parent.getElementsByClassName("validation_error_message");
    target_element.classList.remove("validation_success");
    target_element.classList.add("validation_error");

    for (var a = 0; a < error_span_array.length; a++) {
      error_span_array[a].remove();
    }

    var error_span = document.createElement("SPAN");
    var error_span_innerText = "Please select a valid option";
    error_span.classList.add("validation_error_message");
    error_span.classList.add("fnt_small");
    error_span.classList.add("clr_red");
    error_span.innerText = error_span_innerText;
    error_span.style.height = 0;
    input_parent.appendChild(error_span);
    error_span.style.height = "50px";
  } catch (err) {
    console.log(err);
  }
}

function show_selectInputOptions(elmt) {
  window.removeEventListener("click", hide_selectInputOptions);

  try {
    var select_element = elmt;
    var select_element_openClose = elmt.getAttribute("openClose");
    var select_element_parent = select_element.parentElement;
    var select_input = select_element_parent.getElementsByClassName("select_input")[0];
    var select_options_container = select_element_parent.getElementsByClassName("options_container")[0];
    var select_options_array = select_options_container.getElementsByClassName("option");
    var select_options_container_height = 0;
    var roundingError_value = 1;

    if (select_element_openClose == "open") {
      for (var a = 0; a < select_options_array.length; a++) {
        var option_height = Math.ceil(select_options_array[a].clientHeight);
        select_options_container_height += option_height;
      }

      select_options_container_height += roundingError_value;
      select_options_container.style.height = select_options_container_height + "px";
      select_element.classList.add("rotateArrow_180");
      select_element.setAttribute("openClose", "close");
      setTimeout(function () {
        window.addEventListener("click", hide_selectInputOptions);
      }, 10);
    } else {
      select_options_container.style.height = select_options_container_height + "px";
      select_element.classList.remove("rotateArrow_180");
      select_element.setAttribute("openClose", "open");
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
    var select_input = select_options_container_parent.getElementsByClassName("select_input")[0];
    var select_input_option_array = select_input.getElementsByTagName("OPTION");
    var select_element = select_options_container_parent.getElementsByClassName("select_element")[0];
    var select_options_container_height = 0;
    var selected_option_array = select_options_container.getElementsByClassName("option");

    for (var a = 0; a < selected_option_array.length; a++) {
      selected_option_array[a].classList.remove("active");

      if (selected_option_array[a] == option) {
        option_index = a;
      }
    }

    for (var b = 0; b < select_input_option_array.length; b++) {
      select_input_option_array[b].selected = false;
    }

    select_input_option_array[option_index + 1].selected = true;
    select_element.innerText = option_innerText;
    option.classList.add("active");
    select_options_container.style.height = select_options_container_height + "px";
    select_element.classList.remove("rotateArrow_180");
    select_element.setAttribute("openClose", "open");
    window.removeEventListener("click", hide_selectInputOptions);
    validate_select_input_element(select_input); //here
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
      if (click_target.classList.contains("options_container")) {
        leave_while_loop = true;
      } else if (click_target.tagName == "BODY" || click_target.tagName == "HTML") {
        leave_while_loop = true;
        hide_options = true;
      } else {
        click_target = click_target.parentElement;
      }
    }

    if (hide_options == true) {
      var select_options_container_array = document.getElementsByClassName("options_container");

      for (var a = 0; a < select_options_container_array.length; a++) {
        var select_options_container = select_options_container_array[a];
        var select_options_container_height = 0;
        var select_options_container_parent = select_options_container.parentElement;
        var select_element = select_options_container_parent.getElementsByClassName("select_element")[0];
        select_element.classList.remove("rotateArrow_180");
        select_element.setAttribute("openClose", "open");
        select_options_container.style.height = select_options_container_height + "px";
      }

      window.removeEventListener("click", hide_selectInputOptions);
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
    var form_body = form.getElementsByClassName("form_body")[0];
    var inputs_to_validate_array = form_body.getElementsByClassName("validate_input");
    var input_error_count = 0;
    var submitButton = form.getElementsByClassName("formSendButton")[0];

    for (var a = 0; a < inputs_to_validate_array.length; a++) {
      var input = inputs_to_validate_array[a];
      var input_type = input.getAttribute("type");

      if (input_type == null || input_type == "") {
        input_type = input.tagName;
        input_type = input_type.toLowerCase();
      }

      console.log(input_type);

      if (input_type == "text") {
        var validation_failed = validate_text_input_element(input);
      } else if (input_type == "email") {
        var validation_failed = validate_email_input_element(input);
      } else if (input_type == "tel") {
        var validation_failed = validate_phoneNumber_input_element(input);
      } else if (input_type == "select") {
        var validation_failed = validate_select_input_element(input);
      } else if (input_type == "textarea") {
        var validation_failed = validate_textarea_input_element(input);
      } else {
        console.log("do_inputValidationFunction cannot find the input type");
      }

      if (validation_failed) {
        input_error_count++;
      }
    }

    if (input_error_count == 0) {
      submitButton.click();
    } else {
      console.log("error count : " + input_error_count);
    }
  } catch (err) {
    console.log("form send failed, error : " + err);
  }
}

function set_contactForm7_ladingPage_ajaxResponses() {
  var contactForm_parent = document.getElementById("landingPage_contactForm");

  if (element_exists(contactForm_parent)) {
    document.addEventListener("wpcf7mailsent", do_contactForm7_ladingPage_ajaxResponse_success);
    document.addEventListener("wpcf7invalid", do_contactForm7_ladingPage_ajaxResponse_fail);
    document.addEventListener("wpcf7spam", do_contactForm7_ladingPage_ajaxResponse_fail);
    document.addEventListener("wpcf7mailfailed", do_contactForm7_ladingPage_ajaxResponse_fail);
  }
}

function do_contactForm7_ladingPage_ajaxResponse_success() {
  var contactForm_parent_container = document.getElementById("landingPage_contactForm");
  var form_parent = contactForm_parent_container.getElementsByClassName("form_parent")[0];

  if (element_exists(form_parent)) {
    if (windowWidthIsLessThanBreakPointIndex(2)) {
      var contactForm_parent_container_height = "";
    } else {
      var contactForm_parent_container_height = contactForm_parent_container.clientHeight + "px";
    }

    var contactForm_parent_container_height = contactForm_parent_container.clientHeight;
    var contactForm_success_container = contactForm_parent_container.getElementsByClassName("form_successContent")[0];
    var form_intro_container = contactForm_parent_container.getElementsByClassName("form_image_formContainer_introCopy")[0];
    contactForm_success_container.style.height = contactForm_parent_container_height;
    form_parent.style.height = 0;
    form_intro_container.style.opacity = 0;
    contactForm_success_container.style.display = "block"; // if (typeof ga === 'function'){
    //     ga('send', 'event', 'Enquiry', 'Enquiry Submitted');
    //     console.log('ga form subbition event fired');

    window.dataLayer.push({
      event: "cf7submission",
      formId: event.detail.contactFormId,
      response: event.detail.inputs
    });
    console.log(window.dataLayer);
    console.log("ga form subbition event fired abc"); // }

    setTimeout(function () {
      contactForm_success_container.style.opacity = 1;
    }, 50);
    setTimeout(function () {
      form_intro_container.style.display = "none";
      goTo_contact();
    }, 300);
  }
}

function do_contactForm7_ladingPage_ajaxResponse_fail() {
  var contactForm_parent_container = document.getElementById("landingPage_contactForm");
  var form_parent = contactForm_parent_container.getElementsByClassName("form_parent")[0];

  if (element_exists(contactForm_parent_container) && element_exists(form_parent)) {
    var contactForm_failer_container = contactForm_parent_container.getElementsByClassName("form_failerPopUp")[0];
    contactForm_failer_container.style.display = "block";
    setTimeout(function () {
      contactForm_failer_container.style.opacity = 1;
    }, 50);
  }
}

function do_formValidation_resetForm() {
  var contactForm_parent_container = document.getElementById("landingPage_contactForm");
  var form_parent = contactForm_parent_container.getElementsByClassName("form_parent")[0];

  if (element_exists(form_parent)) {
    var contact_form = form_parent.getElementsByTagName("FORM")[0];
    var contactForm_success_container = contactForm_parent_container.getElementsByClassName("form_successContent")[0];
    var form_intro_container = contactForm_parent_container.getElementsByClassName("form_image_formContainer_introCopy")[0];
    form_parent.style.height = "";
    form_intro_container.style.display = "block";
    contactForm_success_container.style.opacity = 0;
    contact_form.reset();
    setTimeout(function () {
      form_intro_container.style.opacity = 1;
    }, 50);
    setTimeout(function () {
      contactForm_success_container.style.display = "none";
    }, 300);
  }
}

function do_formValidation_closeErrorPopUp(elmt) {
  var elmt_parent = elmt.parentElement.parentElement;

  if (element_exists(elmt_parent)) {
    elmt_parent.style.opacity = "";
    setTimeout(function () {
      elmt_parent.style.display = "";
    }, 300);
  }
}

function formClose_EventListener() {}

function do_openForm() {
  var form_container = document.getElementById("contactForm");

  if (form_container) {
    do_closeMobileMenu();
    form_container.classList.add("active");
    form_container.addEventListener("click", formClose_EventListener);
  }
}

function do_closeForm() {
  var form_container = document.getElementById("contactForm");

  if (form_container) {
    form_container.classList.remove("active");
    form_container.removeEventListener("click", formClose_EventListener);
  }
}

function do_closeMobileMenu() {
  var mobileMenuParent = document.getElementById("mainNavigationMobile");

  if (mobileMenuParent) {
    mobileMenuParent.classList.remove("active");
  }
}

function do_openCloseMobileMenu() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (elmt) {
    var mobileNavigationParent = elmt.parentElement.parentElement.parentElement.parentElement;
    do_closeForm();

    if (mobileNavigationParent.classList.contains("mainNavigationMobile")) {
      if (mobileNavigationParent.classList.contains("active")) {
        mobileNavigationParent.classList.remove("active");
      } else {
        mobileNavigationParent.classList.add("active");
      }
    }
  }
} //USP section functions


var uspTouchX = 0;

function updateUspActiveItem() {
  var item = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

  if (item) {
    var itemParent = item.parentElement;
    var uspContainerParent = itemParent.parentElement.parentElement;
    var uspContainerInner = uspContainerParent.getElementsByClassName("uspContainerInner")[0];
    var dot_array = itemParent.getElementsByClassName("dot");
    var dotIndex = 0;
    var shiftDelta = 340;

    for (var a = 0; a < dot_array.length; a++) {
      if (dot_array[a] == item) {
        dotIndex = a;
      }

      dot_array[a].classList.remove("active");
    }

    dot_array[dotIndex].classList.add("active");
    uspContainerInner.style.transform = "translateX(-" + shiftDelta * dotIndex + "px)";
  }
}

function updateUspTouchX() {
  var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var eventTouchX = Math.ceil(event.touches[0].clientX);
  uspTouchX = eventTouchX;
}

function shiftUspByTouch() {
  var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var eventTouchX = Math.ceil(event.changedTouches[0].clientX);
  var theTarget = event.currentTarget;
  var dot_array = theTarget.parentElement.getElementsByClassName("dot");
  var dotIndex = 0;

  for (var a = 0; a < dot_array.length; a++) {
    if (dot_array[a].classList.contains("active")) {
      dotIndex = a;
    }
  }

  if (eventTouchX >= uspTouchX) {
    if (dotIndex > 0) {
      dotIndex--;
    } else {
      dotIndex = 0;
    }
  } else {
    if (dotIndex < 2) {
      dotIndex++;
    } else {
      dotIndex = 2;
    }
  }

  updateUspActiveItem(dot_array[dotIndex]);
}

function do_readMore() {
  var elmt = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var parent = elmt.parentElement.parentElement;
  var container = parent.getElementsByClassName("readMore_container")[0];
  var element_array = container.getElementsByTagName("P");
  var open_close = elmt.innerText;

  if (open_close == "Read more") {
    var button_innerText = "Read less";
    var element_display = "inline";
  } else if (open_close == "Read less") {
    var button_innerText = "Read more";
    var element_display = "";
  } else {
    console.log("do_readMore error"); //do nothing
  }

  parent.style.opacity = 0;
  setTimeout(function () {
    for (var a = 0; a < element_array.length; a++) {
      if (element_array[a] != elmt) {
        element_array[a].style.display = element_display;
      }
    }

    var parent_height = container.clientHeight;
    elmt.innerText = button_innerText;
    parent.style.height = parent_height + "px";
  }, 300);
  setTimeout(function () {
    parent.style.opacity = 1;
  }, 310);
}

function do_readMore_reset() {
  var parent_array = document.getElementsByClassName("readMore_parent");

  for (var a = 0; a < parent_array.length; a++) {
    var container = parent_array[a].getElementsByClassName("readMore_container")[0];
    var readMore_button = parent_array[a].getElementsByClassName("readMore_button")[0];
    var element_array = container.getElementsByTagName("P");
    var button_innerText = "Read more";
    var element_display = "";
    var parent_height = 0;

    for (var b = 0; b < element_array.length; b++) {
      element_array[b].style.display = element_display;
    }

    parent_height = container.clientHeight;
    readMore_button.innerText = button_innerText;
    parent_array[a].style.height = parent_height + "px";
  }
} //intro section functions


var GLOBAL_testimonialCarouselAutoScrollIsActive = true; //bool

var testimonialAutoScrollTimeout = setInterval(testimonialAutoScroll, 4000); //any

function testimonialAutoScroll() {
  var carouselParent = document.getElementsByClassName("testimonialContainer")[0]; //any

  if (carouselParent && GLOBAL_testimonialCarouselAutoScrollIsActive) {
    var carousel = carouselParent.getElementsByClassName("carousel")[0]; //any

    if (carousel) {
      var dotArray = carouselParent.getElementsByClassName("dot"); //Array<any>

      var activeDot = carouselParent.getElementsByClassName("dot active")[0]; //any

      var currentCarouselIndex = activeDot ? parseInt(activeDot.getAttribute("index")) : 0; //number

      var newIndex = currentCarouselIndex + 1; //number

      if (newIndex >= dotArray.length) {
        GLOBAL_testimonialCarouselAutoScrollIsActive = false;
        shiftCarouselToIndex(carousel, 0);
        clearInterval(testimonialAutoScrollTimeout);
        return;
      }

      shiftCarouselToIndex(carousel, newIndex);
    }
  }
}

function handleCarouselDotNavigation(event) {
  var elmt = event.currentTarget || event.target; //any

  if (elmt) {
    var carouselParent = elmt.parentElement.parentElement.parentElement; //any

    if (carouselParent.classList.contains("carousel")) {
      var carouselItemArray = carouselParent.getElementsByClassName("carouselItem"); //Array<any>

      var elmtIndex = parseInt(elmt.getAttribute("index")); //number

      GLOBAL_testimonialCarouselAutoScrollIsActive = false;
      shiftCarouselToIndex(carouselParent, elmtIndex);
      clearInterval(testimonialAutoScrollTimeout);
    }
  }
}

function shiftCarouselToIndex() {
  var carouselParent = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
  var index = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : -1;

  if (carouselParent && (index || index >= 0)) {
    var carouselOuter = carouselParent.getElementsByClassName("carouselOuter")[0]; //any

    var carouselInner = carouselParent.getElementsByClassName("carouselInner")[0]; //any

    var dotArray = carouselParent.getElementsByClassName("dot"); //Array<any>

    if (carouselOuter && carouselInner) {
      var carouselWidth = carouselOuter.clientWidth; //number

      var newTranslateX = Math.ceil(-1 * index * carouselWidth); //number

      for (var a = 0; a < dotArray.length; a++) {
        var dot = dotArray[a]; //any

        dot.classList.remove("active");
      }

      if (dotArray[index]) {
        dotArray[index].classList.add("active");
      }

      carouselInner.style.transform = "translateX(" + newTranslateX + "px)";
    }
  }
}

function handleCarouselFrameChange(event) {
  var elmt = event.currentTarget || event.target; //any

  if (elmt) {
    var elmtParent = elmt.parentElement.parentElement.parentElement; //any

    if (elmtParent.classList.contains("carouselParent")) {
      var carouselButtonArray = elmtParent.getElementsByClassName("carouselButton"); //Array<any>

      var dotArray = elmtParent.getElementsByClassName("dot"); //Array<any>

      var currentActiveDot = elmtParent.getElementsByClassName("dot active")[0]; //any

      var currentIndex = parseInt(currentActiveDot.getAttribute("index")); //number

      var newIndex = parseInt(elmt.getAttribute("index")); //number

      var indexDelta = Math.abs(currentIndex - newIndex); //number

      if (newIndex > currentIndex) {
        for (var b = 0; b < indexDelta; b++) {
          carouselButtonArray[1].click();
        }
      } else if (newIndex < currentIndex) {
        for (var c = 0; c < indexDelta; c++) {
          carouselButtonArray[0].click();
        }
      }

      for (var a = 0; a < dotArray.length; a++) {
        dotArray[a].classList.remove("active");
      }

      elmt.classList.add("active");
    }
  }
}

function handleSuccessCloseForm() {
  var contactFormParent = document.getElementById("contactForm"); //any

  if (contactFormParent) {
    var formContainer = contactFormParent.getElementsByClassName("presendContainer")[0]; //any

    var successContainer = contactFormParent.getElementsByClassName("successContainer")[0]; //any

    var errorContainer = contactFormParent.getElementsByClassName("errorContainer")[0]; //any

    var closeButton = contactFormParent.getElementsByClassName("contactFormClose")[0]; //any

    formContainer.classList.add("active");
    successContainer.classList.remove("active");
    errorContainer.classList.remove("active");
    closeButton.click();
  }
}

function handleErrorFormReset() {
  var contactFormParent = document.getElementById("contactForm"); //any

  if (contactFormParent) {
    var formContainer = contactFormParent.getElementsByClassName("presendContainer")[0]; //any

    var successContainer = contactFormParent.getElementsByClassName("successContainer")[0]; //any

    var errorContainer = contactFormParent.getElementsByClassName("errorContainer")[0]; //any

    var closeButton = contactFormParent.getElementsByClassName("contactFormClose")[0]; //any

    formContainer.classList.add("active");
    successContainer.classList.remove("active");
    errorContainer.classList.remove("active");
  }
}

function handleFormSuccessResponse() {
  var contactFormParent = document.getElementById("contactForm"); //any

  if (contactFormParent) {
    var formContainer = contactFormParent.getElementsByClassName("presendContainer")[0]; //any

    var successContainer = contactFormParent.getElementsByClassName("successContainer")[0]; //any

    var errorContainer = contactFormParent.getElementsByClassName("errorContainer")[0]; //any

    formContainer.classList.remove("active");
    successContainer.classList.add("active");
    errorContainer.classList.remove("active");
  }
}

function handleFormErrorResponse() {
  var contactFormParent = document.getElementById("contactForm"); //any

  if (contactFormParent) {
    var formContainer = contactFormParent.getElementsByClassName("presendContainer")[0]; //any

    var successContainer = contactFormParent.getElementsByClassName("successContainer")[0]; //any

    var errorContainer = contactFormParent.getElementsByClassName("errorContainer")[0]; //any

    formContainer.classList.remove("active");
    successContainer.classList.remove("active");
    errorContainer.classList.add("active");
  }
}

document.addEventListener("wpcf7mailsent", handleFormSuccessResponse, false);
document.addEventListener("wpcf7mailfailed", handleFormErrorResponse, false);
//# sourceMappingURL=pigeonJS.dev.js.map
