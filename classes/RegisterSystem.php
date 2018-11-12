<?php

class RegisterSystem 
{
    
    public function register($naam, $afkorting, $hashed_wachtwoord, $rol)
    {
        $db = new Database;
        if(!empty($naam) && !empty($afkorting) && !empty($hashed_wachtwoord) && !empty($rol)) 
        {
            //$db->registerQuery("INSERT INTO gebruikers VALUES(?, ?, ?, ?)");
            //$db->query("INSERT INTO gebruikers VALUES(?, ?, ?, ?)");

            //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("INSERT INTO gebruikers VALUE(?, ?, ?, ?");
            $stmt->execute([$naam, $afkorting, $hashed_wachtwoord, $rol]);
            
        }
        else 
        {
            die("Incorrect formatting or field was empty");
        }
    }
}

?>