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
<?php include('header.php') ?>
<div class="stu-data">
  <div class="add">
    <a href="newstudent.php">Add Student</a>
  </div>
  <div class="list">
    <table class="table">
      <tr class="row" id="header">
        <th>Full Name</th>
        <th>Reg Number</th>
        <th>Branch</th>
        <th>Gender</th> 
        <th>Email</th>
        <th>Contact</th>
      </tr>
      <tr class="row">
        <td>Tadikonda Akshay Sampath</td>
        <td>11904257</td>
        <td>CSE</td>
        <td>Male</td>
        <td>akshay@gmail.com</td>
        <td>830966395</td>
      </tr>
      <tr class="row" >
        <td>David</td>
        <td>254865</td>
        <td>EEE</td>
        <td>Male</td>
        <td>david4@gmail.com</td>
        <td>9866548525</td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>