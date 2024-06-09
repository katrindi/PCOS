<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style.css-->
    <link rel="stylesheet" href="Style/navBar.css">
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Created date-->
    <meta name="date-created" content="2022-04-10">
    <!--Author-->
    <meta name="author" content="Katrin Dianov">  
    <!--KeyWords-->
    <meta name="keywords" content="FOOD , Easy recipes">
    <!--Other-->
    <meta name="viewport" content="width=device-width">
    <meta charset="UTF-8">
    <!-- Ensure jQuery is included before your script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <!--Navigation Bar-->
    <nav class="nav">
        <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="user_page.php">Home</a></li>
                <li><a href="info.php">Articles</a></li>
                <li><a href="tracker.php">Tracker</a></li>
                <li><a href="#news">ToDo list</a></li>
                <li><a href="logout_form.php"><i class="fa fa-sign-out-alt"></i></a></li>
        </ul>  
        <ul>
            <li><a href="user_page.php">PCOS</a></li>
            <li class="hideOnMobile"><a href="tracker.php">Tracker</a></li>
            <div class="dropdown">
              <button class="dropbtn">Recipes
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="breakfast.php">Breakfast</a>
                <a href="lunch.php">Lunch</a>
                <a href="dessert.php">Desserts</a>
                <a href="snack.php">Snacks</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Articles
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="info.php">Blood Test Parameters</a>
                <a href="">Nutrition and Diet</a>
                <a href="">Mental Health and Well-being</a>
                <a href="">Fertility and Pregnancy</a>
                <a href="">Latest Research and Updates</a>
              </div>
            </div>
            <li class="hideOnMobile"><a href="logout_form.php"><i class="fa fa-sign-out-alt"></i></a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26px" viewBox="0 0 24 24" width="26px" fill="#5f6368"><path d="M3 18h18v-2L3 16v2zM3 13h18v-2L3 11v2zM3 6v2h18V6H3z"></svg></a></li>
        </ul>
    </nav>

    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.nav .sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.nav .sidebar')
            sidebar.style.display = 'none'
        }
    </script>
</body>
</html>