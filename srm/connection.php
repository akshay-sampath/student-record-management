<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{


// Create connection
$conn=mysqli_connect("localhost","root","","php");

// Check connection
if(isset($_POST['register']) )
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirm_password'];

$sql = "INSERT INTO registeruser(username,email,password,confirmpassword) VALUES('$username','$email','$password','$confirmpassword')";

$query = mysql_query($conn, $sql);

if($query){
  echo 'entry successful';
}else{
  echo 'entry failed';
}
}
}

?>