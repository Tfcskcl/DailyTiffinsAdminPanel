<?php


$host = "localhost";
$username = "root";
$password = "";
$database = "adminpanel";

//connection
$con = mysqli_connect("$host", "$username", "$password", "$database");

//check connection
if(!$con)
{
    header("Location: ..errors/db.php");
    die();
}
//else{
//    echo "Database Connected.!";
//}
?>