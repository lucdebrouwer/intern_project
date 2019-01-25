<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
     <?php include 'inc/nav.php';?>
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
                            <table id="dashboard_table" class="table table-striped">
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
                <div id="reportrange">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span id="date_range"></span> <i class="fa fa-caret-down"></i>
                </div>
                <div class="table-responsive">
                            <table id="dayview_table" class="table table-striped">
                                <thead >
                                    <tr>
                                        <th>ID</th>
                                        <th>Naam</th>
                                        <th>CategorieID</th>
                                        <th>Hoeveelheid</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php require_once('php/DayView.php');?>
                                </tbody>
                            </table>    
                        </div>
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

// functionaliteit voor het search, pagination voor de voorraad tabel.
    $(document).ready( function () {
    $('#dashboard_table').DataTable({
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
        language:{
            "sSearch": "Zoeken:",
            "lengthMenu": " _MENU_ producten per pagina",
            "zeroRecords" : "Sorry, er zijn geen producten.",
            "info" : "Pagina _PAGE_ van de _PAGES_",
            paginate: {
                "previous": "Vorige",
                "next": "Volgende",
            }
        }
    });
    });

    
// functionaliteit voor het hamburger menu.
    function openNav() {
        document.getElementById("mySidenav").style.width = "20.6em";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

// functionaliteit voor de dayview filters.
    $(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Vandaag': [moment(), moment()],
       'Gisteren': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Laatste 7 Dagen': [moment().subtract(6, 'days'), moment()],
       'Laatste 30 Dagen': [moment().subtract(29, 'days'), moment()],
       'Deze maand': [moment().startOf('month'), moment().endOf('month')],
       'Vorige Maand': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
    }, cb);

    cb(start, end);

    });     
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script></div>

</body>
</html>