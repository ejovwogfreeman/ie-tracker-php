<?php 
require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');
if(isset($_GET["id"])) {
    $transaction_id = $_GET["id"];
    $sql = "DELETE FROM transactions WHERE transaction_id='$transaction_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: dashboard.php");
    }else {
        echo 'There is an error in connection: ' . mysqli_connect_error();
    }
}

?>






