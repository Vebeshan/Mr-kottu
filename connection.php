<?php

$host="localhost";
$user="root";
$pwd="";
$db="mr.kottu";


$con = mysqli_connect($host,$user,$pwd,$db);

if(!$con)
{
    echo "Connection Error";
}
?>