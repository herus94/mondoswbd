<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Area Staff</title>
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
            <p class="mt-3"></p>
            <div class="columns is-centered is-mobile">
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
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <h2 class="title"> Inserimento Contratti: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="contractform" name="contractform" method="post">
                    <input type="number" class="input" name="number" placeholder="Numero Contratto" required /> <br> <br>
                    <input type="number" class="input" name="total" placeholder="Totale Vendita" required> <br> <br>
                    <input type="date" class="input" name="data" placeholder="Data Vendita" required> <br> <br>
                    <input type="text" class="input" name="acquirente" placeholder="Acquirente" required> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" name="submit" value="Inserisci" class="button"> <br> <br>
                    </div>
                    <br>
                </form>
            </div>

        </div>
    </div>
</body>

</html>