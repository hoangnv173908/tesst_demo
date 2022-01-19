<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5" >
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<title> Sensor Data </title>

</head>

<body>

    <h1>SENSOR DATA</h1>
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mytectutor";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = getdate();

        if ($time['hours']==13 and $time['minutes']==24) {
            $sql = "DELETE FROM sensordata ";
            if ($conn->query($sql) === TRUE) {
                echo "Deleted successfully";
              } else {
                echo "Error: ";
              }
        }
        else{

        
        $sql = "SELECT id, sensor, location, value1, value2, value3 FROM sensordata ORDER BY id DESC"; /*select items to display from the sensordata table in the data base*/
        
        echo '<table cellspacing="5" cellpadding="5">
                <tr> 
                    <th>ID</th> 
                    <th>Sensor</thh> 
                    <th>Location</th> 
                    <th>Temperature &deg;C</th> 
                    <th>Humidity &#37;</th>
                    <th>Pressure</th>       
                </tr>';
 
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $row_id = $row["id"];
                $row_sensor = $row["sensor"];
                $row_location = $row["location"];
                $row_value1 = $row["value1"];
                $row_value2 = $row["value2"]; 
                $row_value3 = $row["value3"]; 
        
      
                echo '<tr> 
                        <td>' . $row_id . '</td> 
                        <td>' . $row_sensor . '</td> 
                        <td>' . $row_location . '</td> 
                        <td>' . $row_value1 . '</td> 
                        <td>' . $row_value2 . '</td>
                        <td>' . $row_value3 . '</td> 
                        
                    </tr>';
            }
            $result->free();
        }
    }
        $conn->close();
    ?> 

</body>
