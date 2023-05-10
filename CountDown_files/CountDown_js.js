/*
    This may look a bit bulkier but it is hopefully a bit more reuseable
*/

//set timing variables - used as modulos to convert the date number format to a user friendly version...
var second = 1000;
var minute = second * 60;
var hour = minute * 60;
var day = hour * 24;

/* ---- EDIT THESE VALUES ---- */
    //set interval update frequency
    var updates_every = second;

    //set the target date to count down too in a month first string format - mm/dd/yyyy
    var targetDate = '11/30/2022';

    //set containers
    var countDown_parent_container = document.getElementById("containerCountdown");
    var countDown_seconds_container = document.getElementById("seconds");
    var countDown_minutes_container = document.getElementById("minutes");
    var countDown_hours_container = document.getElementById("hours");
    var countDown_days_container = document.getElementById("days");

/* --------------------------- */

//initiate interval
var countDown_interval = setInterval(do_countDown, updates_every);

//interval function
function do_countDown() {
    var theDate = new Date(); //get todays date object
    var targetDate_time = new Date(targetDate).getTime(); //convert the target date to number format
    var theDate_time = theDate.getTime(); //convert the date to number format
    var countDown = targetDate_time - theDate_time; //calculate time from now to target date in number format
    
    //if the date is or past the target date then hide the html container and discontinue the interval
    //else run the function
    if (countDown <= 0) {
        countDown_parent_container.setAttribute('style', 'display: none;');
        clearInterval(countDown_interval);

        return;

    } else {
        var countDown_seconds = Math.floor((countDown % minute) / second); //get the seconds part of the countdown
        var countDown_minutes = Math.floor((countDown % hour) / minute); //get the minutes part of the countdown
        var countDown_hours = Math.floor((countDown % day) / hour); //get the hours part of the countdown
        var countDown_days = Math.floor(countDown / day); //get the days part of the countdown

        //update reletive html elements
        countDown_seconds_container.innerText = countDown_seconds;
        countDown_minutes_container.innerText = countDown_minutes;
        countDown_hours_container.innerText = countDown_hours;
        countDown_days_container.innerText = countDown_days;

    }
}