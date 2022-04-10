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

$fullnameErr = $cityErr  = $emailErr = $phoneErr = $countryErr= $stateErr = $pincodeErr = $school1Err = $schoolErr = $certificate1Err = $certificateErr =  "";
$fullname = $city  = $email = $phone = $country= $state = $pincode = $school1 = $school = $certificate1 = $certificate = "  ";

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

  if (empty($_POST["fullname"])) {
    $fullnameErr = "Name is required";
    $flag = false;
  } else {
    $fullname = test_input($_POST["fullname"]);
    if (!preg_match('/^^[a-zA-Z]$/',$fullname)) {
      $fullnameErr = "Invalid Name entered";
  }
  }

  if (empty($_POST["city"])) {
    $cityErr = "City is required";
    $flag = false;
  } else {
    $city = test_input($_POST["city"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$city)) {
      $cityErr = "Invalid City name entered";
  }
  }

  if (empty($_POST["state"])) {
    $stateErr = "state is required";
    $flag = false;
  } else {
    $state = test_input($_POST["state"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$state)) {
      $stateErr = "Invalid state name entered";
  }
  }

  if (empty($_POST["country"])) {
    $countryErr = "country is required";
    $flag = false;
  } else {
    $country = test_input($_POST["country"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$country)) {
      $countryErr = "Invalid Country name entered";
  }
  }

  if (empty($_POST["pincode"])) {
    $pincodeErr = "pincode is required";
    $flag = false;
  } else {
    $pincode = test_input($_POST["pincode"]);
    if (!preg_match('/^([0-9 ]+)$/',$pincode)) {
      $usernameErr = "Invalid pincode entered";
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

  if (empty($_POST["school"])) {
    $schoolErr = "school is required";
    $flag = false;
  } else {
    $school = test_input($_POST["school"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$school)) {
      $schoolErr = "Invalid school name entered";
  }
  }

  if (empty($_POST["school1"])) {
    $school1Err = "school is required";
    $flag = false;
  } else {
    $school1 = test_input($_POST["school1"]);
    if (!preg_match('/^([a-zA-Z ]+)$/',$school1)) {
      $school1Err = "Invalid school name entered";
  }
  }

  if (empty($_POST["certificate"])) {
    $certificateErr = "certificate is required";
    $flag = false;
  } else {
    $certificate = test_input($_POST["certificate"]);
  }

  if (empty($_POST["certificate1"])) {
    $certificate1Err = "certificate is required";
    $flag = false;
  } else {
    $certificate1 = test_input($_POST["certificate1"]);
  
}

if($flag){
  echo "<script>alert('Document Uploaded sucessfully');</script>";
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
<div class="documents">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <div class="personal-info">
       <span class="personal-header">Personal Information</span>
       
       <div class="per">
          <div class="box">
            <span class="box-input">Full Name</span>
            <input type="text" class="input" name="fullname" placeholder="Enter Your Full Name" >
            <div class="error">
            <?= $fullnameErr; ?>
            </div>
          </div>

          <div class="box">
            <span class="box-input">Contact Number</span>
            <input type="text" class="input" name="phone" placeholder="Enter Your Contact Number" >
            <div class="error">
            <?= $phoneErr; ?>
            </div>
          </div>

          <div class="box">
            <span class="box-input">Email</span>
            <input type="text" class="input" name="email" placeholder="Enter Your Email" >
            <div class="error">
            <?= $emailErr; ?>
            </div>
          </div>
       </div>
        <div class="address">
          <span class="box-input">Address</span>
          <div class="box">
            <div class="subbox">
            <input type="text" class="input" name="city" placeholder="City" >
            <div class="error">
            <?= $cityErr; ?>
            </div>
            </div>
            <div class="subbox">
            <input type="text" class="input" name="state" placeholder="State">
            <div class="error">
            <?= $stateErr; ?>
            </div>
            </div>
           <div class="subbox">
           <input type="text" class="input" name="pincode" placeholder="Pincode">
           <div class="error">
            <?= $pincodeErr; ?>
            </div>
           </div>
           <div class="subbox">
           <input type="text" class="input" name="country" placeholder="Country">
           <div class="error">
            <?= $countryErr; ?>
            </div>
           </div>
          </div>
        </div>
    </div>

    <hr>  

    <div class="education">
      <span class="certificate">Certificates</span>
        <div class="box">
          <span class="box-input">10th Class</span>
         <div class="subbox">
         <input type="text" class="school" name="school1" placeholder="Enter your School Name" >
         <div class="error">
            <?= $school1Err; ?>
            </div>
         </div>
         <div class="subbox">
         <input type="file" class="input" name="certificate1" >
         <div class="error">
            <?= $certificate1Err; ?>
            </div>
         </div>
        </div>
        <div class="box">
          <span class="box-input">12th Class</span>
          <div class="subbox">
          <input type="text" class="school" name="school" placeholder="Enter your School Name" >
          <div class="error">
            <?= $schoolErr; ?>
            </div>
          </div>
          <div class="subbox">
          <input type="file" class="input" name="certificate" >
          <div class="error">
            <?= $certificateErr; ?>
            </div>
          </div>
        </div>
    </div>

    <hr>

    <div class="button">
      <input type="submit" name="submit" value="Submit" >
    </div>

  </form>
</div>
</body>
</html>