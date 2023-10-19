<?php

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "bio_anime";

$conn   = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Gagal Terhubung".mysqli_connect_error());
}

?>