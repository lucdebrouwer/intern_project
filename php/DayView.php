<?php
require_once('classes/Database.php');
$db = new Database;

$query = $db->query("SELECT productID, naam, categorieID, date FROM producten LIMIT 5");

$count = $query->rowCount();
if($count > 0) { 
    while($row = $query->fetch())
    {
        echo "<tr>";
            echo "<td id='td1'>" . $row[0] . "</td>";
            echo "<td id='td2'>" . $row[1] . "</td>";
            echo "<td id='td3'>" . $row[2] . "</td>";
            echo "<td id='td4'>" . $row[3] . "</td>";
        echo "</tr>";
    }
} 
?>