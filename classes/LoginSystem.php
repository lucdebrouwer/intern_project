<?php 

class LoginSystem
{
    public function login($username, $password)
    {
        if(!empty($username) && !empty($password))
        {
            // 
            $db = new Database;
            $query = $db->query("SELECT * FROM gebruikers WHERE afkorting='".$username."'");
            $count = $query->rowCount();
            if($count == 1)
            {
                while($row = $query->fetch())
                {
                    if(password_verify($password, $row[3]))
                    {
                        //echo "You are now signed in " . $row[1];
                        $sesID = password_hash($row[0], PASSWORD_DEFAULT);
                        $_SESSION['ID'] = $sesID;
                        $_SESSION['USER'] = $row[2];
                        header("Location: dashboard.php");
                        //echo " " . $_SESSION['ID'];
                    }
                    else 
                    {
                        die("Credentials were incorrect");
                    }
                }
            }
            else 
            {
                die("Username or password does not match records");
            }
        }
        else
        {
            die("No data received");
        }
    }

    public function encryptPass($password)
    {
        if(!empty($password))
        {
            return password_hash($password, PASSWORD_DEFAULT);          
        }
    }
    public function clean($data)
    {
      if(!empty($data))
      {
        $data = trim(strip_tags(stripslashes($data)));
        return $data; 
      }
    }

    public function logout()
    {        
        session_unset();
        session_destroy();       
    }
}


?>