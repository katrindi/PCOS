<?php
@include 'config.php';
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'articles');

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch articles from the database
$sql = "SELECT article_id, title, sub_title, description, image, tags, author, date FROM atricle_data";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

$articles = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- style.css-->
    <link rel="stylesheet" href="CSS/infocard.css">
    <!--Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Created date-->
    <meta name="date-created" content="2022-04-10">
    <!--Author-->
    <meta name="author" content="Katrin Dianov">  
    <!--KeyWords-->
    <meta name="keywords" content="PCOS">
    <!--Other-->
    <title>Articles</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">

</head>

<body>
    <!--Navigation Bar-->
    <?php include_once('header.php'); ?>

    <!-- Hero Section-->
    <?php foreach ($articles as $article) : ?>
      <div class="hero_section">
        <div class="hero_text">
            <div class="short__line">
            </div>
          </div>
        </div>

      <div class="blog-card">
          <div class="meta">
            <div class="photo" style="background-image: url(<?php echo $article['image']; ?>)"></div>
            <ul class="details">
              <li class="author"><?php echo $article['author']; ?></li>
              <li class="date"><?php echo $article['date']; ?></li>
              <li class="tags">
                <ul>
                  <?php 
                  $tags = explode(',', $article['tags']);
                  foreach ($tags as $tag): ?>
                      <li><?php echo $tag; ?></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            </ul>
          </div>
          <div class="description">
            <h1><?php echo $article['title']; ?></h1>
            <h2><?php echo $article['sub_title']; ?></h2>
            <p><?php echo $article['description']; ?></p>
            <p class="read-more">
            <a href="#">Read More about <?php echo $tag; ?></a>
            </p>
          </div>
        </div>
    <?php endforeach; ?>

    <!--Footer-->
    <?php include_once('footer.php'); ?>
  </body>
</html>
