<?php

$dbhost = "sql210.epizy.com";
$dbuser = "epiz_30604121";
$dbpass = "KwmYes7OyB73ld";
$dbname = "epiz_30604121_users";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
