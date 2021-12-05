<?php
$connection = mysqli_connect ("localhost", "root","", "sampledatabase");
if(!$connection)
{
	die("Connection failed: " . mysqli_connect_error());
	exit;
}
