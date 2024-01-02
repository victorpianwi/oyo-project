<?php

require_once "config.php";

$plate = $plate_err = "";
$result = "";
$num = 5;

if(isset($_GET["search_button"])){

  if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    // Validate search
    if(empty(trim(strtoupper($_GET["search"])))){
        $plate_err = "Please enter plate number";
    } elseif(preg_match('/\^_\+\$=>-?/', trim(strtoupper($_GET["search"])))){
        $plate_err = "Plate number cannot contain symbols and underscores.";
    } else{
        $plate = trim(strtoupper($_GET["search"]));
    }
  
    if(empty($plate_err)){
      $sql = "SELECT * FROM okada_data WHERE plate = '$plate'";
      $statement = mysqli_query($connection, $sql);
      $result = $statement->fetch_assoc();
      
      if(!$result){
        $plate_err = "Plate Number does not match any";
      } else {
        $num = 6;
      }
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
    <title>Home || Oyo State Tricycle (keke napep) & Motorcycle (Okada) </title>
    <link rel="icon" href="img/cropped-oyo-logo-180x180.png">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .search{
        width: 90% !important;
        display: inline-block !important;
      }
      .search-label{
        display:block;
      }
    </style>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navContent sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="img/background.png" alt="" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item me-4">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item me-4">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item me-4">
                <a class="nav-link" href="#contact">Contact Us</a>
              </li>
              <li class="nav-item me-4">
                <a class="nav-link" href="login.php">Log In</a>
              </li>
              <li class="nav-item me-4">
                <a class="nav-link" href="signup.php">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <a href="#top" id="up-btn" style=" display: none"><button class="btn btn-outline-dark rounded-circle" style="width: 3rem; height: 3rem;position: absolute; right: 20px;bottom: 20px;position: fixed;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
      </svg></button></a>
      
      <!-- Slideshow container -->
<div class="slideshow-container" id="top">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="https://images.unsplash.com/photo-1595184993794-e940fb748a44?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80" style="width:100%">
    <div class="text">Register Your Tricycke(Keke napep)</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="https://images.unsplash.com/photo-1542990725-319ce3f87c0c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" style="width:100%">
    <div class="text">Register Your Motorcycle(Okada)</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="https://images.unsplash.com/flagged/photo-1568200041533-6ce36f2c0761?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" style="width:100%">
    <div class="text">Register Your Motorcycle(Okada)</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
<br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
  <div class="mb-3">
    <div style="width: 100%">
      <label for="search" class="form-label search-label">Search Plate</label>
      <input type="text" class="form-control search" id="search" name="search" value="<?= $result["plate"] ?? " "?>">
      <button type="submit" class="btn btn-primary" name="search_button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
    </div>
    <div>
      <span><?= $plate_err ?? "" ?></span>
    </div>
  </div>

  <?php if(isset($result["plate"])) :?>

  <?php if($num = 6) :?>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Gender</th>
        <th scope="col">Plate</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <?= $result["firstname"]?>
        </td>
        <td>
          <?= $result["lastname"]?>
        </td>
        <td>
          <?= $result["gender"]?>
        </td>
        <td>
          <?= $result["plate"]?>
        </td>
        <td>
          <?= $result["status"]?>
        </td>
      <tr>
    </tbody>
  </table>
</div>

  
  <?php endif; ?>

  <?php endif; ?>
  
</form>

<br>


<div class="container-fluid" id="about" style="text-align: center;">
  <h1>About Project</h1>
  <div class="container-fluid aboutContent" style="text-align: left;">
    <p>Profiling all the motorcycle (Okada) riders within the state by registering them under out platform for the Oyo State Government to curb the insecurity posed by the use of motorcycle (okada)</p>
    <br>
    <h2>Vision</h2>
    <p>Our vision is to see that the Oyo State Government have the data of all motorcycle (Okada) riders operating within the state to reduce the risk of insecurity and for accountability purpose</p>
    <br>
    <h2>Mission</h2>
    <ul>
      <li>Our Mission is to register all motorcycle (okada) riders with the use of our platform</li>
      <li>A unique number will be assigned to all riders for easily identification purposes</li>
      <li>The unique number will be generarted with systematically</li>
    </ul>
  </div>
</div>

<footer class="container-fluid" id="contact">
  <p><a href="mailto:deveighty9media@yahoo.com" style="text-decoration: none; color:wheat">DevEighty9media@yahoo.com</a></p>
<p style="color:wheat"> <a href="tel:09069642853" style="text-decoration: none; color:wheat">09069642853</a>, <a href="tel:09023316119" style="text-decoration: none; color:wheat">09023316119</a>  </p>
<p> Ig: dev_eighty9 </p>
<p> Twitter: dev_eighty9 </p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
    <script>
      let upBtn = document.getElementById("up-btn");
      upBtn.style.transition = "display 0.15s ease-in-out";

      function showbutton() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        if(scrolled >= 80){
          upBtn.style.display = "block";
        } else {
          upBtn.style.display = "none";
        }
      }
      
      window.addEventListener('scroll', () => {
        showbutton();
      })
    </script>
</body>
</html>