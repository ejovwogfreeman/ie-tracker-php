<?php

require_once('./config/db.php');
// include('./config/session.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// define variables and set to empty values
$wish_title = $wish_amount = "";
$wish_titleErr = $wish_amountErr = "";
$userid = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $wish_title = test($_POST["title1"]);
  $wish_amount = abs(test($_POST["amount1"]));

  $sql2 = "INSERT INTO wish (wish_title,wish_amount,wish_user_id) VALUES('$wish_title', '$wish_amount', '$userid')";

  if(mysqli_query($conn, $sql2)){
      echo "<meta http-equiv='refresh' content='0'>";
      header('Location: dashboard.php');
  }else {
      echo 'There is an error in connection: ' . mysqli_connect_error();
  }

}

function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<style>
  form {
    width: 100%;
    margin: auto;
    padding: 20px;
    border-radius: 5px;
  }
  .offcanvas {
    --bs-offcanvas-width: 300px;
  }
</style>

<div>

<form class="needs-validation" novalidate method="POST" action="wish.php">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control <?php echo $wish_titleErr ? 'is-invalid' : null ?>" id="title" name="title1" value="<?php echo $wish_title;?>" required/>
    <div class="invalid-feedback"><?php echo $wish_titleErr?>Title is required</div>
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number"  class="form-control <?php echo $wish_amountErr ? 'is-invalid' : null ?>" id="amount" name="amount1" value="<?php echo $wish_amount;?>" required/>
    <div class="invalid-feedback"><?php echo $wish_amountErr?>Amount is required</div>
  </div>
  <button type="submit" class="btn btn-primary">Add To Wish List</button>
</form>

</div>


