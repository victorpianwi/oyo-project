<?php 

const db_server = "localhost";
const db_username = "root";
const db_password = "";
const db_name = "oyo_project";

// Connecting to the database
$connection = mysqli_connect(db_server, db_username, db_password, db_name);

return $connection;
?>