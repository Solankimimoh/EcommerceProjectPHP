<?php
$db_username        = 'root'; //MySql database username
$db_password        = ''; //MySql dataabse password
$db_name            = 'digitalprinting'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency			= '&#8377; '; //currency symbol

//shipping cost

$taxes				= array( //List your Taxes percent here.
							'Additional VAT' => 1, 
							'VAT' => 4
							);

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}