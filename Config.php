<?php
$DB_SERVER="localhost";
$DB_USERNAME="root";
$DB_PASSWORD="";
$DB_NAME="webteam";

$mysqli = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check connection
if($mysqli == false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>