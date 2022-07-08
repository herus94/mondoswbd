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
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <h2 class="title"> Gestione disponibilità mobili: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="furnitureform" name="employeeform" method="post">
                    <input type="number" class="input" name="furniturecode" placeholder="Codice Prodotto" required /> <br> <br>
                    <input type="number" class="input" name="quantita" placeholder="Nuova Quantità" required> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" name="submit" value="Aggiorna" class="button" required> <br>
                    </div>
                    <br>
                </form>
            </div>
            <div class="columns is-centered is-mobile">
                <h2 class="title"> Rimozione Mobili: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="removefurnitureform" name="removefurniture" method="post">
                    <input type="number" class="input" name="removefurniture" placeholder="Codice Mobile" required /> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" class="button" name="submit" value="Rimuovi" required> <br>
                    </div>
                    <br>
                </form>
            </div>

        </div>
    </div>
</body>

</html>