<?php

class Database
{

  // Note:  The username/password provided are for testing purposes. Do not use these in production. 
  
  // Define a private instance
  private $host = "localhost";           // PDO host
  private $db_name = "Intern";            // Name of the PDO Database
  private $username = "brlu-intern";     // Username of user
  private $password = "Welkom2018!!";    // Password of PDO database, 
  private $socket_type = "mysql";        // The type of database(can be mysql, sqlite etc)
  private $instance = NULL;              // The actual instance of the class


  // This is our function that will build the connection to the database for us
  public function __construct()
  {
    if($this->instance == NULL) 
    {
      try 
      {
        $db = new PDO(''. $this->socket_type . ':host='. $this->host . ';dbname='. $this->db_name .'', $this->username, $this->password);
        $this->instance = $db;
      }
      catch(PDOException $e)
      {
        die($e->getMessage());
      }
    }
  }

  // This is our function that will be used in our login system class
  // to query against the database
  public function query($sql)
  {

    // In PDO style, prepare means query
    $query = $this->instance->prepare($sql);
    $query->execute();

    return $query;
  }

  public function register($naam, $afkorting, $hashed_wachtwoord, $rol)
  {
    // Check if user already exists in database
    $query = $this->query("SELECT * FROM gebruikers WHERE naam='".$naam."'");
    $query->execute();
    $result = $query->rowCount();

    if($result >= 1)
    {
      die("Something went wrong, please try an unique name.");
    } else
    {
      if(!empty($naam) && !empty($afkorting) && !empty($hashed_wachtwoord) && !empty($rol))
      {
        $sql = "INSERT INTO gebruikers (naam, afkorting, wachtwoord, rolID) VALUES(?, ?, ?, ?)";
        try
        {
          $query = $this->instance->prepare($sql);
          $query->execute([$naam, $afkorting, $hashed_wachtwoord, $rol]);
        }
        catch(PDOException $ex)
        {
          echo $ex->getMessage();
        }
        return $query;
      }
    }
  } 
}
?>
