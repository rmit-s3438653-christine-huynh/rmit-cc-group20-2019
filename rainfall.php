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
        <label>Observation:</label><br/>
          <input id="obs_daily" type="radio" name="observation" value="daily" onclick="toggleObservation()" checked>Daily
          <input id="obs_monthly" type="radio" name="observation"value="monthly" onclick="toggleObservation()">Monthly

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
            <select class="form-control-inline" id="year">
              <option>1000</option>
              <option>2000</option>
              <option>3000</option>
              <option>4000</option>
            </select>
          </div><!--form-group-->

          <div class="form-group">
            <label for="year">Month:</label>
            <select class="form-control-inline" id="year">
              <option>Jan</option>
              <option>Feb</option>
              <option>Mar</option>
              <option>Apr</option>
            </select>
          </div><!--form-group-->

          <p id="demo"></p>

      </form>
      </div><!--col-sm-4-->
    </div><!--row-->


    <div class='content'>

</div>
    <div id="r_container"></div>
  </div><!--main-->
  </body>
</html>