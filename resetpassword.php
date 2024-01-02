<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement

        $id = $_SESSION["id"];
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE `okada_data` SET password = '$new_password' WHERE id = $id";
        // $sql = "UPDATE okada_data SET password = ? WHERE id = ?";

        if(mysqli_query($connection, $sql)){
            session_destroy();
            header("location: login.php");
        };
    };
    
    // Close connection
    mysqli_close($connection);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password || Oyo State Tricycle (keke napep) & Motorcycle (Okada) </title>
    <link rel="icon" href="img/cropped-oyo-logo-180x180.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <img src="img/background.png" alt="">
    <div class="container d-flex justify-content-center">
        <div class="content col-sm-12 col-md-6 col-lg-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-3">
                    <div class="mb-3 mt-3">
                    <div id="emailHelp" class="form-text">Please fill out this form to reset password</div>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" id="exampleInputPassword1" name="new_password">
                    <span class="invalid-feedback"><?php echo $new_password_err ?? "" ?></span>
                    </div>
                    
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" id="exampleInputPassword1" name="confirm_password">
                    <span class="invalid-feedback"><?php echo $confirm_password_err ?? "" ?></span>
                </div>
                    <button id="button" type="submit" class="btn btn-success w-100">Reset</button>
                </form>
                <br>
                <center>
                <p> Back to Dashboard
                    <a href="dashboard.php"><button class="btn btn-outline-dark">Back</button></a>
                </p>
                <a href="index.php"><button class="btn btn-outline-dark">Home</button></a>
                </center>
        </div>
    </div>


    <form action="dashboard.php" method="post" style="display: none">
        <input type="text" value="<?= $email?>" name="mail">
        <button type="submit" id="submit-button">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>