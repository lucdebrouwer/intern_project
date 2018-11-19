<?php

require_once('classes/Database.php');
$db = new Database;

$query = $db->query("SELECT * FROM producten");

$count = $query->rowCount();
if($count > 0) {
    while($row = $query->fetch())
    {
        echo "<tr>";
            echo "<td id='td1'>" . $row[0] . "</td>";
            echo "<td id='td2'>" . $row[1] . "</td>";
            echo "<td id='td3'>" . $row[2] . "</td>";
            echo "<td id='td4'>" . $row[3] . "</td>";
            echo "<td id='td4'>" . $row[4] . "</td>";
            echo "<td id='td5'><a onclick='document.getElementById(\"id\").value=".$row[0]."' data-toggle='modal' data-target='#exampleModal' href=''><img data-toggle='tooltip' data-id='$row[0]' data-placement='top' title='Edit' src='img/edit.svg' height='25'></a></td>";
            echo "<td id='td6'><a id='btn_link' href='php/Delete.php?id=".$row[0]."'><img data-toggle='tooltip' data-placement='top' title='Delete' src='img/delete_2.svg' height='25'></a></td>";
            //echo "<td  id='td5'><button type='button' class='btn btn-danger'>Delete</button></td>";
        echo "</tr>";
    }
}
?>