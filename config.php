<?php
$host = 'containers-us-west-93.railway.app:7289';
$user = 'root';
$pass = 'EkIG9TW3HL73cGjeKm2B';
$dbname = 'railway';
$mysqli = new mysqli($host, $user, $pass, $dbname);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} //Mencoba terhubung apabila Host, User, dan Pass Benar. Kalau tidak MySQL memberikan Notif Error
$dbselect = $mysqli->select_db($dbname); //Jika benar maka akan memilih Database sesuai pada variable $dbname