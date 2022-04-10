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

$subjectErr = $messageErr  =  NULL;
$subject = $message  =  NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

  if (empty($_POST["subject"])) {
    $subjectErr = "subject is required";
    $flag = false;
  } else {
    $subject = test_input($_POST["subject"]);
    if (!preg_match('/^^[a-zA-Z0-9\-\_\.]{5,}$/',$subject)) {
      $subjectErr = "Invalid subject entered";
  }
  }

  if (empty($_POST["message"])) {
    $messageErr = "message is required";
    $flag = false;
  } else {
    $message = test_input($_POST["message"]);
    if (!preg_match('/^^[a-zA-Z0-9\-\_\.]{5,}$/',$message)) {
      $messageErr = "Invalid message entered";
  }
  }

  if($flag){
    echo "<script>alert('Announcement sent sucessfully');</script>";
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
<div class="announcement-form">
  <div class="ctitle">
    <span>ANNOUNCEMENT</span>
  </div>
   <div class="cform">
   <form  action="announcement.php" method="post">
      <div class="user-details">

    <div class="input-box">
            <span class="details">Subject</span>
            <input name="subject" type="text" placeholder="Enter Your Subject" />
            <div class="error">
            <?= $subjectErr ?>
            </div>
      </div>
      <div class="input-box">
            <span class="details">Message</span>
            <textarea class="textarea" rows = "8" cols = "62" name="message">
            </textarea>
            <div class="error">
            <?= $messageErr ?>
            </div>
      </div>
    </div>
    <div class="button">
      <input name="submit" type="submit"  value="Send Message" />
    </div>
    </form>
   </div>
  </div>

</body>
</html>