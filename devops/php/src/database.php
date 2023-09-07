<?php

$hostName = 'db';
$dbUser = 'YashaswiniGA';
$dbPassword = 'root';
$dbName = 'leaveapproval';
$connect = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$connect) {
    die("Something went wrong;");
}

?>