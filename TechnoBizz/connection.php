<?php


function Connect()
{
 $dbhost = "sg2plcpnl0067.prod.sin2.secureserver.net";
 $dbuser = "technobizz";
 $dbpass = "Password@12345";
 $dbname = "technobizz";

 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

 return $conn;
}
 
?>