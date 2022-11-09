<?php 
require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');
if(isset($_GET["id"])) {
    $wish_id = $_GET["id"];
    $sql = "DELETE FROM wish WHERE wish_id='$wish_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: dashboard.php");
    }else {
        echo 'There is an error in connection: ' . mysqli_connect_error();
    }
}

?>






