<?php
@include 'config.php';
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'recipe');

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch recipes from the database
$sql = "SELECT recipe_id, name, time, category, tags, ingrediants, steps, image FROM recipes_data";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

$recipes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}
$conn->close();

// Function to filter recipes by category
function filterRecipesByCategory($recipes, $category) {
  return array_filter($recipes, function($recipe) use ($category) {
      return strtolower($recipe['category']) === strtolower($category);
  });
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style.css-->
    <link rel="stylesheet" href="CSS/lunch.css">
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Created date-->
    <meta name="date-created" content="2022-04-10">
    <!--Author-->
    <meta name="author" content="Katrin Dianov">  
    <!--KeyWords-->
    <meta name="keywords" content="PCOS">
    <!--Other-->
    <title>Snack recipes</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
</head>
<body>
    <!--Navigation Bar-->
    <?php include_once('header.php'); ?>

    <!-- Hero Section-->
    <div class="hero_section">
        <div class="hero_text">
            <h1></h1>
            <div class="short__line">
                <p></p>
            </div>
        </div>
    </div>
    <?php
    // Get the current page
    $current_page = basename($_SERVER['PHP_SELF'], ".php");

    // Determine the category based on the current page
    $category = "";
    if ($current_page === "breakfast") {
        $category = "Breakfast";
    } elseif ($current_page === "snack") {
        $category = "Snack";
    } elseif ($current_page === "dessert") {
        $category = "Dessert";
    }

    // Filter recipes by the determined category
    $filtered_recipes = filterRecipesByCategory($recipes, $category);

    // Display filtered recipes
    foreach ($filtered_recipes as $recipe): ?>
        <div class="blog-card">
            <div class="meta">
                <div class="photo" style="background-image: url(<?php echo htmlspecialchars($recipe['image']); ?>)"></div>
                <ul class="details">
                    <li class="category"><?php echo htmlspecialchars($recipe['category']); ?></li>
                    <li class="time"><?php echo htmlspecialchars($recipe['time']); ?></li>
                    <li class="tags">
                        <ul>
                            <?php 
                            $tags = explode(',', $recipe['tags']);
                            foreach ($tags as $tag): ?>
                                <li><?php echo htmlspecialchars(trim($tag)); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="description">
                <h1><?php echo htmlspecialchars($recipe['name']); ?></h1>
                <p><?php echo nl2br(htmlspecialchars($recipe['ingrediants'])); ?></p>
                <p><?php echo nl2br(htmlspecialchars($recipe['steps'])); ?></p>
                <p class="read-more">
                    <a href="#">Read More</a>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

    <!--Footer-->
    <?php include_once('footer.php'); ?>
</body>
</html>
