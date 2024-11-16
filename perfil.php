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

    
    
    <? include("./public/views/sidebar.php"); ?>

    <div class="content collapsed d-flex justify-content-center" id="content"> <!-- Centraliza todo o conteúdo -->
        <div id="info" class="row text-center"> <!-- Adicionando texto centralizado -->
    
        <div class="col-md-12 mb-4">
            <h2 id="profile">Qual o modelo do veículo?</h2>
            <form id="searchForm" class="d-flex justify-content-center mt-5">
                <input type="text" id="veiculoInput" placeholder="Digite modelo" class="form-control me-2" style="width: 600px;">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
            <div id="resultados" class="mt-4"></div> <!-- Div para exibir os resultados -->
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
