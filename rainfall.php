<?php
include_once("nav.html");
?>
<html>
<body>
<div class="main">
    <h2>Rainfall page</h2>
    <div class="input-group">
    <label for="type">Type of data:</label>
              <select class="form-control" id="observation" name="observation">
                <option hidden >Select an observation</option>
                <option value="Daily">Daily</option>
                <option value="Monthly">Monthly</option>
              </select>          
            </div>
            <div class="input-group">
            <label for="type">Location:</label>
              <select class="form-control" id="location" name="location">
                <option hidden >Select a weather station</option>
                <option value="Melbourne">Melbourne</option>
                <option value="MelbourneAirport">Melbourne Airport</option>
                <option value="EastMelbourne">East Melbourne</option>
                <option value="NorthMelbourne">North Melbourne</option>
              </select>          

</div>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</body>
</html>