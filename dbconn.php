<?php
session_start();
$dbservername = "localhost:3306";
$dbusername = "root";
$dbpassword = "joshuapierre04";
$dbname = "db_library";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
    
}
?>