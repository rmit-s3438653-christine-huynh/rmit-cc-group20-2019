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
	var day = document.getElementsByClassName("day_dropdown")[0];
	if(!day.hasAttribute("hidden")) {
		var att = document.createAttribute("hidden");
		day.setAttributeNode(att);
	}
}

function expose() {
	var day = document.getElementsByClassName("day_dropdown")[0];
	if(day.hasAttribute("hidden"))
		day.attributes.removeNamedItem("hidden");
}

function show_daily() {
	var daily_div = document.getElementsByClassName("daily")[0];
	var monthly_div = document.getElementsByClassName("monthly")[0];
	if(daily_div.hasAttribute("hidden")) 
		daily_div.attributes.removeNamedItem("hidden");
	if(!monthly_div.hasAttribute("hidden")) {
		var attr = document.createAttribute("hidden");
		monthly_div.setAttributeNode(attr);
	}
}

function show_monthly() {
	var daily_div = document.getElementsByClassName("daily")[0];
	var monthly_div = document.getElementsByClassName("monthly")[0];
	if(monthly_div.hasAttribute("hidden")) 
		monthly_div.attributes.removeNamedItem("hidden");
	if(!daily_div.hasAttribute("hidden")) {
		var attr = document.createAttribute("hidden");
		daily_div.setAttributeNode(attr);
	}
}