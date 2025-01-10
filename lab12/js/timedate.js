function gettheDate() {
    var Todays = new Date();
    var day = Todays.getDate();
    var month = Todays.getMonth() + 1;
    var year = Todays.getFullYear();
    var formattedDay = (day < 10) ? "0" + day : day;
    var formattedMonth = (month < 10) ? "0" + month : month;

    var TheDate = formattedDay + "." + formattedMonth + "." + year;
    document.getElementById("data").innerHTML = TheDate;
}

var timerID = null;
var timerRunning = false;

function stopClock(){
    if(timerRunning)
        clearTimeout(timerID);
    timerRunning = false;
}

function startclock(){
    stopClock();
    gettheDate();
    showtime();
}
function showtime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = ((hours < 10) ? "0" : "") + hours;
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    document.getElementById("zegarek").innerHTML = timeValue;
    timerID = setTimeout(showtime, 1000);
    timerRunning = true;
}