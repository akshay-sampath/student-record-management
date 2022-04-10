<?php
require('connection.php');
error_reporting(0);
session_start();

    #php code for Login form
    if(isset($_POST['login']))
    {
        $query="SELECT * FROM `registred_users` WHERE  `email`='$_POST[email_username]' OR `user_name`='$_POST[email_username]' ";
        $result=mysqli_query($con,$query);

        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if(password_verify($_POST['password'],$result_fetch['password']))
                {
                    #if password matched
                    $_SESSION['logged_in']=true;
                    $_SESSION['username']=$result_fetch['username'];
                    echo "<script>
                        alert('Logged in Successfully');
                        window.location.href='Home.php';   
                    </script>";
                    
                }
                else
                {
                    #if password doesn't match
                    echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                        Incorrect Password
                        <br><br>
                        <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Try Again</a>
                    </p>";
                }
            }
            else
            {
                echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                    Email or Username Not Registered
                    <br><br>
                    <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Try Again</a><br>
                    <a href='Register.php' style='font-size:20px; text-decoration: none; color: blue;'>Register</a>
                </p>";
            }
        }
        else
        {
                echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                    Cannot Run Query
                    <br><br>
                    <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Try Again</a>
                </p>";
        }
    }


    #php code for Registration form
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register']))
    {
        $user_exist_query="SELECT * FROM `registred_users` WHERE `user_name`='$_POST[username]' OR `email`='$_POST[email]' ";
        $result=mysqli_query($con,$user_exist_query);
        if($result)
        {
            if(mysqli_num_rows($result)>0) #it will be executed if username and email is already taken
            {
                #if any user has already taken
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['username']==$_POST['username'])
                {
                    #error for username already registered
                    echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                        $result_fetch[username] User Name Already taken
                        <br><br>
                        <a href='Register.php' style='font-size:20px; text-decoration: none; color: blue;'>Register Again</a>
                    </p>";
                }
                else
                {
                    #error for email already registered
                   
                    echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                        $result_fetch[email] Email Already Registered
                        <br><br>
                        <a href='Register.php' style='font-size:20px; text-decoration: none; color: blue;'>Register Again</a>
                    </p>";
                }
            }
            else
            {
                $password=password_hash($_POST['password'],PASSWORD_BCRYPT); #encryption for the password to make secure
                $query="INSERT INTO `registred_users`(`full_name`, `user_name`, `email`, `mobile`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$_POST[mobile]','$password')";
                if(mysqli_query($con,$query))
                {
                    #if data inserted succesfully
                    
                    echo "<p style='padding:50px; color: white; text-align:center; background-color: lightgreen; font-size:50px;border-radius:15px;'>
                        Registration Done Successfully
                        <br><br>
                        <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Login</a>
                    </p>";
                }
                else{
                    #if data cannot be inserted
                    echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                        Cannot Run Query
                        <br><br>
                        <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Try Again</a>
                    </p>";
                }
            }
        }
        else
        {
            
            echo "<p style='padding:50px; color: white; text-align:center; background-color: #FFB6C1; font-size:50px;border-radius:15px;'>
                Cannot Run Query
                <br><br>
                <a href='index.php' style='font-size:20px; text-decoration: none; color: blue;'>Try Again</a>
            </p>";
        }
    }
?>