<?php
function queryToDB($query)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mondoswbd";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connessione fallita");
    }
    $result = mysqli_query($conn, $query);

    if (!$result) {
        exit("Errore: impossibile eseguire la query" . mysqli_error($conn));
    }

    mysqli_close($conn);

    return $result;
}

if (isset($_POST['removefurniture'])) {
    $codice = $_POST["removefurniture"];
    $sql_c = "SELECT * FROM mobili WHERE codice ='$codice'";
    $res_c = queryToDB($sql_c);

    if (mysqli_num_rows($res_c) == 0) {
        $result = null;
    } else {
        $query    = "DELETE FROM `mobili` 
        WHERE `codice` ='$codice'";
        $result   = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Mobile rimosso con successo.</h3><br/>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
        <h3>Errore nella modifica. E' stato selezionato un codice non presente in database.</h3><br/>
        </div></div></div>";
    }
}

if (isset($_POST['removeemployee'])) {
    $username = $_POST["removeemployee"];
    $sql_u = "SELECT * FROM utenti WHERE username ='$username'";
    $res_u = queryToDB($sql_u);
    $sql_t = "SELECT tipo FROM utenti WHERE username = '$username'";
    $res_t = queryToDB($sql_t);
    if (mysqli_num_rows($res_u) > 0) {
        $row = mysqli_fetch_array($res_t);
        $tipo = $row[0];
    }

    if (mysqli_num_rows($res_u) == 0 || $tipo != "Dipendente") {
        $result = null;
    } else {
        $query    = "DELETE FROM `utenti` 
        WHERE `username` ='$username'";
        $result   = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Impiegato rimosso con successo.</h3><br/>
              <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php'>tornare indietro</a>.</p>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
        <h3>Errore nella modifica. E' stato selezionato un impiegato non presente in database.</h3><br/>
        <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php'>tornare indietro</a>.</p>
        </div></div></div>";
    }
}

if (isset($_POST['furniturecode'])) {
    $code = $_POST["furniturecode"];
    $quantita = $_POST["quantita"];
    $sql_c = "SELECT * FROM mobili WHERE codice ='$code'";
    $res_c = queryToDB($sql_c);

    if (mysqli_num_rows($res_c) == 0) {
        $result = null;
    } else if ($quantita < 0) {
        $result = null;
    } else {
        $query    = "UPDATE `mobili`
        SET quantita = '$quantita' 
        WHERE `codice` ='$code'";
        $result   = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Quantità aggiornata con successo.</h3><br/>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
        <h3>Errore nella modifica. E' stato selezionato un codice non presente in database o immesso un valore non corretto.</h3><br/>
        </div></div></div>";
    }
}

if (isset($_POST['employeecheck'])) {
    $username = $_POST["employeecheck"];
    $stipendio = $_POST["stipendio"];
    $sql_u = "SELECT * FROM utenti WHERE username ='$username'";
    $res_u = queryToDB($sql_u);

    if (mysqli_num_rows($res_u) == 0 || $stipendio > 1000000 || $stipendio < 0) {
        $result = null;
    } else {
        $query    = "UPDATE `utenti`
        SET stipendio = '$stipendio' 
        WHERE `username` ='$username'";
        $result   = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Stipendio aggiornato con successo.</h3><br/>
              <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php'>tornare indietro</a>.</p>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
        <h3>Errore nella modifica. E' stato selezionato un dipendente non presente in database o è stato scelto un valore non valido.</h3><br/>
        <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php'>tornare indietro</a>.</p>
        </div></div></div>";
    }
}


if (isset($_POST['username'])) {
    $username = addslashes($_POST["username"]);
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $nome = addslashes($_POST["nome"]);
    $cognome = addslashes($_POST["cognome"]);
    $telefono = $_POST["telefono"];
    $tipo = $_POST['tipo'];
    $cf = $_POST['cf'];
    $pIva = $_POST['pIva'];
    if (empty($_POST['cf'])) {
        $cf = 'NULL';
    }
    if (empty($_POST['pIva'])) {
        $pIva = 'NULL';
    }
    $sql_u = "SELECT * FROM utenti WHERE username='$username'";
    $sql_e = "SELECT * FROM utenti WHERE email='$email'";
    $res_u = queryToDB($sql_e);
    $res_e = queryToDB($sql_u);

    if (mysqli_num_rows($res_u) > 0) {
        $result = null;
    } else if (mysqli_num_rows($res_e) > 0) {
        $result = null;
    } else {
        $query    = "INSERT into `utenti` (username, password, email, telefono, nome, cognome, tipo, cf, pIva)
                     VALUES ('$username', '$password', '$email', '$telefono', '$nome', '$cognome', '$tipo', '$cf', '$pIva')";
        $result   = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Utente registrato con successo.</h3><br/>
              <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/login.php'>loggarti</a>.</p>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
        <h3>Errore nella Registrazione. Uno o piu' campi non sono corretti o già in utilizzo.</h3><br/>
        <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/registration.php'>registrarti</a> di nuovo.</p>
        </div></div></div>";
    }
}

