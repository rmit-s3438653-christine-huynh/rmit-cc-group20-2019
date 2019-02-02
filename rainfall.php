<!--Christine Huynh 2019-->
<?php
  session_start();
  include_once("nav.html");

?>

<html>
  <body>
  <div class="main">
    <h2>Rainfall page</h2>
    <div class="row">
      <div class="col-sm-4">
        <form action=""> 
          <div class="form-group">
            <label>Observation:</label>
            <label class="radio-inline">
              <input id="obs_daily "type="radio" name="observation" value="daily" onclick="toggleObservation()" checked>Daily
            </label>
            <label class="radio-inline">
              <input id="obs_monthly" type="radio" name="observation" value="monthly" onclick="toggleObservation()">Monthly
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
			$filter=mysql_query("SELECT Year FROM monthly_rainfall");
			$menu="";
			
			while($row = mysql_fetch_array($filter))
				
				$menu="";
					while($row=mysql_fetch_array($filter))
						
						{
							$menu.="<option>".$row['dropdown_option']."</option>";
						}
						
					$menu="</select></form>";
					
				echo$menu;
			?>

            </select>
      
            <label>Month:</label>
              <select class="form-control-inline">
                <option>Jan</option>
                <option>Feb</option>
                <option>Mar</option>
                <option>Apr</option>
              </select>

            <label>Day:</label>
              <select class="form-control-inline">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
          </div><!--form-group-->

          <div class="form-group">
            <label>Rainfall:</label>
            <input type="text" class="form-control-inline"placeholder="Enter rainfall">
          </div><!--form-group-->

          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div><!--col-sm-4-->
    </div><!--row-->
    <p id="demo"></p>
    <div class='content'></div>
    <div id="r_container"></div>
  </div><!--main-->
  </body>
</html>