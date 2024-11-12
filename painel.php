<?php
    session_start();
    
    if(!isset($_SESSION["autenticado"]) == "NÃO") { 
        header("location: login.php?login=erro2");
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel de Controle - CheckCar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Adicionando Font Awesome -->
    <link rel="stylesheet" href="public/CSS/painel.css">
</head>
<body>

    <header class="d-flex justify-content-between align-items-center p-3 bg-dark text-white">
        <nav class="d-flex align-items-center w-100">
            <ul class="nav ml-auto">
                <li class="nav-item"><a class="nav-link text-white" href="#features">Funcionalidades</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#about">Sobre Nós</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#contact">Contato</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#contact"><i class="fa-solid fa-gear" style="color: #ffffff;"></i></a></li>
            </ul>
        </nav>
    </header>

    <div class="sidebar collapsed" id="sidebar">
        <h2 class="text-center mb-5">
            <i class="fas fa-tachometer-alt" id="toggleBtn"></i>
            <span class="sidebar-title">Painel de Controle</span>
        </h2>
        <nav class="nav flex-column">
            <a class="nav-link text-white" href="#profile">
                <i class="fas fa-user"></i>
                <span class="nav-text">Perfil</span>
            </a>
            <a class="nav-link text-white" href="#budget">
                <i class="fas fa-money-bill-wave"></i>
                <span class="nav-text">Orçamentos</span>
            </a>
            <a class="nav-link text-white" href="#service-history">
                <i class="fas fa-history"></i>
                <span class="nav-text">Histórico de Serviços</span>
            </a>
            <a class="nav-link text-white" href="#troubleshoot">
                <i class="fas fa-tools"></i>
                <span class="nav-text">Localizar Problema</span>
            </a>
        </nav>
    
        <div class="logo-container">
            <a href="index.php">
                <img src="public/IMG/CheckCar_side.png" alt="Logo CheckCar">
            </a>
        </div>
    </div>
    
    

    <div class="content collapsed d-flex justify-content-center" id="content"> <!-- Centraliza todo o conteúdo -->
        <div id="info" class="row text-center"> <!-- Adicionando texto centralizado -->
    
            <div class="col-md-12 mb-4"> <!-- Use mb-4 para espaço entre as colunas -->
                <h2 id="profile">Qual o modelo do veiculo?</h2>
                <form action="#" class="d-flex justify-content-center mt-5"> <!-- Flexbox para centralizar o conteúdo do formulário -->
                    <input type="text" name="veiculo" placeholder="Digite modelo" class="form-control me-2" style="width: 600px;"> <!-- Ajuste a largura aqui -->
                    <input type="submit" value="Pesquisar" class="btn btn-success">
                </form>
            </div>
    
            <div class="col-md-6 mb-4 d-flex justify-content-center"> <!-- Use mb-4 para espaço entre as colunas -->
                    <div class="card-painel">
                        <h1>teste</h1>
                    </div>
            </div>
    
            <div class="col-md-6 mb-4 d-flex justify-content-center"> <!-- Use mb-4 para espaço entre as colunas -->
                    <div class="card-painel">
                        <h1>teste</h1>
                    </div>
            </div>
    
            <div class="col-md-6 mb-4 d-flex justify-content-center"> <!-- Use mb-4 para espaço entre as colunas -->
                <div class="card-painel">
                    <h1>teste</h1>
                </div>
            </div>

            <div class="col-md-6 mb-4 d-flex justify-content-center"> <!-- Use mb-4 para espaço entre as colunas -->
                <div class="card-painel">
                    <h1>teste</h1>
                </div>
            </div>
    
        </div>
    </div>
    
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('expanded');
            content.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        });
    </script>
</body>
</html>
