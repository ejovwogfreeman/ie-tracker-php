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
            $transaction_type = test_input($_POST["transaction_type"]);

            if (empty($_POST['title'])){
                $titleErr = "Title is required";
            } else {
                $title = test_input($_POST["title"]);
            }
            if(empty($_POST['description'])){
                $descriptionErr = "Description is required";
            } else {
                $description = test_input($_POST["description"]);
            }
            if(empty($_POST['amount'])) {
                $amountErr = "Amount is required";
            } else {
                $amount = abs(test_input($_POST["amount"]));
            }if($titleErr || $descriptionErr || $amountErr){
                $titleErr = $titleErr;
                $descriptionErr = $descriptionErr;
                $amountErr = $amountErr;
            }else{


            $sql = "UPDATE transactions 
                    SET title='$title', description = '$description', amount='$amount', transaction_type='$transaction_type', transaction_id='$transaction_id', user_id='$userid' 
                    WHERE transaction_id='$transaction_id'";

            if(mysqli_query($conn, $sql)){
                header("Location: dashboard.php");
            }else {
                echo 'There is an error in connection: ' . mysqli_connect_error();
            }
        }
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
  .offcanvas {
    --bs-offcanvas-width: 300px;
  }
  .top-space {
    padding: 150px 0px 80px;
  }
  form {
    width: 500px;
    margin: auto;
    background-color: #ebecf0;
    padding: 20px;
    border-radius: 5px;
  }
  @media screen and (max-width: 768px) {
    form {
      width: 95%;
    }
  }
</style>

<div class="container top-space" id="home">

<form class="needs-validation" novalidate method="POST" action="edit.php">
<h5>Update Transaction Form</h5>
  <hr>
  <input type="hidden" name="transaction_id" value=<?php echo $transaction_id ?> />
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control <?php echo $titleErr ? 'is-invalid' : null ?>" id="title" name="title" value="<?php echo $title;?>" required/>
    <div class="invalid-feedback"><?php echo $titleErr?></div>
  </div>
  <div class="mb-3">
    <label for="desctiption" class="form-label">Description</label>
    <textarea  class="form-control <?php echo $descriptionErr ? 'is-invalid' : null ?>" id="desctiption" rows="3" name="description" required><?php echo $description;?></textarea>
    <div class="invalid-feedback"><?php echo $descriptionErr?></div>
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
    <div class="invalid-feedback"><?php echo $amountErr?></div>
  </div>
  <button type="submit" class="btn btn-primary">Update Transaction</button>
  <a href="transactions.php" class="btn btn-secondary">Cancel</a>
</form>

</div>

<?php include('./partials/footer.php') ?>


