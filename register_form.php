

<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email= mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5 ($_POST['password']);
    $cpass = md5 ($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist';
    } else{
        if($pass != $cpass){
            $error[] = 'password not match!';
        }else{
            $insert = "INSERT INTO user_form(email, password) VALUES('$email', '$pass')";
            mysqli_query($conn, $insert);
            ('location: login_form.php');
        }
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>

   <!-- css custom link -->

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
    <h3>Register now</h3>
    <?php
    if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }

    }
    ?>
    <input type="email" name="usermail" placeholder="Enter your Email" class="box" required>
    <input type="password" name="password" placeholder="Enter your Password" class="box" required>
    <input type="password" name="cpassword" placeholder="Confirm your Password" class="box" required>
    <input type="Submit" value="Register now" name="submit" class="form-btn">
    <p>Already have an account? <a href="login_form.php">Login now</a></p>
    </form>
</div>







</body>
</html>