if (isset($_POST['employeeusername'])) {
    $username = addslashes($_POST["employeeusername"]);
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $nome = addslashes($_POST["nome"]);
    $cognome = addslashes($_POST["cognome"]);
    $telefono = $_POST["telefono"];
    $cf = $_POST["cf"];
    $stipendio = $_POST["stipendio"];
    $sql_u = "SELECT * FROM utenti WHERE username='$username'";
    $sql_e = "SELECT * FROM utenti WHERE email='$email'";
    $res_u = queryToDB($sql_e);
    $res_e = queryToDB($sql_u);

    if (mysqli_num_rows($res_u) > 0) {
        $result = null;
    } else if (mysqli_num_rows($res_e) > 0) {
        $result = null;
    } else {
        $query = "INSERT INTO `utenti` (`username`, `password`, `email`, `telefono`, `nome`, `cognome`, `cf`, `pIva`, `tipo`, `stipendio`) VALUES ('$username','$password', '$email', '$telefono', '$nome', '$cognome', '$cf', NULL, 'Dipendente', '$stipendio')";
        $result = queryToDB($query);
    }
    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Impiegato registrato con successo.</h3><br/>
              <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php/'> tornare indietro</a></p>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
              <h3>Errore nella Registrazione. Uno o piu' campi non sono corretti o già in utilizzo.</h3><br/>
              <p class='link'>Clicca qui per <a href='http://localhost:80/mondoswbd/adminpages/admin_dashboard.php/'>tornare indietro</a>.</p>
              </div></div></div>";
    }
}

if (isset($_POST['number'])) {
    $number = $_POST["number"];
    $total = $_POST["total"];
    $data = $_POST["data"];
    $acquirente = $_POST["acquirente"];
    $sql_n = "SELECT * FROM contratti WHERE numero='$number'";
    $res_n = queryToDB($sql_n);
    if (mysqli_num_rows($res_n) > 0 || $total < 0 || $number < 0) {
        $result = null;
    } else {
        $query = "INSERT INTO `contratti` (`numero`, `totale`, `data`, `acquirente`) VALUES ('$number','$total', '$data', '$acquirente')";
        $result = queryToDB($query);
    }

    if ($result) {
        echo "<div class='columns is-centered is-mobile'>
        <div class='box'>
        <div class='form'>
              <h3>Contratto registrato con successo.</h3><br/>
              </div></div></div>";
    } else {
        echo "<div class='columns is-centered is-mobile'> 
        <div class='box'>
        <div class='form'>
              <h3>Errore nella Registrazione. E' stato scelto un numero contratto gia' presente o sono stati assegnati valori non corretti.</h3><br/>
              </div></div></div>";
    }
}



if (isset($_GET["type"])) {

    if ($_GET["type"] == "fetch_contracts") {
        $query = "SELECT * FROM `contratti`";
        $result = queryToDB($query);
        echo '
            <table class="table">
                <tr> 
                    <th>Numero Contratto</th>
                    <th>Totale</th>
                    <th>Acquirente</th>
                    <th>Data</th>
                </tr>
            ';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['numero'] . '</td>';
            echo '<td>' . $row['totale'] .  '€' . '</td>';
            echo '<td>' . $row['acquirente'] . '</td>';
            echo '<td>' . $row['data'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if ($_GET["type"] == "fetch_staff") {
        $query = "SELECT * FROM `utenti` WHERE tipo = 'Dipendente'";
        $result = queryToDB($query);
        echo '
            <table class="table">
                <tr> 
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Codice Fiscale</th>
                    <th>Stipendio</th>
                    <th>Telefono</th>
                </tr>
            ';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['cognome'] . '</td>';
            echo '<td>' . $row['cf'] . '</td>';
            echo '<td>' . $row['stipendio'] . '€' . '</td>';
            echo '<td>' . $row['telefono'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if ($_GET["type"] == "fetch_clients") {
        $query = "SELECT * FROM `utenti` WHERE isAdmin = 0 && tipo != 'dipendente' ";
        $result = queryToDB($query);
        echo '
            <table class="table">
                <tr> 
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nome</th>
                    <th>Cognome</th>                    
                    <th>Telefono</th>
                    <th>Tipo</th>
                    <th>C.F</th>
                    <th>P.Iva</th>
                </tr>
            ';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['cognome'] . '</td>';
            echo '<td>' . $row['telefono'] . '</td>';
            echo '<td>' . $row['tipo'] . '</td>';
            if ($row['cf'] == 'NULL') {
                $row['cf'] = '';
            }
            if ($row['pIva'] == 'NULL') {
                $row['pIva'] = '';
            }
            echo '<td>' . $row['cf'] . '</td>';
            echo '<td>' . $row['pIva'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    if ($_GET["type"] == "fetch_furniture") {
        $query = "SELECT * FROM `mobili`";
        $result = queryToDB($query);
        echo '
            <table class="table">
                <tr> 
                    <th>Codice</th>
                    <th>Modello</th>
                    <th>Prezzo</th>
                    <th>Quantità</th>
                    <th>Immagine</th>
                </tr>
            ';
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['codice'] . '</td>';
            echo '<td>' . $row['modello'] . '</td>';
            echo '<td>' . $row['prezzo'] . '€' . '</td>';
            echo '<td>' . $row['quantita'] . '</td>';
            echo '<td>' . '<img src="' . $row['immagine'] . '"' . 'height="150" width="150">' . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
