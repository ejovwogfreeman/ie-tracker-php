<?php

require_once('./config/db.php');
session_start();
include('./partials/header.php');

// define variables and set to empty values
$email = $password = "";
$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
    }
    $password = test_input($_POST["password"]);
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
        $encrypted_password = hash('md5', $password);

        // check if user exist in database
        $sql_user = "SELECT * FROM users WHERE email = '$email' AND password='$encrypted_password'";
        $result = mysqli_query($conn, $sql_user);

        if($emailErr || $passwordErr){
            $emailErr = $emailErr;
            $passwordErr = $passwordErr;
            
        }elseif(mysqli_num_rows($result) > 0) {
            // session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['sur_name'] = $row['sur_name'];
            $_SESSION['email'] = $row['email'];

            $_SESSION['message'] = "You have logged in successfully!";

            header("Location: dashboard.php");

        }else {
            $emailErr = $passwordErr = "Invalid Email or Password";
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

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h3 class="mt-3 mb-4 text-center">
      <i class="bi bi-coin"></i>
      IE-Tracker
    </h3>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></div><input class="form-control <?php echo $emailErr ? 'is-invalid' : null ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $email;?>" ></div>
      <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
      <div><small class="text-danger"><?php echo $emailErr?></small></div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></div><input type="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : null ?>" id="exampleInputPassword1" name="password" value="<?php echo $password;?>" ></div>
      <div><small class="text-danger"><?php echo $passwordErr?></small></div>
    </div>
    <button type="submit" class="btn btn-primary">Sign In</button>
    <div class="mt-3"><small>New Here? <a href="signup.php">sign up</a></small></div>
  </form>

</div>

<?php include('./partials/footer.php') ?>
