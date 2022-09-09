
<?php 

@include 'config.php';

session_start();

if (!isset($_SESSION['usermail'])){
    header ('location:login_form.php');
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <div class="content">
            <h3>Welcome</h3>
            <p>Your registration is successfully done.
             Here also show your Email which you used. Now you can logout if you want. Thank you for your registration.
            </p>
            <p>Your email : <span><?php echo$_SESSION['usermail']?></span></p>
            <a href="logout.php" class="logout">Logout</a>
        </div>

    </div>
</body>
</html>