<?php

require_once('./config/db.php');
session_start();
if(isset($_SESSION['user_id'])==false){
    header("Location: signin.php");
}

?>