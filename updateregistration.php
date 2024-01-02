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
$firstname = $lastname = $password = $gender = $nin = $plate = $address = $local = $phone = "";
$firstname_err = $lastname_err = $password_err = $gender_err = $nin_err = $plate_err = $address_err = $local_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter your firstname.";
    } elseif(preg_match('/^[0-9_]+$/', trim($_POST["firstname"]))){
        $firstname_err = "firstname cannot contain numbers and underscores.";
    } else{
        $firstname = trim($_POST["firstname"]);
    }

    // Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter your lastname.";
    } elseif(preg_match('/^[0-9_]+$/', trim($_POST["lastname"]))){
        $lastname_err = "lastname cannot contain numbers and underscores.";
    } else{
        $lastname = trim($_POST["lastname"]);
    }

    
    // Validate gender
    if(empty(trim($_POST["gender"]))){
        $gender_err = "Please select gender";
    } else{
        $gender = trim($_POST["gender"]);
    }

    // Validate NIN
    if(empty(trim($_POST["nin"]))){
        $nin_err = "Please enter NIN";
    } else{
        $nin = trim($_POST["nin"]);
    }

    // Validate plate
    if(empty(trim($_POST["plate"]))){
        $plate_err = "Please enter plate number";
    } else{
        $plate = trim($_POST["plate"]);
    }

    // Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter your address";
    } else{
        $address = trim($_POST["address"]);
    }

    // Validate local
    if(empty(trim($_POST["local"]))){
        $local_err = "Please select local government";
    } else{
        $local = trim($_POST["local"]);
    }

    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter phone number";
    } else if(trim($_POST["phone"]) === 234 ){
        $phone_err = "Please enter phone number";
    } else{
        $phone = trim($_POST["phone"]);
    }

    
    // Check input errors before inserting in database
    if(empty($gender_err) && empty($local_err)){

        $id = $_SESSION["id"];
        
        // update the database
        $sql = "UPDATE `okada_data` SET `firstname`='$firstname',`lastname`='$lastname', `gender`='$gender',`nin`='$nin',`plate`='$plate',`address`='$address',`local`='$local',`phone`='$phone' WHERE `id` = $id";

        if(mysqli_query($connection, $sql)){
            session_destroy();
            header('location: login.php');
        };

        // header("location: login.php");
         
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
    <title>Update Registration || Oyo State Tricycle (keke napep) & Motorcycle (Okada) </title>
    <link rel="icon" href="img/cropped-oyo-logo-180x180.png">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content{
            margin-top: 50px !important;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px !important;
            height: 930px !important;
            margin-bottom: 50px !important;
        }
    </style>
</head>
<body>
    <img src="img/background.png" alt="">
    <div class="container d-flex justify-content-center">
        <div class="content col-sm-12 col-md-6 col-lg-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-3">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Firstname</label>
                        <input type="text" id="text" class="form-control" id="exampleInputText1" name="firstname" value="<?php echo $_SESSION["firstname"] ?>">
                        <span class="invalid-feedback"><?php echo $firstname_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Lastname</label>
                        <input type="text" id="text" class="form-control" id="exampleInputText1" name="lastname" value="<?php echo $_SESSION["lastname"] ?>">
                        <span class="invalid-feedback"><?php echo $lastname_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Gender</label>
                        <select class="form-control remove-shadow" name="gender" value="<?php echo $_SESSION["gender"] ?? "" ?>">
                            <option>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nin" class="form-label">NIN</label>
                        <input type="number" id="nin" class="form-control" name="nin" value="<?php echo $_SESSION["nin"] ?>">
                        <span class="invalid-feedback"><?php echo $nin_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="plate" class="form-label">Plate Number</label>
                        <input type="text" id="plate" class="form-control" name="plate" value="<?php echo $_SESSION["plate"] ?>">
                        <span class="invalid-feedback"><?php echo $plate_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" class="form-control" name="address" value="<?php echo $_SESSION["address"] ?>">
                        <span class="invalid-feedback"><?php echo $address_err ?? "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="local" class="form-label">Local Government</label>
                        <select id="local" class="form-control remove-shadow" name="local" value="<?php echo $_SESSION["local"] ?>">
                            <option>Select</option>
                            <option value="Akinyele">Akinyele</option>
                            <option value="Atiba">Atiba</option>
                            <option value="Atisbo">Atisbo</option>
                            <option value="Egbeda">Egbeda</option>
                            <option value="Ibadan North">Ibadan North</option>
                            <option value="Ibadan North East">Ibadan North East</option>
                            <option value="Ibadan North West">Ibadan North West</option>
                            <option value="Ibadan South East">Ibadan South East</option>
                            <option value="Ibadan South West">Ibadan South West</option>
                            <option value="Ibarapa Central">Ibarapa Central</option>
                            <option value="Ibarapa East">Ibarapa East</option>
                            <option value="Ibarapa North">Ibarapa North</option>
                            <option value="Ido">Ido</option>
                            <option value="Irepo">Irepo</option>
                            <option value="Iseyin">Iseyin</option>
                            <option value="Itesiwaju">Itesiwaju</option>
                            <option value="Iwajowa">Iwajowa</option>
                            <option value="Kajola">Kajola</option>
                            <option value="Lagelu">Lagelu</option>
                            <option value="Ogo Oluwa">Ogo Oluwa</option>
                            <option value="Ogbomoso North">Ogbomoso North</option>
                            <option value="Ogbomoso South">Ogbomoso South</option>
                            <option value="Olorunsogo">Olorunsogo</option>
                            <option value="Oluyole">Oluyole</option>
                            <option value="Oorelope">Oorelope</option>
                            <option value="Ona Ara">Ona Ara</option>
                            <option value="Orire">Orire</option>
                            <option value="Oyo East">Oyo East</option>
                            <option value="Oyo West">Oyo West</option>
                            <option value="Saki East">Saki East</option>
                            <option value="Saki West">Saki West</option>
                            <option value="Surulere">Surulere</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label" style="display:block;">Phone Number</label>
                        <label for="number">+</label>
                        <input type="number" id="number" class="form-control" name="phone" style="width: 90%;display: inline-block;border-right:none" value="<?php echo $_SESSION["phone"] ?? "" ?>">
                        <span class="invalid-feedback"><?php echo $phone_err ?? "" ?></span>
                    </div>

                    <button class="btn w-100" name="make-payment" style="background-color: grey; margin-left: auto; margin-right: auto; margin-bottom: 20px">Make Payment</button>

                    <button type="submit" class="btn w-100" name="done">Update</button>
                </form>
                <br>
                <center>
                <p> Back to Dashboard?
                    <a href="dashboard.php"><button class="btn btn-outline-dark">Back</button></a>
                </p>
                <a href="index.php"><button class="btn btn-outline-dark">Home</button></a>
                </center>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script>
        let hideShadow = document.querySelectorAll(".remove-shadow");
        hideShadow.forEach(hide => {
            hide.addEventListener('click', () => {
                hide.style.boxShadow = "none";
            });
        });
    </script>
</body>
</html>