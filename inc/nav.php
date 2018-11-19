
<span style="font-size:30px;cursor:pointer" onclick="openNav()" id="mySideNav">&#9776; Menu</span>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="reserveringen.php">Kalender</a>
    <a href="voorraad.php">Voorraad</a>
    <a href="logout.php">Afmelden</a>
    </div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "20.6em";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
