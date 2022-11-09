<?php

// define("DB_HOST", "us-cdbr-east-06.cleardb.net");
// define("DB_USER", "b6e74007413701");
// define("DB_PASSWORD", "3e095422");
// define("DB_NAME", "heroku_bc507fb102e71d7");

define("DB_HOST", "localhost");
define("DB_USER", "godbless");
define("DB_PASSWORD", "12345");
define("DB_NAME", "ie_project");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
    die(mysqli_connect_error());
}else {
    // echo "db connected successfully";
}

?>
