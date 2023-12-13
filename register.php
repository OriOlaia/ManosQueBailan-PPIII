

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Manos que Bailan</title>
</head>
<body>
    <header>

    </header>
    <section>
        <h2>Registrate</h2>
        <form action="" method="post" name="signup-form">
            <div class="mb-3">
                <label for="exampleInputUser1" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="exampleInputUser1" name="username" aria-describedby="userHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" name="register" value="register" class="btn btn-primary">Registrar</button>
        </form>
        <!--REGISTRO CON PHP-->
        <?php
            include('config.php');
            session_start();
            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $query->execute();
                if ($query->rowCount() > 0) {
                    echo '<p class="error">The email address is already registered!</p>';
                }
                if ($query->rowCount() == 0) {
                    $query = $connection->prepare("INSERT INTO users(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
                    $query->bindParam("username", $username, PDO::PARAM_STR);
                    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
                    $query->bindParam("email", $email, PDO::PARAM_STR);
                    $result = $query->execute();
                    if ($result) {
                        echo '<p class="success">Your registration was successful!</p>';
                        echo '<a href="login.php">Iniciar</a>';
                    } else {
                        echo '<p class="error">Something went wrong!</p>';
                    }
                }
            }
            ?>
            <!--FIN DE REGISTRO CON PHP-->
    </section>
    <footer>

    </footer>
</body>
</html>