<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Area Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <p class="mt-5"></p>
    <div class="columns is-centered is-mobile">
        <p class="mt-1">
        <h1 class="title">Mondo SWBD</h1>
        </p>
    </div>
    <div class="columns is-centered is-mobile">
        <div class="box">
            <p>Ciao, <?php echo $_SESSION['username']; ?>!</p>
            <p><a href="http://localhost:80/mondoswbd/staffpages/logout.php">Logout</a></p>
            <nav class="navbar is-transparent">

                <div id="navbarExampleTransparentExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/employee_dashboard.php">
                            Home
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/contracts_dashboard.php/">
                            Lista Contratti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/clients_dashboard.php/">
                            Lista Clienti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/furniture_dashboard.php/">
                            Lista Mobili
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/contracts_management.php/">
                            Gestione Contratti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/staffpages/furniture_management.php/">
                            Gestione Mobili
                        </a>
                    </div>
                </div>
            </nav>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <h1 class="is-family-code">Schermata Dipendenti</h2>
            </div>
        </div>
    </div>
</body>

</html>