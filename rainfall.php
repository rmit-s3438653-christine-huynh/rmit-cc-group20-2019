<!--Christine Huynh 2019-->
<?php
  session_start();
  include_once("nav.html");

  $servername = "/cloudsql/s3438653-cc2019:us-east1:phpmyadmin-id";
  $username = "root";
  $password = "password";
  $dbname = "cloudcomputing";
  $c = new mysqli(null, $username, $password, $dbname, 0, $servername);

  if ($c->connect_error) {
      die('Connect Error (' . $c->connect_errno . ') '
              . $c->connect_error);
  }
?>

<html>
  <body>
  <div class="main">
    <h1>Rainfall</h1>
    <div class="row">
      <div class="col-sm-4">
	  <button onclick="rainfall_marker()">Show Maximum Rainfall Amount</button>
        <form action=""> 
          <div class="form-group">
            <label>Observation:</label>
            <label class="radio-inline">
              <input id="obs_daily "type="radio" name="observation" value="daily" onclick="expose();toggleObservation()" checked>Daily
            </label>
            <label class="radio-inline">
              <input id="obs_monthly" type="radio" name="observation" value="monthly" onclick="hide();toggleObservation()">Monthly
            </label>
          </div><!--form-group-->

          <div class="form-group">
            <label for="location">Location:</label>
            <select class="form-control-inline" id="location">
              <option>Melbourne</option>
              <option>East Melbourne</option>
              <option>Melbourne Olympic Park</option>
              <option>Melbourne Botanic Gardens</option>
            </select>
          </div><!--form-group-->
          
          <div class="form-group">
            <label for="year">Year:</label>
            <select class="form-dropdown_option">
              <?php
                $query = "SELECT DISTINCT Year FROM `monthly_rainfall` ORDER BY Year DESC";
                $result = $c->query($query);

                if ($result) {
                  while($row = mysqli_fetch_assoc($result)) {
                      echo "<option>".$row[Year]."</option>";
                  }
                  $result->close();
                } 
              ?>
            </select>
      
            <label>Month:</label>
              <select class="form-control-inline">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>

            <div class="day_dropdown">
			    <label>Day:</label>
                <select class="form-control-inline">
                <?php
                  $query = "SELECT DISTINCT Day FROM `daily_rainfall` ORDER BY Day ASC";
                  $result = $c->query($query);

                  if ($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option>".$row[Day]."</option>";
                    }
                    $result->close();
                  } 
                  $c->close();
                ?>
              </select>
			      </div>
          </div><!--form-group-->

          <div class="form-group">
            <label>Rainfall:</label>
            <input type="text" class="form-control-inline"placeholder="millilitre(s)">
          </div><!--form-group-->

          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div><!--col-sm-4-->
    </div><!--row-->
	<?php 
	include_once("map.php")
	?>
	
    <p id="demo"></p>
    <div class='content'></div>
    <div id="r_container"></div>
  </div><!--main-->
  </body>
</html>