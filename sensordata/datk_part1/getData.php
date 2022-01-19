<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytectutor";

// MySQL database connection code
$connection = mysqli_connect($servername,$username,$password,$dbname) or die("Error " . mysqli_error($connection));
//Fetch sports data
$sql = "SELECT * FROM sensordata";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $value1 =(int) $row['value1'];
    $count =(int) $row['id'];
    
    $array[$count] = $value1;
    #$i = $i+1;
    //echo is_array($value1);
    //var_dump($row['value1']);
    //$arrlength = count($value1);

    //for($x = 0; $x < $arrlength; $x++) {
    //    echo $row[$value1][$x];
    //}
}
#print_r($array);
$data = json_encode($array);
echo $data;
?>