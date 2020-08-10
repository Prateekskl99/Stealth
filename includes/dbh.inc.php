<?php
$servername="localhost";
$dBusername="root";
$dBpassword="";
$dBName="loginsystemdb";

// Create Connection
$conn = mysqli_connect($servername,$dBusername,$dBpassword,$dBName);

if(!$conn)
{
    die("Connection failed:" .mysqli_connect_error());
}

?>