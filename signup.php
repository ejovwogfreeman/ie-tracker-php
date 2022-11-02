<?php

require_once('./config/db.php');
include('./partials/header.php');

// define variables and set to empty values
$username = $email = $password = $confirm_password = "";
$usernameErr = $emailErr = $passwordErr = $confirm_passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
      } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
          $usernameErr = "Only letters and white space allowed";
        }
      }
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // check if password is greater than 8 in length
        if(strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long";
        }
    }

    if (empty($_POST["confirm_password"])) {
        $confirm_passwordErr = "Confrim Password is required";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        // check if passwords match
        if($_POST['password'] !== $_POST['confirm_password']) {
            $passwordErr = $confirm_passwordErr = "The passwords do not match";
        }else {
            // hash or encrypt password
            $encrypted_password = hash('md5', $password);

            // check if user already exist
            $sql_email = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql_email);
            if (mysqli_num_rows($result) > 0) {
                $emailErr = "User with this email aready exist";
            }else {
                // check for any errorr in form fields
                if($usernameErr || $emailErr || $passwordErr || $confirm_passwordErr){
                    $usernameErr = $usernameErr;
                    $emailErr = $emailErr;
                    $passwordErr = $passwordErr;
                    $confirm_passwordErr = $confirm_passwordErr;
                }else{
                    // inserting new user into the database
                    $sql = "INSERT INTO users (username,email,password) VALUES('$username','$email','$encrypted_password')";

                    if(mysqli_query($conn, $sql)){
                        header('Location: signin.php');
                    }else {
                        die(mysqli_connect_error());
                    }
                }
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
<div class="mb-3">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></div><input class="form-control <?php echo $usernameErr ? 'is-invalid' : null ?>" id="exampleInputUsername" name="username" value="<?php echo $username;?>" ></div>
    <div><small class="text-danger"><?php echo $usernameErr?></small></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></div><input class="form-control <?php echo $emailErr ? 'is-invalid' : null ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $email;?>" ></div>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <div><small class="text-danger"><?php echo $emailErr?></small></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></div><input type="password" class="form-control <?php echo $passwordErr ? 'is-invalid' : null ?>" id="exampleInputPassword1" name="password" value="<?php echo $password;?>" ></div>
    <div><small class="text-danger"><?php echo $passwordErr?></small></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <div class="input-group"><div class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></div><input type="password" class="form-control <?php echo $confirm_passwordErr ? 'is-invalid' : null ?>" id="exampleInputPassword2" name="confirm_password" value="<?php echo $confirm_password;?>" ></div>
    <div><small class="text-danger"><?php echo $confirm_passwordErr?></small></div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
  <div class="mt-3"><small>Already have an account? <a href="signin.php">sign in</a></small></div>
</form>

</div>
<?php include('./partials/footer.php') ?>





<!-- $sql_email = "SELECT * FROM users where email = '$email'";

$result = mysqli_query($conn, $sql_email);

if (mysqli_num_rows($result) > 0) {
    $emailErr = "User with this email aready exist";
} -->