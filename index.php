<?php 
session_start();

require('classes/Database.php');
require('classes/LoginSystem.php');

// Instantiate classes

$db = new Database;
$loginSystem = new LoginSystem;

// Check if user session already exists
if(isset($_SESSION['ID']) && $_SESSION['ID'] != NULL) 
{
    // Do nothing
    header("Location: dashboard.php");
}
else 
{
    // if session doesn't exist, create a new token
    // Make a token so we will be protected from CSRF
    $token = openssl_random_pseudo_bytes(16); // This will make a unique code for every refresh
    $btoken = bin2hex($token);
    $_SESSION['TOKEN'] = $btoken;

    $main_token = password_hash($_SESSION['TOKEN'], PASSWORD_DEFAULT);

    if(isset($_POST['username_']) && isset($_POST['password_']))
    {
        if(isset($_POST['token']) == $main_token) 
        {
            $username = $loginSystem->clean($_POST['username_']);
            $password = $loginSystem->clean($_POST['password_']);

            if($username != "" && $password != "") 
            {
                $loginSystem->login($username, $password);
            }
        }
        else
        {
            die("Invalid token");
        }
    }
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
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
         <h5 class="card-title">Docenten login</h5>
         <form method="post" action="#">
            <div class="form-group row">
               <input type="hidden" name="token" id="token" value="<?php echo $main_token; ?>"/>
            </div>
            <div class="form-group row">
               <label for="username_" class="col-4 col-form-label">Gebruikersnaam</label> 
               <div class="col-8">
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-user-circle-o"></i>
                     </div>
                     <input id="afkorting_<?php echo $main_token;?>" name="username_" placeholder="Docenten afkorting" required="required" class="form-control" type="text">
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <label for="password_" class="col-4 col-form-label">Wachtwoord</label> 
               <div class="col-8">
                  <div class="input-group">
                     <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                     </div>
                     <input id="password_" name="password_" placeholder="Wachtwoord" required="required" class="form-control" type="password">
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <div class="offset-4 col-8">
                  <button name="send" type="submit" class="btn btn-primary">Login</button>
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