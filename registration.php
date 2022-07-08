<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
        function show() {
            document.getElementById('clientArea').style.display = 'block';
            document.getElementById('clientArea2').style.display = 'none';

        }

        function show2() {
            document.getElementById('clientArea2').style.display = 'block';
            document.getElementById('clientArea').style.display = 'none';

        }
    </script>
    <meta charset="utf-8" />
    <title>Registrazione</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <p class="mt-5"></p>
    <div class="columns is-centered is-mobile">
        <p class="mt-1">
        <h1 class="title">Registrazione</h1>
        </p>
    </div>
    <div class="columns is-centered is-mobile">
        <div class="box has-text-centered">
            <form class="form" action="http://localhost:80/mondoswbd/server.php" method="post">
                <input type="text" class="input" name="username" minlength="4" placeholder="Username" autofocus="true" required /> <br> <br>
                <input type="text" class="input" name="email" placeholder="Email" required> <br> <br>
                <input type="text" class="input" name="nome" placeholder="Nome" required> <br> <br>
                <input type="text" class="input" name="cognome" placeholder="Cognome" required> <br> <br>
                <input type="password" class="input" name="password" minlength="6" placeholder="Password" required> <br> <br>
                <input type="number" class="input" name="telefono" placeholder="Telefono" maxlength="15" required> <br> <br>
                <p>Seleziona la tipologia di cliente:</p>
                <input type="radio" id="clientType" onclick="show();" name="tipo" value="Privato" required>
                <label for="clientType1" class="radio">Privato</label>
                <input type="radio" id="clientType" onclick="show2();" name="tipo" value="Azienda">
                <label for="clientType2" class="radio">Azienda</label> <br> <br>
                <input type="text" id="clientArea" style="display: none;" class="input" name="cf" minlength="16" maxlength="16" placeholder="Codice Fiscale">
                <input type="text" id="clientArea2" style="display: none;" class="input" name="pIva" minlength="11" maxlength="11" placeholder="Partita IVA">
                <br>
                <input type="submit" name="submit" value="Registrati" class="button"> <br>
                <br>
                <p class="link"><a href="http://localhost:80/mondoswbd/login.php">Clicca per effettuare il Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>