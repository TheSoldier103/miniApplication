<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mini_application";

if (!$dbConnection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

    die("failed to connect!");
}

