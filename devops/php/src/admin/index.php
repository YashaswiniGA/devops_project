<?php
$hostName = 'db';
$dbUser = 'YashaswiniGA';
$dbPassword = 'root';
$dbName = 'leaveapproval';
$connect = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
session_start();
if (!$connect) {
    die("Something went wrong;");
}

        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
            //require_once "database.php";
            $sql = "SELECT * FROM adminlogin WHERE username = '$username'";
            $result = mysqli_query($connect, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if ($password=== $user["password"]){
                    $_SESSION['username'] = $username;
                    $_SESSION["adminlogin"] = "yes";
                    header("location:admin-dashboard.php");
                }
                else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        <?php include "login.css" ?>
    </style>
    <title>Login Page</title>
</head>
 
<body>

    <form method="post">
        <div class="login-box">
            <h1>Login</h1>
 
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="username" value="">
            </div>
 
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>
 
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
</body>
 
</html>