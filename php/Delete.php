<?php

$id  = $_GET['id'];

$con = mysqli_connect("localhost","root","","project_leerjaar_3"); 

if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM producten WHERE productID = $id";

if (mysqli_query($con, $sql))
{
    mysqli_close($con);
    header('Location: ../dashboard.php');
    exit;
}   
else 
{
    echo "Error deleting record";
}

?>