<?php

$servername="localhost";
$username="root";
$password="";
$dbname="shopping";

$conn=new mysqli($servername,$username,$password,$dbname);

if(!$conn)
{
	echo "Error";
}

?>