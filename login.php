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
        <h2>Iniciar sesion</h2>
        <form method="post" action="" name="signin-form">
        <div class="mb-3">
                <label for="exampleInputUser1" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="exampleInputUser1" name="username" aria-describedby="userHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <button type="submit" name="login" value="login" class="btn btn-primary">Iniciar</button>
            <a href="register.php">No tienes cuenta? Registrate</a>
        </form>
        <a href="curso.php"></a>
        <!--INICIO DE SESION CON PHP-->
        <?php
        include('config.php');
        session_start();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo '<p class="error">Username password combination is wrong!</p>';
            } else {
                if (password_verify($password, $result['password'])) {
                    $_SESSION['user_id'] = $result['id'];
                    echo '<p class="success">Congratulations, you are logged in!</p>';
                    echo '<button class="btn btn-primary"><a href="curso.php">Ir al curso</a></button>';
                } else {
                    echo '<p class="error">Username password combination is wrong!</p>';
                }
            }
        }
        ?>
        <!--FIN DE INICIO DE SESION CON PHP-->
        
    </section>
    <footer>

    </footer>
</body>
</html>