<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
<?php
/*
if (!isset($_SESSION['ID']) && $_SESSION['ID'] == NULL) {
    echo '
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="reserveringen.php">Kalender</a>
    <a href="contact.php">Voorraad</a>
    <a href="logout.php">Afmelden</a>
    </div>';
}
*/
?>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="reserveringen.php">Kalender</a>
    <a href="voorraad.php">Voorraad</a>
    <a href="logout.php">Afmelden</a>
    </div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "15.6em";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
