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
      <title>Intern | Webshop</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body id="top">
      <div class="container-fluid" >
         <?php include('inc/nav.php');?>
         <div class="row">
            <div class="col-lg-12">
            <div class="jumbotron">
                <h2>Product reserveren:</h2>
                <form method="post" action="webshop.php">
                        <div class="form-group">
                        <label for="select">Selecteer product</label>
                        <select name="select_product" id="select" class="form-control">
                        <?php
                            require_once('classes/Database.php');
                            require_once('classes/Product.php');
                            $db = new Database;
                            $product = new Product;
                            $query = $db->query("SELECT * FROM producten");
                            $count = $query->rowCount();
                            
                            if($count > 0) {
                                while($row = $query->fetch()) {
                                    $product->id = $row[0];
                                    $product->name = $row[1];
                                    echo "<option value='$product->id'>$product->name</option>";
                                }
                            }
                      ?>
                        </select>
                        <label for="datenodig" class="">Selecteer datum nodig</label>
                        <input type="date" name="date_nodig" id="datenodig" class="form-control">
                        <label for="dateterug">Selecteer datum terug</label>
                        <input type="date" name="date_terug" id="dateterug" class="form-control">
                        <label for="dateordered">Locatie:</label>
                        <input type="text" name="lokaal" id="lokaal" class="form-control">
                        <input type="submit" name="submit" value="Bestellen" class="form-control btn btn-primary mt-5">
                        </div>
                      </form>
                      <?php
                      
                       // var_dump($_SESSION['ID']);
                      if(isset($_POST['select_product']) && isset($_POST['date_nodig']) && isset($_POST['date_terug']) && isset($_POST['lokaal']) && isset($_POST['submit'])) {
                          $gebruikersID = 1;
                          $product = $_POST['select_product'];
                          $quantity = 1;
                          $dateNodig = $_POST['date_nodig'];
                          $dateTerug = $_POST['date_terug'];
                          $dateOrdered = date("Y-m-d H:i:s");
                          $lokaal = $_POST['lokaal'];

                          //var_dump($gebruikersID, $product, $quantity, $dateNodig, $dateTerug, $dateOrdered, $lokaal);
                          $db = new Database;
                          $db->insertBestelling($gebruikersID, $product, $quantity, $dateNodig, $dateTerug, $dateOrdered, $lokaal);
                      }
                      
                      ?>
            </div>
               <div class="jumbotron">
                  <h2>Producten <span>&#9776;</span></h2>
                  <div id="producten">
                      <div class="row">
                        <?php
                            require_once('classes/Database.php');
                            require_once('classes/Product.php');
                            $db = new Database;
                            $product = new Product;
                            $query = $db->query("SELECT * FROM producten");
                            $count = $query->rowCount();

                            if($count > 0) 
                            {
                                while($row = $query->fetch()) {

                                    $product->id = $row[0];
                                    $product->category_id = $row[4];
                                    $product->name = $row[1];
                                    $product->description = $row[2];



                                    
                                    echo "<div class='col-sm-2 py-2'>"; 
                                    echo "<div class='card h-100'>"; 
                                    // echo "<div class='card-block'>";
                                    echo "<div class='card-header'>" . "</div>";
                                    echo "<div class='card-body'>";
                                    echo "<h4>" .  $product->name . "</h4>";
                                    echo "<p>" . $product->description . "</p>";
                                    echo "</div>";
                                    echo "<div class='card-footer'>";
                                    // echo "<form method='post'>";
                                    echo "<a class='btn btn-primary' href='webshop.php?id=$product->id'>" . "Add to cart" . "</a>";

                                    // echo "</form>";                                
                                    echo "</div>";                                    
                                    // echo "</div>";
                                    echo "</div>";    
                                    echo "</div>";                                                             



                                }
                            }   
                
                            ?>
                        </div>
                    </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="jumbotron">
                  <h2>Systemen <span>&#9776;</span></h2>
                  <div id="systemen">
                     <div class="row">
                     <?php
                        require_once('classes/Database.php');
                        require_once('classes/Product.php');
                        $db = new Database;
                        $product = new Product;
                        $query = $db->query("SELECT * FROM producten WHERE categorie_id = 1 ");
                        $count = $query->rowCount();
                        


                        if($count > 0) 
                        {
                            while($row = $query->fetch()) {
                        
                                $product->id = $row[0];
                                $product->category_id = $row[4];
                                $product->name = $row[1];
                                $product->description = $row[2];
                        
                                // if($min >= $count && max <= $count)
                                // {
                                //     echo "<div class='col-lg-3'>";
                                //     echo "</div>";
                                // }
                                echo "<div class='col-sm-3 mt-3'>";  
                                echo "<div class='card'>"; 
                                echo "<div class='card-block'>";
                                echo "<h6>" .  $product->name . "</h5>";
                                echo "<div class='card-body'>";
                                echo "<p>" . $product->description . "</p>";
                                echo "</div>";
                                echo "<div class='card-footer'>";
                                echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                echo "</div>";                                
                                echo "</div>";
                                echo "</div>";    
                                echo "</div>";     
                            }
                        }
                        ?>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="jumbotron">
                  <h2>Schermen <span>&#9776;</span></h2>
                  <div id="schermen">
                     <div class="row">
                     <?php
                        require_once('classes/Database.php');
                        require_once('classes/Product.php');
                        $db = new Database;
                        $product = new Product;
                        $query = $db->query("SELECT * FROM producten WHERE categorie_id = 2 ");
                        $count = $query->rowCount();
                        
                        if($count > 0) 
                        {
                            while($row = $query->fetch()) {
                        
                                $product->id = $row[0];
                                $product->category_id = $row[4];
                                $product->name = $row[1];
                                $product->description = $row[2];
                        
                        
                                echo "<div class='col-sm-3 mt-3'>";  
                                echo "<div class='card'>"; 
                                echo "<div class='card-block'>";
                                echo "<h6>" .  $product->name . "</h5>";
                                echo "<div class='card-body'>";
                                echo "<p>" . $product->description . "</p>";
                                echo "</div>";
                                echo "<div class='card-footer'>";
                                echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                echo "</div>";                                
                                echo "</div>";
                                echo "</div>";    
                                echo "</div>";     
                            }
                        }
                        ?>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="jumbotron">
                  <h2>Toetsenborden <span>&#9776;</span></h2>
                  <div id="toetsenborden">
                     <div class="row">
                     <?php
                        require_once('classes/Database.php');
                        require_once('classes/Product.php');
                        $db = new Database;
                        $product = new Product;
                        $query = $db->query("SELECT * FROM producten WHERE categorie_id = 3 ");
                        $count = $query->rowCount();
                        
                        if($count > 0) 
                        {
                            while($row = $query->fetch()) {
                        
                                $product->id = $row[0];
                                $product->category_id = $row[4];
                                $product->name = $row[1];
                                $product->description = $row[2];
                        
                        
                                echo "<div class='col-sm-3 mt-3'>";  
                                echo "<div class='card'>"; 
                                echo "<div class='card-block'>";
                                echo "<h6>" .  $product->name . "</h5>";
                                echo "<div class='card-body'>";
                                echo "<p>" . $product->description . "</p>";
                                echo "</div>";
                                echo "<div class='card-footer'>";
                                echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                echo "</div>";                                
                                echo "</div>";
                                echo "</div>";    
                                echo "</div>";     
                            }
                        }
                        ?>
                    </div>
                  </div>
               </div>
               <div class="row">
               <div class="col-lg-12">
                  <div class="jumbotron">
                     <h2>Muizen <span>&#9776;</span></h2>
                     <div id="muizen">
                        <div class="row">
                        <?php
                           require_once('classes/Database.php');
                           require_once('classes/Product.php');
                           $db = new Database;
                           $product = new Product;
                           $query = $db->query("SELECT * FROM producten WHERE categorie_id = 4 ");
                           $count = $query->rowCount();
                           
                           if($count > 0) 
                           {
                               while($row = $query->fetch()) {
                           
                                   $product->id = $row[0];
                                   $product->category_id = $row[4];
                                   $product->name = $row[1];
                                   $product->description = $row[2];
                           
                           
                                   echo "<div class='col-sm-3 mt-3'>";  
                                   echo "<div class='card'>"; 
                                   echo "<div class='card-block'>";
                                   echo "<h6>" .  $product->name . "</h5>";
                                   echo "<div class='card-body'>";
                                   echo "<p>" . $product->description . "</p>";
                                   echo "</div>";
                                   echo "<div class='card-footer'>";
                                   echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                   echo "</div>";                                   
                                   echo "</div>";
                                   echo "</div>";    
                                   echo "</div>";     
                               }
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="jumbotron">
                     <h2>Ethernet kabels <span>&#9776;</span></h2>
                     <div id="ethkabels">
                        <div class="row">
                        <?php
                           require_once('classes/Database.php');
                           require_once('classes/Product.php');
                           $db = new Database;
                           $product = new Product;
                           $query = $db->query("SELECT * FROM producten WHERE categorie_id = 5 ");
                           $count = $query->rowCount();
                           
                           if($count > 0) 
                           {
                               while($row = $query->fetch()) {
                           
                                   $product->id = $row[0];
                                   $product->category_id = $row[4];
                                   $product->name = $row[1];
                                   $product->description = $row[2];
                        
                                   echo "<div class='col-sm-3 mt-3'>";  
                                   echo "<div class='card'>"; 
                                   echo "<div class='card-block'>";
                                   echo "<h6>" .  $product->name . "</h5>";
                                   echo "<div class='card-body'>";
                                   echo "<p>" . $product->description . "</p>";
                                   echo "</div>";
                                   echo "<div class='card-footer'>";
                                   echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                   echo "</div>";                                   
                                   echo "</div>";
                                   echo "</div>";    
                                   echo "</div>";     
                               }
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="jumbotron">
                     <h2>Switches <span>&#9776;</span></h2>
                     <div id="switches">
                        <div class="row">
                        <?php
                           require_once('classes/Database.php');
                           require_once('classes/Product.php');
                           $db = new Database;
                           $product = new Product;
                           $query = $db->query("SELECT * FROM producten WHERE categorie_id = 6");
                           $count = $query->rowCount();
                           
                           if($count > 0) 
                           {
                               while($row = $query->fetch()) {
                           
                                   $product->id = $row[0];
                                   $product->category_id = $row[4];
                                   $product->name = $row[1];
                                   $product->description = $row[2];
                           
                           
                                   echo "<div class='card-group'>";  
                                   echo "<div class='card'>"; 
                                   echo "<div class='card-block'>";
                                   echo "<h6>" .  $product->name . "</h5>";
                                   echo "<div class='card-body'>";
                                   echo "<p>" . $product->description . "</p>";
                                   echo "</div>";
                                   echo "<div class='card-footer'>";
                                   echo "<button class='btn btn-primary'>" . "Add to cart" . "</button>";
                                   echo "</div>";
                                   echo "</div>";
                                   echo "</div>";    
                                   echo "</div>";     
                               }
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <div>               
            </div> <!-- end of container div -->
      <script src="js/webshop.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script></div>
   </body>
</html>