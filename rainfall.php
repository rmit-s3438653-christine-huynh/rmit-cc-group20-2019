<!--Christine Huynh 2019-->
<?php
  session_start();
  include_once("nav.html");
  require_once 'php/google-api-php-client/vendor/autoload.php';
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
    <?php
		$client = new Google_Client();
		$client->useApplicationDefaultCredentials();
		$client->addScope(Google_Service_Bigquery::BIGQUERY);
		$bigquery = new Google_Service_Bigquery($client);
		$projectId = 's3438653-cc2019';

		$request = new Google_Service_Bigquery_QueryRequest();
		$str = '';
		
		$request->setQuery("SELECT year, month, day, rainfall FROM [daily_rainfall.bentleigh] LIMIT 10");
		
		$response = $bigquery->jobs->query($projectId, $request);
		$rows = $response->getRows();

		$str = "<table>".
		"<tr>" .
		"<th>Year</th>" .
    "<th>Month</th>" .
		"<th>Day</th>" .
    "<th>Rainfall (mm)</th>" .
		"</tr>";
		
		foreach ($rows as $row)
		{
			$str .= "<tr>";

			foreach ($row['f'] as $field)
			{
				$str .= "<td>" . $field['v'] . "</td>";
			}
			$str .= "</tr>";
		}

		$str .= '</table></div>';

		echo $str;
	?>
</div>
    <div id="r_container"></div>
  </div><!--main-->
  </body>
</html>