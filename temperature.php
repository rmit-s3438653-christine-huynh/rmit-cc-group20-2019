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
    
    
    //$c->close();
?>

<html>
    <body>
        <div class="main">
            <h1>Temperature page</h1>
            <?php
            $query = "SELECT * FROM `monthly_rainfall`";

            if ($result = $c->query("SELECT DATABASE()")) {
                $row = $result->fetch_row();
                printf("Default database is %s.\n", $row[0]);
                $result->close();
            }


            
            $result = $c->query($query);
            while($row = mysql_fetch_assoc($result))
            {
                $month = $row['Month'];
                $precip = $row['Monthly Precipitation Total (millimetres)'];
                $code = $row['Product code'];
                $quality = $row['Quality'];
                $station = $row['Station number'];
                $year = $row['Year'];

                $month = htmlspecialchars($row['Month'],ENT_QUOTES);
                $precip = htmlspecialchars($row['Monthly Precipitation Total (millimetres)'],ENT_QUOTES);
                $code = htmlspecialchars($row['Product code'],ENT_QUOTES);
                $quality = htmlspecialchars($row['Quality'],ENT_QUOTES);
                $station = htmlspecialchars($row['Station number'],ENT_QUOTES);
                $year = htmlspecialchars($row['Year'],ENT_QUOTES);

                echo "  <div style='margin:30px 0px;'>
              
                    Station: $station<br />
                    Year: $year<br />
                    Month: $month<br />
                    Monthly Precipitation Total (millimetres): $precip<br />
                  </div>
                ";
            }
            $result->close();

            $c->close();


            ?>
            <div id="t_container"></div>
        </div>
    </body>
</html>