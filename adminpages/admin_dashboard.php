<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Area Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/admin_dashboard.php">
                            Home
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/employees_dashboard.php/">
                            Lista Impiegati
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/contracts_dashboard.php/">
                            Lista Contratti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/clients_dashboard.php/">
                            Lista Clienti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/furniture_dashboard.php/">
                            Lista Mobili
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/employees_management.php/">
                            Gestione Impiegati
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/contracts_management.php/">
                            Gestione Contratti
                        </a>
                        <a class="navbar-item" href="http://localhost:80/mondoswbd/adminpages/furniture_management.php/">
                            Gestione Mobili
                        </a>
                    </div>
                </div>
            </nav>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <h1 class="is-family-code">Schermata di Amministrazione</h2>
            </div>
            <p class="mt-3"></p>
            <img src="https://media.giphy.com/media/IqybrsS3F5dFZo2rpy/giphy.gif" width="200" height="200">
        </div>
    </div>
</body>

</html>