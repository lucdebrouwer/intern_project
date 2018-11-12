<?php 
if (isset($_POST['logout'])) {

    $loggedOut = false;

    
    if($loggedOut == false)
    {
        $loginSystem->logout();
        header("Location: somewhere.php");
    }
}
?>