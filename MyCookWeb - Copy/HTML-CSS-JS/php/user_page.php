<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style.css-->
    
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Created date-->
    <meta name="date-created" content="2022-04-10">
    <!--Author-->
    <meta name="author" content="Katrin Dianov">  
    <!--KeyWords-->
    <meta name="keywords" content="FOOD, Easy recipes, PCOS">
    <!--Other-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- Ensure jQuery is included before your script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PCOSymptoRelief</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            color: #333;
        }

        .container {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .content {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px; 
            margin: 0 auto;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #c476c4; 
        }

        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #c476c4;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px; 
        }

        .btn:hover {
            background-color: #a650a6;
        }

        .info-section {
            margin-bottom: 50px; 
            text-align: left; 
            border-top: 1px solid #eee; 
            padding-top: 40px; 
            padding-left: 20px; 
        }

        .info-section h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #c476c4; 
        }

        .info-section p {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.6; 
        }

        .info-section ul {
            list-style: none;
            padding: 0;
        }

        .info-section ul li {
            margin-bottom: 10px;
        }

        .info-section ul li:before {
            content: '\2022'; 
            color: #c476c4; 
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .image-wrapper {
            margin-top: 50px
            margin-bottom: 10px;
        }

        .pcos-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <!--Navigation Bar-->
    <?php
        include_once('header.php')
    ?>


    <div class="container">
        <div class="content">
            <h1>Welcome, <span><?php echo $_SESSION['user_name']?></span></h1>
            <p>This is your PCOS account. Start to explore our resources and take control of your health.</p>

            <!-- Information Section -->
            <div class="info-section">
                <h2>About PCOS</h2>
                <p>Polycystic ovary syndrome (PCOS) is a hormonal disorder common among women of reproductive age. Here are some key facts about PCOS:</p>
                <ul>
                    <li>PCOS affects approximately 1 in 10 women.</li>
                    <li>Common symptoms include irregular periods, excess hair growth, acne, and weight gain.</li>
                    <li>PCOS is a leading cause of infertility.</li>
                    <li>Early
                    <li>Early diagnosis and management can help prevent long-term complications.</li>
                </ul>
            </div>

            <!-- PCOS Image -->
            <div class="image-wrapper">
                <img src="https://www.theultrasoundsuite.ie/wp-content/uploads/2021/04/Healthy-Ovary-Example-Copy-1024x514.jpg" alt="PCOS" class="pcos-image">
            </div>

            <!-- Action Button -->
            <a href="snack.php" class="btn">Explore PCOS-Friendly Recipes</a>
        </div>
    </div>


    <!--Footer-->
    <?php
        include_once('footer.php')
    ?>

</body>
</html>
