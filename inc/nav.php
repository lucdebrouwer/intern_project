<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="mySideNav">&#9776; Menu</span>
                <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="webshop.php">Webshop</a>
                <a href="dashboard.php">Dashboard</a>
                <a href="kalender.php">Kalender</a>
                <a href="register.php">Registratie</a>
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

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "20.6em";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
