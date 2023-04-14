<?php

$sname= "localhost";
$usame= "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname, $usame, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
