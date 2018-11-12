<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Kalender</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
	?>
	<?php
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
	<table width="400" border="5" align="center">
		<tr align="center">
			<td bgcolor="#999999" style="color:#FFFFFF">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td width="50%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year . "&day=" . "1"; ?>" style="color:#FFFFFF">Previous</a></td>
				<td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year . "&day=" . "1"; ?>" style="color:#FFFFFF">Next</a>  </td>
				</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td align="center">
				<table width="100%" border="2" cellpadding="2" cellspacing="2">
					<tr align="center">
						<td colspan="7" bgcolor="#999999" style="color:#FFFFFF">
						<strong> <?php echo $monthNames[$cMonth-1].' '.$cYear; ?> </strong>
						</td>
					</tr>
					<tr>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Zo</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Ma</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Di</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Wo</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Do</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Vr</strong></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Za</strong></td>
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
						echo "<td align='center' valign='middle' height='20px'>". "<a href=" . $_SERVER['PHP_SELF'] . "?month=" . $cMonth . "&year=" .$cYear . "&day=" . ($i - $startday +1) . ">" . ($i - $startday + 1) . "</a>" . "</td> ";
					}
					if(($i % 7) == 6 ) echo "</tr> ";
				}
				?>
				</table>
			</td>
		</tr>
	</table>
	<?php
		$cDay = $_REQUEST["day"];
		if ($cDay < 10) {
			$cDay = "0" . $cDay;
			$searchdate = $cYear . "-" . $cMonth . "-" . $cDay;
		}
		else 
			$searchdate = $cYear . "-" . $cMonth . "-" . $cDay;
		
		
		$query = $db->query("SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date like" . "'" . $searchdate . "'");
		$count = $query->rowCount();
	
		if ($count > 0)
		{
			
			while ($row = $query->fetch())
			{
				
				echo "<p align='center'>Brengen naar:</a>";
				echo "<table border='1' cellpadding='10' align='center'>";
				echo "<tr> <th>Gebruiker</th> <th>Product</th> <th>Aantal</th> <th>Datum</th> <th>Datum bestelling</th> <th>Datum terug</th> <th>Locatie</th></tr>";
				
					echo "<tr>";
					echo '<td>' . $row[9] . '</td>';
					echo '<td>' . $row[14] . '</td>';
					echo '<td>' . $row[3] . '</td>';
					echo '<td>' . $row[4] . '</td>';
					echo '<td>' . $row[5] . '</td>';
					echo '<td>' . $row[6] . '</td>';
					echo '<td>' . $row[7] . '</td>';
					echo "</tr>";
					echo "</table>";
			}
		}
		else {
			echo "<p align='center'>Vandaag hoeft er niks worden gebracht.</p><br/><br/>";
		}

		$query = $db->query("SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date like" . "'" . $searchdate . "'");
		$count = $query->rowCount("SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date_back like" . "'" . $searchdate . "'");
		
		if ($count > 0)
		{
			while ($row = $query->fetch())
			{
				echo "<p align='center'>Komt terug:</a>";
				echo "<table border='1' cellpadding='10' align='center'>";
				echo "<tr> <th>Gebruiker</th> <th>Product</th> <th>Aantal</th> <th>Datum</th> <th>Datum bestelling</th> <th>Datum terug</th> <th>Locatie</th></tr>";
				
					echo "<tr>";
					echo '<td>' . $row[9] . '</td>';
					echo '<td>' . $row[14] . '</td>';
					echo '<td>' . $row[3] . '</td>';
					echo '<td>' . $row[4] . '</td>';
					echo '<td>' . $row[5] . '</td>';
					echo '<td>' . $row[6] . '</td>';
					echo '<td>' . $row[7] . '</td>';
					echo "</tr>";
					echo "</table>";
			}
		}
		else {
			echo "<p align='center'>Vandaag hoeft er niks worden opgehaald.</p><br/><br/>";
		}
		//$result = mysqli_query($conn, "SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date like" . "'" . $searchdate . "'")
		//$result = mysqli_query($conn, "SELECT * FROM reserveringen INNER JOIN gebruikers ON reserveringen.gebruikers_id=gebruikers.id INNER JOIN producten ON reserveringen.product_id = producten.id WHERE date_back like" . "'" . $searchdate . "'")
		
		
	?>
	<body>
</html>



