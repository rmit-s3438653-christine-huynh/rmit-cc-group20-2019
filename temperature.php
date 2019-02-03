<!--Christine Huynh 2019-->
<?php
    include_once("nav.html");

    $servername = "/cloudsql/s3438653-cc2019:us-east1:phpmyadmin-id";
    $username = "root";
    $password = "password";
    $dbname = "cloudcomputing";
    $c = new mysqli(null, $username, $password, $dbname, 0, $servername);

    if ($c->connect_error) {
        die('Connect Error (' . $c->connect_errno . ') '
                . $c->connect_error);
    } else {
        echo '-----------------------------------------Success. ' . $c->host_info . "\n";
    }
?>
<html>
    <body>
        <div class="main">
            <h1>Temperature page</h1>
            <div class="row">
            <div class="col-sm-4">
                <form action="">
                <div class="form-group">
                    <label>Observation:</label>
                    <label class="radio-inline">
                        <input type="radio" name="optradio" onclick="expose()" checked>Daily
                    </label>
                     <label class="radio-inline">
                        <input type="radio" name="optradio" onclick="hide()">Monthly
                    </label>
                </div>
    
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
                    <select class="form-dropdown-option">
                        <option>1000</option>
                        <option>2000</option>
                        <option>3000</option>
                        <option>4000</option>
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
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
                </div><!--form-group-->
          
                <div class="form-group">
                    <label>Temperature:</label>
                    <input type="text" class="form-control-inline"placeholder="Enter temperature">
                </div><!--form-group-->
                <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div><!--col-sm-4-->
            </div><!--row-->


        <?php
            $query = "SELECT * FROM `monthly_rainfall`";
            $result = $c->query($query);
            if ($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row['Month'];
                    echo "<br/>";
                }
                $result->close();
            } 
            $c->close();
        ?>
        <div id="t_container"></div>
        </div><!--main-->
    </body>
</html>