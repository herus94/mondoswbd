<?php
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
                <h2 class="title"> Inserimento Impiegati: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="employeeform" name="employeeform" method="post">
                    <input type="text" class="input" name="employeeusername" placeholder="Username" required /> <br> <br>
                    <input type="text" class="input" name="email" placeholder="Email" required> <br> <br>
                    <input type="text" class="input" name="nome" placeholder="Nome" required> <br> <br>
                    <input type="text" class="input" name="cognome" placeholder="Cognome" required> <br> <br>
                    <input type="password" class="input" name="password" placeholder="Password" required> <br> <br>
                    <input type="text" class="input" name="cf" minlength="16" maxlength="16" placeholder="Codice Fiscale" required> <br> <br>
                    <input type="number" class="input" name="stipendio" placeholder="Stipendio" required> <br> <br>
                    <input type="number" class="input" name="telefono" placeholder="Telefono" maxlength="15" required> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" name="submit" value="Inserisci" class="button" required> <br>
                    </div>
                    <br>
                </form>
            </div>
            <div class="columns is-centered is-mobile">
                <h2 class="title"> Gestione Stipendio Dipendenti: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="stipendioform" name="stipendioform" method="post">
                    <input type="text" class="input" name="employeecheck" placeholder="Username Dipendente" required /> <br> <br>
                    <input type="number" class="input" name="stipendio" placeholder="Nuovo Stipendio" required> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" name="submit" value="Aggiorna" class="button" required> <br>
                        <br>
                    </div>
                </form>
            </div>
            <div class="columns is-centered is-mobile">
                <h2 class="title"> Rimozione Dipendenti: </h2>
            </div>
            <p class="mt-5"></p>
            <div class="columns is-centered is-mobile">
                <form class="form" action="http://localhost:80/mondoswbd/server.php" id="removeemployeeform" name="removeemployeeform" method="post">
                    <input type="text" class="input" name="removeemployee" placeholder="Username Dipendente" required /> <br> <br>
                    <div class="has-text-centered">
                        <input type="submit" name="submit" value="Rimuovi" class="button" required> <br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>