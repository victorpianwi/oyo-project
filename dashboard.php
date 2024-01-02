<?php

session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(empty($_SESSION["firstname"])){
  header("location: login.php");
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
      .aboutContent{
        height: fit-content !important;
      }
    </style>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navContent sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="dashboard.php"><img src="img/background.png" alt="" ></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item me-4">
                <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<div class="container-fluid" id="about" style="text-align: center;">
  <h1>Dashboard</h1>
  <div class="container-fluid aboutContent" style="text-align: left;padding: 50px">
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Firstname:</span> <?= $_SESSION["firstname"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Lastname:</span> <?= $_SESSION["lastname"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Email:</span> <?= $_SESSION["email"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Gender:</span> <?= $_SESSION["gender"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">NIN:</span> <?= $_SESSION["nin"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Plate Number:</span> <?= $_SESSION["plate"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Address:</span> <?= $_SESSION["address"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Local Government:</span> <?= $_SESSION["local"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Phone Number:</span> +<?= $_SESSION["phone"]?></p>
    <p style="padding-bottom: 30px; margin-bottom:30px; border-bottom: 1px solid grey"><span style="margin-right: 50px;">Registration Status:</span> <?= $_SESSION["status"]?></p>
    <a href="updateregistration.php"><button class="btn btn-outline-dark">Update Registration</button></a>
    <a href="resetpassword.php" ><button class="btn btn-outline-dark">Change Password</button></a>
  </div>
</div>

<footer class="container-fluid" id="contact">
<p>DevEighty9media@yahoo.com </p>
<p> 09069642853, 09023316119 </p>
<p> Ig: dev_eighty9 </p>
<p> Twitter: dev_eighty9 </p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/home.js"></script>
</body>
</html>