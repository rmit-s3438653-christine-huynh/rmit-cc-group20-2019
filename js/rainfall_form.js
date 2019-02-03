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

function hide() {
	var day = document.getElementById("day_dropdown");
	if(!day.hasAttribute("hidden")) {
		var att = document.createAttribute("hidden");
		day.setAttributeNode(att);
	}
}

function expose() {
	var day = document.getElementById("day_dropdown");
	if(day.hasAttribute("hidden"))
		day.attributes.removeNamedItem("hidden");
}
