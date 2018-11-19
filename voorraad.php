<?php 
session_start();
if(!isset($_SESSION['USER']) || !isset($_SESSION['ID'])) 
{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php 
     require_once('inc/nav.php');
    ?>
</body>
</html>