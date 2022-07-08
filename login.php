<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <?php
    include_once('mysql-fix.php');
    require('db.php');
    session_start();
    // Invio il form, controllo i dati ed eventualmente creo la sessione
    if (isset($_POST['username'])) {
        $username = ($_POST['username']);
        $password = md5($_POST["password"]);
        // Controlliamo se l'utente è presente nel database
        $query    = "SELECT * FROM `utenti` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $typeQuery = "SELECT tipo FROM `utenti` WHERE username='$username'";
            $isAdminQuery = "SELECT isAdmin FROM `utenti` WHERE username='$username'";
            $result_t = mysqli_query($con, $typeQuery);
            $result_a = mysqli_query($con, $isAdminQuery);
            $row_t = mysqli_fetch_array($result_t);
            $row_a = mysqli_fetch_array($result_a);
            $type = $row_t[0];
            $isAdmin = $row_a[0];
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            if ($type == "Dipendente" && $isAdmin == 1) {
                header("Location: http://localhost:80/mondoswbd/adminpages/admin_dashboard.php");
            } else if ($type == "Dipendente" && $isAdmin != 1) {
                header("Location: http://localhost:80/mondoswbd/staffpages/employee_dashboard.php");
            } else
                header("Location: http://localhost:80/mondoswbd/userpages/user_dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Dati non corretti.</h3><br/>
                  <p class='link'>Clicca qui per <a href='login.php'>loggarti</a> di nuovo.</p>
                  </div>";
        }
    } else {
    ?>
        <p class="mt-5"></p>
        <div class="columns is-centered is-mobile">
            <p class="mt-1">
            <h1 class="title">Login</h1>
            </p>
        </div>
        <div class="columns is-centered is-mobile">
            <div class="box has-text-centered">
                <form class="form" method="post" name="login">
                    <input type="text" class="input" name="username" placeholder="Username" autofocus="true" required /> <br> <br>
                    <input type="password" class="input" name="password" placeholder="Password" required /> <br> <br>
                    <input type="submit" class="button" value="Login" name="submit" /> <br> <br>
                    <p class="link"><a href="http://localhost:80/mondoswbd/registration.php">Nuova Registrazione</a></p>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>