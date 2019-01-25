<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Kalender</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->

<!-- Latest compiled JavaScript -->

	</head>
	<body>
	<div class="container-fluid">		
	<?php 
	session_start();
	if(!isset($_SESSION['USER']) || !isset($_SESSION['ID'])) 
	{
		header("Location: index.php");
	}
	?>
	<?php
	require('classes/database.php');
	require_once('inc/nav.php');
	
	$db = new Database; 
	
	// Check if user session already exists


	$monthNames = Array("Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", 
	"Augustus", "September", "October", "November", "December");
	?>
	<?php
		if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
		if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

		//echo $_SERVER['PHP_SELF'] .= '?month=' . $_REQUEST['month'] . '?year=' . $_REQUEST['year'] . '?day=' . $_REQUEST['day'];
	?>
	<?php
	// Haal de huidige maand en jaar op
		$cMonth = $_REQUEST["month"];
		$cYear = $_REQUEST["year"];

		$prev_year = $cYear;
		$next_year = $cYear;

		$prev_month = $cMonth-1;
		$next_month = $cMonth+1;

		if ($prev_month == 0 ) {
			$prev_month = 12;
			$prev_year = $cYear - 1;
		}
		if ($next_month == 13 ) {
			$next_month = 1;
			$next_year = $cYear + 1;
		}
	?>
	<div class="row">
		<div class="col-lg-12">
		<button class="btn btn-primary">Hide Data</button>
		<button class="btn btn-info">Show Data</button>
		<?php
		if(!isset($_REQUEST['day'])) {
			$_REQUEST['day'] = 1;
		}
		$cDay = $_REQUEST["day"];
		if ($cDay < 10) {
			$cDay = "" . $cDay;
			$searchdate = $cYear . "-" . $cMonth . "-" . $cDay;
		}
		else 
			$searchdate = $cYear . "-" . $cMonth . "-" . $cDay;
		
		
		//$query = $db->query("SELECT * FROM reserveringen WHERE datum_nodig = '". $searchdate . "'");
		$query = $db->query("SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.gebruikersID INNER JOIN producten ON reserveringen.product_id = producten.productID WHERE datum_nodig = '" . $searchdate . "'");
		$count = $query->rowCount();
		//$res = $query->fetch();
		//var_dump($res);
		//var_dump($query);
	
		if ($count > 0)
		{
			echo "<div class='table-responsive dataTable'>";
			echo "<p align='center'>Brengen naar:</a>";
			echo "<table class='table table-bordered'>";
			echo "<tr> <th>Gebruiker</th> <th>Product</th> <th>Aantal</th> <th>Datum nodig</th> <th>Datum terug</th> <th>Datum bestelling</th> <th>Locatie</th></tr>";
			while ($row = $query->fetch())
			{
					echo "<tr>";
					echo '<td>' . $row[9] . '</td>';
					echo '<td>' . $row[2] . '</td>';
					echo '<td>' . $row[3] . '</td>';
					echo '<td>' . $row[4] . '</td>';
					echo '<td>' . $row[5] . '</td>';
					echo '<td>' . $row[6] . '</td>';
					echo '<td>' . $row[7] . '</td>';
					echo "</tr>";
			}

			echo "</table>";
			echo "</div>";
		}
		else {
			echo "<p align='center'>Vandaag hoeft er niks worden gebracht.</p><br/><br/>";
		}

		$query = $db->query("SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.gebruikersID INNER JOIN producten ON reserveringen.product_id = producten.productID WHERE datum_terug = '" . $searchdate . "'");
		$count = $query->rowCount();
		
		if ($count > 0)
		{
			echo "<div class='table-responsive dataTable'>";
			echo "<p align='center'>Komt terug:</a>";
			echo "<table class='table table-bordered'>";
			echo "<tr> <th>Gebruiker</th> <th>Product</th> <th>Aantal</th> <th>Datum nodig</th> <th>Datum terug</th> <th>Datum bestelling</th> <th>Locatie</th></tr>";
			while ($row = $query->fetch())
			{

				echo '<td>' . $row[9] . '</td>';
				echo '<td>' . $row[2] . '</td>';
				echo '<td>' . $row[3] . '</td>';
				echo '<td>' . $row[4] . '</td>';
				echo '<td>' . $row[5] . '</td>';
				echo '<td>' . $row[6] . '</td>';
				echo '<td>' . $row[7] . '</td>';
				echo "</tr>";

			}
			echo "</table>";
			echo "</div>";			
		}
		else {
			echo "<p align='center'>Vandaag hoeft er niks worden opgehaald.</p><br/><br/>";
		}

		//$result = mysqli_query($conn, "SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date like" . "'" . $searchdate . "'")
		//$result = mysqli_query($conn, "SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date_back like" . "'" . $searchdate . "'")
		
		
	?>	
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
	<div class="month">
		<ul>
			<li class="prev"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year . "&day=" . "1"; ?>">&#10094; Previous</a></li>
			<li class="next"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year . "&day=" . "1"; ?>">&#10095; Next</a></li>
			<li><?php echo "<span>". $monthNames[$cMonth-1].'</span> ' . '<br>' . '<span> '.$cYear . '</span>'; ?></li>
		</ul>
	</div>
	<div id="myTable" class="table-responsive">
		<table class="table table-bordered">		
		<tr class="weekdays">		
			<th>Mo</th>
			<th>Tu</th>
			<th>We</th>
			<th>Th</th>
			<th>Fr</th>
			<th>Sa</th>
			<th>Su</th>
		</tr>

	<?php 
			$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
			$maxday = date("t",$timestamp);
			$thismonth = getdate ($timestamp);
			$startday = $thismonth['wday'];
			for ($i=0; $i<($maxday+$startday); $i++) {

				if(($i % 7) == 0 ) echo "<tr> ";
				if($i < $startday) echo "<td></td> ";
				
				else {
					$cMonth = $_REQUEST["month"];
					$cYear = $_REQUEST["year"];
					
					echo "<td class='mytd'>". "<a class='myA' href=" . $_SERVER['PHP_SELF'] . "?month=" . $cMonth . "&year=" .$cYear . "&day=" . ($i - $startday +1) . ">" . ($i - $startday + 1) . "</a>" . "</td> ";
				}
				if(($i % 7) == 6 ) echo "</tr> ";
			}
	?>
	</table>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>	  
		<script src="js/main.js"></script>
		<!-- jQuery library -->
		</div>
		</div>
		</div>	
	<body>
</html>



