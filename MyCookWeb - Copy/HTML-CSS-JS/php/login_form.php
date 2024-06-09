<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
       $row = mysqli_fetch_array($result);
       
       $_SESSION['user_name'] = $row['name']; 
       
       header('location:user_page.php');

    }
    else{
        $error[] = 'incorrect email or password!';
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
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <!--Title-->
    <title> Login form </title>
    <!--JS-->
    <script src="app.js" defer></script>
</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>