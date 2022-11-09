<?php

require_once('./config/db.php');
include('./config/session.php');
include('./partials/header.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$wish_title = $wish_amount = "";
$wish_titleErr = $wish_amountErr = "";

$userid = $_SESSION['user_id'];


if($_SERVER["REQUEST_METHOD"] == "GET") {
    $wish_id = $_GET["id"];
    $sql = "SELECT * FROM wish WHERE wish_id='$wish_id'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        $wish_title = $_GET['wish_title'] = $row["wish_title"];
        $wish_amount = $_GET['wish_amount'] = $row["wish_amount"];
    }
}else {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $wish_id = $_POST['wish_id'];

            if (empty($_POST['title1'])){
                $wish_titleErr = "Title is required";
            } else {
                $wish_title = test_input($_POST["title1"]);
            }
            if(empty($_POST['amount1'])) {
                $wish_amountErr = "Amount is required";
            } else {
                $wish_amount = abs(test_input($_POST["amount1"]));
            }if($wish_titleErr || $wish_amountErr){
                $wish_titleErr = $wish_titleErr;
                $wish_amountErr = $wish_amountErr;
            }else{


            $sql = "UPDATE wish 
                    SET wish_title='$wish_title', wish_amount='$wish_amount', wish_id='$wish_id', wish_user_id='$userid' 
                    WHERE wish_id='$wish_id'";

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

<div class="container top-space" >

<form class="needs-validation" novalidate method="POST" action="edit_wish.php">
  <input type="hidden" name="wish_id" value=<?php echo $wish_id ?> />
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control <?php echo $wish_titleErr ? 'is-invalid' : null ?>" id="title" name="title1" value="<?php echo $wish_title;?>" required/>
    <div class="invalid-feedback"><?php echo $wish_titleErr?></div>
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number"  class="form-control <?php echo $wish_amountErr ? 'is-invalid' : null ?>" id="amount" name="amount1" value="<?php echo $wish_amount;?>" required/>
    <div class="invalid-feedback"><?php echo $wish_amountErr?></div>
  </div>
  <button type="submit" class="btn btn-primary">Update Wish</button>
</form>

</div>


