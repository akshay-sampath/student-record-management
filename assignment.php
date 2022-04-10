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

$optionErr = $assignmentErr  =  NULL;
$option = $assignment =  NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{

  if (empty($_POST["option"])) {
    $optionErr = "option is required";
    $flag = false;
  } else {
    $option = test_input($_POST["option"]);
    if (!preg_match('/^^[a-zA-Z0-9\-\_\.]{5,}$/',$option)) {
      $optionErr = "Invalid option entered";
  }
  }

  if (empty($_POST["assignment"])) {
    $assignmentErr = "assignment is required";
    $flag = false;
  } else {
    $assignment = test_input($_POST["assignment"]);
  }

  if($flag){
    echo "<script>alert('Assignment sent successfully');</script>";
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
<div class="assignment-form">
  <div class="box-2">
  <div class="atitle">ASSIGNMENTS</div>
    <div class="aform">
      <form method="post" action="assignment.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Section</span>
            <select name="option" class="input">
            <option value="option">Select</option>
            <option value="option1">KM001</option>
            <option value="option2">KM002</option>
            <option value="option3">KM003</option>
            <option value="option4">KM004</option>
            <option value="option5">KM005</option>
            <option value="option6">KM006</option>
            <option value="option7">KM007</option>
            <option value="option8">KM008</option>
            <option value="option9">KM009</option>
          </select>
          <div class="error">
            <?= $optionErr ?>
            </div>
         </div>

         <div class="input-box">
           <label for="file" class="details">Assignment File</label>
           <input class="inputfile" id="file" type="file" name="assignment" >
           <div class="error">
            <?= $assignmentErr ?>
            </div>
         </div>

         <div class="button">
          <input name="submit" type="submit" value="Submit">
        </div>
        </div>

        
      </form>
    </div>
  </div>
</div>
</body>
</html>