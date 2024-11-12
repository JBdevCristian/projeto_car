<?php 
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - CheckCar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilo.css"> <!-- Se você tiver um estilo customizado -->
</head>
<body class="bg-light">
        <?php include("public/views/navbar.php"); ?>

    <div class="container mt-5 flex-grow-1">
        <h2 class="text-center">Acesse sua Conta</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="Sistem/log.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"  name="email" placeholder="Digite seu email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                            </div>
                            <?php
                                if (isset($_GET['login'])) {
                                    $loginStatus = $_GET['login'];
                                    if ($loginStatus === 'erro') {
                                        echo "<p style='color: red;'>E-mail ou senha incorreto, tente novamente!</p>";
                                    }
                                    if ($loginStatus === 'erro2') {
                                        echo "<p style='color: red;'>Faça o Login!</p>";
                                    }
                                }
                            ?>
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#">Esqueceu sua senha?</a>
                        </div>
                        <div class="text-center mt-2">
                            <a href="signup.php">Criar uma nova conta</a> <!-- Link para uma página de cadastro -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("public/views/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
