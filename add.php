<?php

require_once('./config/db.php');
// include('./config/session.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// define variables and set to empty values
$title = $description = $amount = $transaction_type = "";
$titleErr = $descriptionErr = $amountErr = "";
$userid = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
  $description = test_input($_POST["description"]);
  $amount = abs(test_input($_POST["amount"]));

  $transaction_type = test_input($_POST["transaction_type"]);
  $sql = "INSERT INTO transactions (title,description,transaction_type,amount,user_id) VALUES('$title', '$description', '$transaction_type', '$amount', '$userid')";

  if(mysqli_query($conn, $sql)){
      header('Location: dashboard.php');
  }else {
      echo 'There is an error in connection: ' . mysqli_connect_error();
  }
}

function test_input($data) {
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

<form class="needs-validation" novalidate method="POST" action="add.php">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control <?php echo $titleErr ? 'is-invalid' : null ?>" id="title" name="title" value="<?php echo $title;?>" required/>
    <div class="invalid-feedback"><?php echo $titleErr?>Title is required</div>
  </div>
  <div class="mb-3">
    <label for="desctiption" class="form-label">Description</label>
    <textarea  class="form-control <?php echo $descriptionErr ? 'is-invalid' : null ?>" id="desctiption" rows="3" name="description" required><?php echo $description;?></textarea>
    <div class="invalid-feedback"><?php echo $descriptionErr?>Description is required</div>
  </div>
  <div class="mb-3">
    <label for="transaction_type" class="form-label">Transaction Type</label>
    <select class="form-select" aria-label="Default select example" name="transaction_type">
      <option>income</option>
      <option>expense</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number"  class="form-control <?php echo $amountErr ? 'is-invalid' : null ?>" id="amount" name="amount" value="<?php echo $amount;?>" required/>
    <div class="invalid-feedback"><?php echo $amountErr?>Amount is required</div>
  </div>
  <button type="submit" class="btn btn-primary">Add Transaction</button>
</form>

</div>


