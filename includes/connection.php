<?php
Session_start();
$connection = mysqli_connect ("localhost", "root","", "registered");
if(!$connection)
{
	die("Connection failed: " . mysqli_connect_error());
	exit;
}
