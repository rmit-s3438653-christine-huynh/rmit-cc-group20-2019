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
        <form> 
        <label>Observation:</label>
        <label class="radio-inline">
          <input type="radio" name="daily" checked>Daily
        </label>
        <label class="radio-inline">
          <input type="radio" name="monthly">Monthly
        </label>  
          
          <div class="dropdown">
          <label>Location:</label>
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">-Choose a station-
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">Melbourne</a></li>
              <li><a href="#">East Melbourne</a></li>
              <li><a href="#">North Melbourne</a></li>
            </ul>
          </div><!--dropdown-->
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