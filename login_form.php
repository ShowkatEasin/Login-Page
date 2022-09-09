
<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email= mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5 ($_POST['password']);
    

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['usermail'] = $email;
        header ('location:welcome.php');
    } else{
        $error [] = 'incorrect email or password';
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
<div>
    <form action="" method="post">
    <h3>Login now</h3>
    <?php
    if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }

    }
    ?>
    <input type="email" name="usermail" placeholder="Enter your Email" class="box" required>
    <input type="password" name="password" placeholder="Enter your Password" class="box" required>
    <input type="Submit" value="Login now" name="submit" class="form-btn">
    <p>Don't have an account? <a href="register_form.php">Register now</a></p>
    </form>
</div>
</div>







</body>
</html>