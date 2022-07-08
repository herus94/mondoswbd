<?php
$c = curl_init('http://localhost:80/mondoswbd/server.php?type=fetch_clients');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$clients_table = curl_exec($c);

if (curl_error($c))
    die(curl_error($c));

curl_close($c);
?>

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
                <h2 class="title"> Lista Clienti: </h2>
                <p class="mt-2"></p>
            </div>
            <div class="columns is-centered is-mobile">
                <?php
                echo $clients_table;
                ?>
            </div>
        </div>
</body>

</html>