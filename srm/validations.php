<?php

$usernameErr = $passwordErr  = $emailErr =  NULL;
$username = $password  =  $email  = NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
    $flag = false;
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $flag = false;
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag = false;
  } else {
    $email = test_input($_POST["email"]);
  }
  $confirm_password = $_POST["confirm_password"];

  // submit form if validated successfully
  if ($flag) {

    $conn = mysqli_connect('localhost','root','','php') or die("Connection Failed : ".mysqli_connect_error());
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // echo "$name $email $phone_num $blood_gr";

        $sql = "INSERT INTO users (username, email, password)VALUES('$username','$email','$password')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<h2> Added Data Successfully. </h2>";
        } else {
            echo "<h2> There was an error in adding the data. </h2>";
        }
    }

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