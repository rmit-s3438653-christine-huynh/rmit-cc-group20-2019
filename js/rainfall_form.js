// Christine Huynh 2019

function toggleObservation() {
    var y = document.getElementById("obs_daily").value;
    var z = document.getElementById("obs_monthly").value;
    if (document.getElementById("obs_daily").checked) {
       document.getElementById("demo").innerHTML = "true: " + y;
    } else if (document.getElementById("obs_monthly").checked) {
       document.getElementById("demo").innerHTML = "true: " + z;
    }
};