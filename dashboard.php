<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
</head>
<body>  
<?php 
session_start();
if(!isset($_SESSION['USER']) || !isset($_SESSION['ID'])) 
{
    header("Location: index.php");
}
?>
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="mySideNav">&#9776; Menu</span>
                <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="reserveringen.php">Kalender</a>
                <a href="contact.php">Voorraad</a>
                <a href="logout.php">Afmelden</a>
                </div>
            </div> 
            <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img id="summaLogo" alt="Brand" src="summa200.png">
            </a>
            </div>                         
        </div>
    </nav>      
    <div class="row" class="myAlignment">
        <div class="col-lg-12">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-lg-12">
                    <?php echo "<h4>Welkom, " .  $_SESSION['USER'] . "</h4>"; ?>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-lg-12">
                    <h1>Voorraad</h1>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead >
                                    <tr>
                                        <th>ID</th>
                                        <th>Naam</th>
                                        <th>Omschrijving</th>
                                        <th>CategorieID</th>
                                        <th>Hoeveelheid</th>
                                        <th>Wijzigen</th>
                                        <th>Verwijderen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require_once('php/dashboard_overview.php');?>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <div class="row" class="myAlignment">
        <div class="col-lg-6">
            <div class="jumbotron">
                <h3>Voorraad toevoegen</h3>   
                <hr>
                <form>
                    <div class="form-group">
                        <label for="product_name">Naam</label>
                        <input type="text" class="form-control" id="" name="product_name" require>
                    </div>
                    <div class="form-group">
                    <label for="product_omschrijving">Omschrijving :</label>
                        <textarea class="form-control" cols="20" rows="2" id="" name="product_omschrijving" require></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categorie_id">CategorieID</label>
                        <select class="form-control" name="categorie_id" id="" require>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        <!-- <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input"> -->
                    </div>
                    <div class="form-group">
                    <label for="product_hoeveelheid">Hoeveelheid :</label>
                        <input type="text" class="form-control" id="" name="product_hoeveelheid" pattern="^[0-9]*$" require>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>                        
                    </div>
                    <?php include('php/VoorraadMenu.php');?>
                </form>
            </div>    
        </div>
        <div class="col-lg-6">
            <div class="jumbotron">
                <h3>Dayview</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                        <label>ID:</label><input type="text" name="id" id="id" class="form-control" placeholder="ID" disabled><br>
                        <label>Naam:</label><input type="text" name="naam" id="naam" class="form-control" placeholder="Naam"><br>
                        <label>Omschrijving:</label><textarea class="form-control" name="omschrijving" id="exampleTextarea" rows="3" placeholder="Omschrijving"></textarea>
                        <label>CategorieID:</label><input type="text" name="categorie_id" class="form-control" placeholder="CategorieID"><br>
                        <label>Hoeveelheid:</label><input type="text" name="hoeveelheid" class="form-control" placeholder="Hoeveelheid"><br>
                        </div>
                    </form>

                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "20.6em";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script></div>
</body>
=======
<?php 
session_start();

require('./inc/nav.php');

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
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<body>
    <?php 
     require_once('inc/nav.php');
     echo "<h4>Welkom, " .  $_SESSION['USER'] . "</h4>";

     include 'php/VoorraadMenu.php';
     ?>
    
    <!-- bootstrap grid -->
    <div class="grid">
    <div class="container-fluid">
        <div class="row">
            <!-- product voorraad column -->
            <div id="product_voorraad" class="col-md-11">
                <div id="heading_voorraad">
                    <h3 id="heading_voorraad_h3" class="display-4">Product voorraad</h3>
                </div>
                <!-- Include voor de table met voorraad -->
                <?php include 'php/dashboard_overview.php';?>
            </div>
        </div>      
        <div class="row">
            <!-- column voor toevoeging van de items -->
            <div id="voorraad_menu" class="col-md-5">
                <div id="heading_menu">
                    <!-- include insert van form -->
                    
                    <h3 id="heading_menu_h3" class="display-4">Voorraad menu</h3>
                    <hr>
                    <form action="" method="post">
                        <div class="row">
                            <label for="product_name" class="col-sm-3 col-form-label">Name :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="product_name" require>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <label for="product_omschrijving" class="col-sm-3 col-form-label">Omschrijving :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" cols="20" rows="2" id="" name="product_omschrijving" require></textarea>
                            </div>
                        </div>
                        <br/>
                         <div class="row">
                            <label for="categorie_id" class="col-sm-3 col-form-label">CategorieID :</label>
                            <div class="col-sm-9">
                            <!-- <input type="text" class="form-control" id="" name="categorie_id" require> -->
                            <select class="form-control" name="categorie_id" id="" require>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <label for="product_hoeveelheid" class="col-sm-3 col-form-label">Hoeveelheid :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="product_hoeveelheid" pattern="^[0-9]*$" require>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary btn-block" name="submit" style="margin-left: 180px; margin-top: 10px; margin-bottom: 5px;">Submit</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- column voor de dayview -->
            <div id="day_view" class="col-md-5">
                <div id="heading_day_view">
                    <h3 id="heading_dayview_h3" class="display-4">Dayview</h3>
                    <hr>
                </div>
                
            </div>
        </div>
    </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                        <label>ID:</label><input type="text" name="id" id="id" class="form-control" placeholder="ID" disabled><br>
                        <label>Naam:</label><input type="text" name="naam" id="naam" class="form-control" placeholder="Naam"><br>
                        <label>Omschrijving:</label><textarea class="form-control" name="omschrijving" id="exampleTextarea" rows="3" placeholder="Omschrijving"></textarea>
                        <label>CategorieID:</label><input type="text" name="categorie_id" class="form-control" placeholder="CategorieID"><br>
                        <label>Hoeveelheid:</label><input type="text" name="hoeveelheid" class="form-control" placeholder="Hoeveelheid"><br>
                        </div>
                    </form>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
>>>>>>> 3f93522af01a9e56a4416221748d6b099f7a925b
</html>