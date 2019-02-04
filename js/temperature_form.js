// Christine Huynh 2019

function getUserSelection() {
    var loc = document.getElementById("location");
    var year = document.getElementById("year");
    var mon = document.getElementById("month");
    var day = document.getElementById("day");

    var selectedLocation = loc.options[loc.selectedIndex].value;
    var selectedYear = year.options[year.selectedIndex].value;
    var selectedMonth = mon.options[mon.selectedIndex].value;
    var selectedDay = day.options[day.selectedIndex].value;

    document.write(selectedLocation);
    console.log(selectedYear);
    console.log(selectedMonth);
    console.log(selectedDay);
}