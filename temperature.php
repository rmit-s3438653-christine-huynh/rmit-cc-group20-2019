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
            <h1>Temperature</h1>
            <div class="row">
            <div class="col-sm-4">
                <form onsubmit="getUserSelection()">
                <div class="form-group" id="observation">
                    <label>Observation:</label>
                    <label class="radio-inline">
                        <input type="radio" name="optradio" onclick="expose();show_daily()" checked>Daily
                    </label>
                     <label class="radio-inline">
                        <input type="radio" name="optradio" onclick="hide();show_monthly()">Monthly
                    </label>
                </div>
    
                <div class="form-group">
                    <label for="location">Location:</label>
                    <select class="form-control-inline" id="location">
                        <?php
                            $query = "SELECT DISTINCT `Station name` FROM `Station`";
                            $result = $c->query($query);

                            if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=".$row['Station name']."id=".$row['Station name'].">".$row['Station name']."</option>";
                            }
                            $result->close();
                            } 
                        ?>
                    </select>
                </div><!--form-group-->
          
                <div class="form-group">
                    <label for="year">Year:</label>
                    <select class="form-dropdown_option" id="year">
                    <?php
                        $query = "SELECT DISTINCT Year FROM `monthly_temperature` ORDER BY Year DESC";
                        $result = $c->query($query);

                        if ($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=".$row[Year]."id=".$row[Year].">".$row[Year]."</option>";
                        }
                        $result->close();
                        } 
                    ?>
                    </select>
      
                    <label>Month:</label>
                    <select class="form-control-inline" id="month">
                        <option value="1" id="1">January</option>
                        <option value="2" id="2">February</option>
                        <option value="3" id="3">March</option>
                        <option value="4" id="4">April</option>
                        <option value="5" id="5">May</option>
                        <option value="6" id="6">June</option>
                        <option value="7" id="7">July</option>
                        <option value="8" id="8">August</option>
                        <option value="9" id="9">September</option>
                        <option value="10" id="10">October</option>
                        <option value="11" id="11">November</option>
                        <option value="12" id="12">December</option>
                    </select>

                    <div class="day_dropdown">
						<label>Day:</label>
                        <select class="form-dropdown_option" id="day">
                            <?php
                                $query = "SELECT DISTINCT Day FROM `daily_temperature` ORDER BY Day ASC";
                                $result = $c->query($query);

                                if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=".$row[Day]."id=".$row[Day].">".$row[Day]."</option>";
                                }
                                $result->close();
                                } 
                            ?>
                            </select>
					</div>

                    
                </div><!--form-group-->
          
                <div class="form-group">
                    <label>Temperature:</label>
                    <input type="text" class="form-control-inline"placeholder="&#8451;">
                </div><!--form-group-->
                <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div><!--col-sm-4-->
            </div><!--row-->


			<div class="monthly" hidden>
				<?php
					$query = "SELECT * FROM `monthly_temperature`";
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
			</div>
			
			<div class="daily" hidden>
				<?php
					$query = "SELECT * FROM `daily_temperature`";
					$result = $c->query($query);
					if ($result) {
						while($row = mysqli_fetch_assoc($result)) {
							echo $row['Day'];
							echo "<br/>";
						}
						$result->close();
					} 
					$c->close();
				?>
			</div>
        <div id="t_container"></div>
        </div><!--main-->
    </body>
</html>