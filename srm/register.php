<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$usernameErr = $passwordErr  = $emailErr = $confirmpasswordErr =  NULL;
$username = $password  =  $email = $confirmpassword = NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register']))
{

  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
    $flag = false;
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match('/^^[a-zA-Z0-9\-\_\.]{5,}$/',$username)) {
      $usernameErr = "Invalid username entered";
  }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $flag = false;
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match('/^^[a-zA-Z0-9\-\_\.]{5,}$/',$password)) {
      $passwordErr = "Invalid password entered";
  }
  }


  if (empty($_POST["confirm_password"])) {
    $confirmpasswordErr = "Confrim password is required";
    $flag = false;
  } else {
    $confirmpassword = test_input($_POST["confirm_password"]);
    if ($confirmpassword != $password) {
      $confirmpasswordErr = "Confirm password must match password";
  }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag = false;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email entered";
  }
  }

  if($flag){
    header("Location:login.php");
  }
  }


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>





<center class="login-title"> STUDENT <span> RECORD</span> MANAGEMENT</center>
<div class="reg">
    <div class="head">
    <a class="form-title login-click" href="login.php">LOGIN</a>
    <a class="form-title signup-click" href="register.php">REGISTER</a>
    </div>
    
    <div class="content">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="user-details">

        <div class="input-box">
            <span class="details">Email</span>
            <input name="email" type="text" placeholder="Enter Your Email" />
            <div class="error">
              <?= $emailErr; ?>
            </div>
          </div> 

          <div class="input-box">
            <span class="details">Userame</span>
            <input name="username" type="text" placeholder="Enter Your Username" />
            <div class="error">
            <?= $usernameErr; ?>
            </div>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input name="password" type="password" placeholder="Enter your password" />
            <div class="error">
            <?= $passwordErr; ?>

            </div>
          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input name="confirm_password" type="password" placeholder="Enter your password" />
            <div class="error">
            <?= $confirmpasswordErr; ?>

            </div>
          </div>

          <div class="button submit">
          <input name="register" type="submit" value="REGISTER">
        </div>
        
   </div>
</form>
</body>
</html>