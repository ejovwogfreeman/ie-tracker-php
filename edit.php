<?php

require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$title = $description = $amount = $transaction_type = "";
$titleErr = $descriptionErr = $amountErr = "";

$userid = $_SESSION['user_id'];


if($_SERVER["REQUEST_METHOD"] == "GET") {
    $transaction_id = $_GET["id"];
    $sql = "SELECT * FROM transactions WHERE transaction_id='$transaction_id'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        $title = $_GET['title'] = $row["title"];
        $description  = $_GET['description'] = $row["description"];
        $transaction_type = $_GET['transaction_type'] = $row["transaction_type"];
        $amount = $_GET['amount'] = $row["amount"];
    }
}else {

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST['transaction_id'];
    $title = test_input($_POST["title"]);
    $description = test_input($_POST["description"]);
    $amount = abs(test_input($_POST["amount"]));
    $transaction_type = test_input($_POST["transaction_type"]);

    echo $title;
    do {
    $sql = "UPDATE transactions 
            SET title='$title', description = '$description', amount='$amount', transaction_type='$transaction_type', transaction_id='$transaction_id', user_id='$userid' 
            WHERE transaction_id='$transaction_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: transactions.php");
        // exit();
    }else {
        echo 'There is an error in connection: ' . mysqli_connect_error();
    }
    }while (false);
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
  .top-space {
        padding: 100px 0px 30px;
    }
</style>

<div class="container top-space" >

<form class="needs-validation" novalidate method="POST" action="edit.php">
    <input type="hidden" name="transaction_id" value=<?php echo $transaction_id ?> />
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
  <button type="submit" class="btn btn-primary">Update Transaction</button>
</form>

</div>


