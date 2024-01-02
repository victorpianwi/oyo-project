<?php 

session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT email, password FROM okada_data WHERE email = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // first get our information from the database
                            
                            $firstname = $lastname = "";

                            $statement = "SELECT * FROM `okada_data` WHERE email = '$email'";
                            $information = mysqli_query($connection, $statement);
                            $result = $information->fetch_assoc();
                            
                            $id = $result["id"];
                            $firstname = $result["firstname"];
                            $lastname = $result["lastname"];
                            $gender = $result["gender"];
                            $nin = $result["nin"];
                            $plate = $result["plate"];
                            $address = $result["address"];
                            $local = $result["local"];
                            $phone = $result["phone"];
                            $status = $result["status"];

                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["email"] = $email;
                            $_SESSION["gender"] = $gender;
                            $_SESSION["nin"] = $nin;
                            $_SESSION["plate"] = $plate;
                            $_SESSION["address"] = $address;
                            $_SESSION["local"] = $local;
                            $_SESSION["phone"] = $phone;
                            $_SESSION["status"] = $status;                    
                            
                            // Redirect user to dashboard
                            header("location: dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
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
    <title>Log In || Oyo State Tricycle (keke napep) & Motorcycle (Okada) </title>
    <link rel="icon" href="img/cropped-oyo-logo-180x180.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content{
            height: fit-content !important;
        }
    </style>
</head>
<body>
    <img src="img/background.png" alt="">
    <div class="container d-flex justify-content-center">
        <div class="content col-sm-12 col-md-6 col-lg-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-3">
                    <div class="mb-3 mt-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    <span class="error"><?php echo $email_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" id="exampleInputPassword1" name="password">
                    <span class="error"><?php echo $password_err ?? "" ?></span>
                    </div>
                    <span class="error"><?php echo $login_err ?? "" ?></span>
                    <button id="button" type="submit" class="btn btn-success w-100">Log In</button>
                </form>
                <br>
                <center>
                <p> Not Registered?
                    <a href="signup.php"><button class="btn btn-outline-dark">Sign Up</button></a>
                </p>
                <a href="index.php"><button class="btn btn-outline-dark">Home</button></a>
                </center>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>