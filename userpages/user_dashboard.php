<?php
$c = curl_init('http://localhost:80/mondoswbd/server.php?type=fetch_furniture');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$furniture_table = curl_exec($c);

if (curl_error($c))
    die(curl_error($c));

curl_close($c);
?>

<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Area Clienti</title>
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
            <p><a href="http://localhost:80/mondoswbd/userpages/logout.php">Logout</a></p>
            <h2> Mobili Attualmente Disponibili: </h2>
            <?php
            echo $furniture_table;
            ?>
        </div>
    </div>
</body>

</html>