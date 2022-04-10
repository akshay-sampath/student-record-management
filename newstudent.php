<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php

$fullnameErr = $branchErr  = $emailErr = $phoneErr = $RegistrationErr =  NULL;
$fullname = $branch  =  $email = $phone = $Registration = NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

  if (empty($_POST["full_name"])) {
    $fullnameErr = "Name is required";
    $flag = false;
  } else {
    $fullname = test_input($_POST["full_name"]);
    if (!preg_match('/^^[a-zA-Z]$/',$fullname)) {
      $fullnameErr = "Invalid Name entered";
  }
  }

  if (empty($_POST["branch"])) {
    $branchErr = "Branch is required";
    $flag = false;
  } else {
    $branch = test_input($_POST["branch"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$branch)) {
      $usernameErr = "Invalid Branch name entered";
  }
  }

  if (empty($_POST["Registration_number"])) {
    $RegistrationErr = "Registration number is required";
    $flag = false;
  } else {
    $Registration = test_input($_POST["Registration_number"]);
    if (!preg_match('/^^[0-9]$/',$Registration)) {
      $passwordErr = "Invalid Registration number entered";
  }
  }


  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
    $flag = false;
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match('/^^[0-9]$/',$phone)) {
      $phoneErr = "Phone number is invalid" ;
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
    header("Location:students.php");
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
<?php include('header.php') ?>
<div class="form">
    <div class="form-title">Add a Student</div>
    <div class="content">

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="user-details">

          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="full_name" type="text" placeholder="Enter Full Name" />
            <div class="error">
            <?= $fullnameErr; ?>
            </div>
          </div>
          

          <div class="input-box">
            <span class="details">Registration Number</span>
            <input name="Registration_number" type="number" placeholder="Enter Registration Number" >
            <div class="error">
            <?= $RegistrationErr; ?>
            </div>
          </div>

        <div class="input-box">
            <span class="details">Email</span>
            <input name="email" type="text" placeholder="Enter Email" >
            <div class="error">
            <?= $emailErr; ?>
            </div>
          </div>  

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input name="phone" type="number" placeholder="Enter Contact Number" >
            <div class="error">
            <?= $phoneErr; ?>
            </div>
          </div>

          <div class="input-box">
            <span class="details">Branch</span>
            <input name="branch" type="text" placeholder="Enter Branch Name" >
            <div class="error">
            <?= $branchErr; ?>
            </div>
          </div>
          
        </div>
        <div class="gender-details">
          <span>Gender</span>
          <div>
          <input type="radio" name="gender" >Male
          </div>
          <div>
          <input type="radio" name="gender" >Female
          </div>
          <div>
          <input type="radio" name="gender" >Prefer not to say
          </div>
        </div>

        <div class="button">
          <input name="submit" type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>