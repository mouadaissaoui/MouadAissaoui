<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "contact";
$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

if(!$con){
    echo "Data base no connection";
}
