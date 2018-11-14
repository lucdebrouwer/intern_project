<?php
session_start();
/**
 * // Check of gebruiker stagiar / beheerder is
 * if($SESSION['LOGGED_IN'] == true && $_SESSION['ROLE'] >= 2)
 * {
 *    // if beheerder allow access 
 *    // showpage
 * }
 * else{
 *    // else deny access
 *    // header("Location: index.php");
 *    // throw new Exception("Access was denied");
 *}
 * 
 */
require('classes/Database.php');
require('classes/LoginSystem.php');

$db = new Database;
$loginSystem = new LoginSystem;
//$rg = new RegisterSystem;

$token = openssl_random_pseudo_bytes(16); // This will make a unique code for every refresh
$btoken = bin2hex($token);
$_SESSION['TOKEN'] = $btoken;

$main_token = password_hash($_SESSION['TOKEN'], PASSWORD_DEFAULT);

if(isset($_POST['naam_']) && isset($_POST['username_']) && isset($_POST['password_']))
{
    if(isset($_POST['token']) == $main_token) 
    {
        $naam = $loginSystem->clean($_POST['naam_']);
        $username = $loginSystem->clean($_POST['username_']);
        $password = $loginSystem->clean($_POST['password_']);

        if($naam != "" && $username != "" && $password != "") 
        {
            $hashed_password = $loginSystem->encryptPass($password);
            $rol = 2; 
            // rollen
             // 1 = docent
             // 2 = stagiar / beheerder
            if($db->register($naam, $username, $hashed_password, $rol))
            {
                header("Location: index.php");
            }
            //var_dump($_SESSION['TOKEN']);
        }
    }
    else
    {
        die("Invalid token");
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registreren</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <script src="main.js"></script>
</head>
<body>
<div class="container">
   <div class="card">
      <div class="card-header">
         Summacollege
      </div>
      <div class="card-body">
         <h5 class="card-title">Docenten registratie</h5>
         <form method="post" action="#">
            <div class="form-group row">
               <input type="hidden" name="token" id="token" value="<?php echo $main_token; ?>"/>
            </div>
            <div class="form-group row">
               <label for="username_" class="col-4 col-form-label">Docenten naam</label> 
               <div class="col-8">
                  <div class="input-group">
                     <input id="naam" name="naam_" placeholder="Docenten naam" required="required" class="form-control" type="text">
                  </div>
               </div>
            </div>            
            <div class="form-group row">
               <label for="username_" class="col-4 col-form-label">Afkorting</label> 
               <div class="col-8">
                  <div class="input-group">

                     <input id="afkorting_<?php echo $main_token;?>" name="username_" placeholder="Docenten afkorting <BRLU>" required="required" class="form-control" type="text">
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <label for="password_" class="col-4 col-form-label">Wachtwoord</label> 
               <div class="col-8">
                  <div class="input-group">

                     <input id="password_" name="password_" placeholder="Wachtwoord" required="required" class="form-control" type="password">
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <div class="offset-4 col-8">
                  <button name="send" type="submit" class="btn btn-primary">Register</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
</body>
</html>