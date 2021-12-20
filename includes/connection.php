<?php
$connection = mysqli_connect ("localhost", "root","", "gamification");
if(!$connection)
{
	die("Connection failed: " . mysqli_connect_error());
	exit;
}
