<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        $error[] = 'user already exist!';

    } else {

        if($pass != $cpass){
            
            $error[] = 'password not matched!';

        } else{

            $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style.css-->
    <link rel="stylesheet" href="CSS/style.css">
    <!--Bootsrap Grid System-->
    <link rel="stylesheet" href="CSS/bootstrap-grid.css">
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Created date-->
    <meta name="date-created" content="2022-04-10">
    <!--Author-->
    <meta name="author" content="Katrin Dianov">  
    <!--KeyWords-->
    <meta name="keywords" content="PCOS">
    <!--Other-->
    <title>Registration</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <!--Title-->
    <title> Register form </title>
    <!--JS-->
    <script src="app.js" defer></script>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3> Register now </h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg"> '.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="Enter your name">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="password" name="cpassword" required placeholder="Confirm your password">
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">login now</a></p>
        </form>
    </div>
</body>
</html>
