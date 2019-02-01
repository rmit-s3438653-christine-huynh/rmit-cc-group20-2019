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
            if ($result) {
              
                while($row = mysqli_fetch_assoc($result))
                {
                    echo $row['Month'];
                    echo "<br/>";
                }
                $result->close();
            } 
      

            $c->close();
            ?>
            <div id="t_container"></div>
        </div>
    </body>
</html>