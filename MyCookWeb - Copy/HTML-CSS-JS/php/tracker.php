<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="Style/tracker.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracker</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"/>
  </head>
  <body>
    <!--Navigation Bar-->
    <?php
        include_once('header.php')
    ?>

    <!-- Hero Section-->
    <div class="hero_section">
      <div class="hero_text">
        <h1>Health Measures Tracker</h1>
          <div class="short__line">
            <p>Here you can set your new values and find your history</p>
          </div>
        </div>
      </div>
      
      <div class="wrapper">
      <div class="container">
        <div class="sub-container">
          <!-- Weight-->
          <div class="weight-container"> 
            <h3>Weight</h3>
            <!--weight-error-->
            <p class="hide error" id="weight-error">
              Value cannot be empty or negative
            </p>
            <!-- weight-amount-->
            <input
              type="number"
              id="weight-amount"
              placeholder="Enter your weight" 
            />
            <!-- weight-button-->
            <button class="submit" id="weight-button">Set</button>
          </div>


          <!-- Test Blood -->
          <!-- blood-test-container -->
          <div class="blood-test-container">
            <h3>Blood test values</h3>
            <p class="hide error" id="blood-test-error">
              Values cannot be empty or negative
            </p>
            <input
              type="number"
              id="testosterone-level"
              placeholder="Enter the Tostosterone level"
            />
            <input
              type="number"
              id="lh-level"
              placeholder="Enter the LH level"
            />
            <button class="submit" id="blood-btn">Set values</button>
          </div>
        </div>

        <!-- Output -->
        <div class="output-container flex-space">
          <button class="submit" id="input-btn">INPUT!</button>
          <div>
            <p>Wight</p>
            <span id="weight">0</span>
          </div>
          <div>
            <p>Tostosterone</p>
            <span id="testosterone-value">0</span>
          </div>
          <div>
            <p>LH</p>
            <span id="lh-value">0</span>
          </div>
        </div>
      </div>

      <!-- List -->
      <div class="list">
        <h3>Health Measures History</h3>
        <div class="list-container" id="list"></div>
      </div>
    </div>

    <!--Footer-->
    <?php
        include_once('footer.php')
    ?>
    <!-- Script -->
    <script src="JS/traacker.js"></script>
  </body>
</html>