<?php
$servername = "localhost";
$username = "dbusr22360859015";
$password = "jDaOss9s6kW0";
$dbname = "dbstorage22360859015";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
