<?php

class Database
{

  // Note:  The username/password provided are for testing purposes. Do not use these in production. 
  
  // Define a private instance
  private $host = "localhost";           // PDO host
  private $db_name = "project_leerjaar_3";             // Name of the PDO Database
  private $username = "root";     // Username of user
  private $password = "";    // Password of PDO database, 
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
    $query = $this->query("SELECT * FROM gebruikers WHERE afkorting='".$afkorting."'");
    $query->execute();
    $result = $query->rowCount();

    if($result >= 1)
    {
      die("Something went wrong, please try an unique name.");
    } else
    {
      if(!empty($naam) && !empty($afkorting) && !empty($hashed_wachtwoord) && !empty($rol))
      {
        $sql = "INSERT INTO gebruikers(naam, afkorting, wachtwoord, rolID) VALUES(?, ?, ?, ?)";
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

  public function insertProducts($naam, $omschrijving, $categorie_id, $product_amount) {

    if(!empty($naam) && !empty($omschrijving) && !empty($categorie_id) && !empty($product_amount)) {
      $sql = "INSERT INTO producten(naam, omschrijving, categorie_id, product_amount) VALUES(?, ?, ?, ?)";
      try
      {
        $query = $this->instance->prepare($sql);
        $query->execute([$naam, $omschrijving, $categorie_id, $product_amount]);
      }
      catch(PDOException $ex)
      {
        echo $ex->getMessage();      
      }
    }

  }

public function insertBestelling($gebruikersID, $productID, $quantity, $datumNodig, $datumTerug, $datumOrdered, $lokaal) {
  if(!empty($gebruikersID) && !empty($productID) && !empty($quantity) && !empty($datumNodig) && !empty($datumTerug) && !empty($datumOrdered) && !empty($lokaal)) {
    $sql = "INSERT INTO reserveringen(gebruikers_id, product_id, amount, datum_nodig, datum_terug, datum_ordered, lokaal) VALUES(?, ?, ?, ?, ?, ?, ?)";
    try
    {
      $query = $this->instance->prepare($sql);
      $query->execute([$gebruikersID, $productID, $quantity, $datumNodig, $datumTerug, $datumOrdered, $lokaal]);
    }
    catch(PDOException $ex)
    {
      echo $ex->getMessage();
    }
  }
}
}
?>
