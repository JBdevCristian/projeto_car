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


    <div class="content collapsed" id="content">
    <!-- Centraliza todo o conteúdo -->
    <div id="info" class="row d-flex justify-content-center align-items-center min-vh-100">
        <!-- Centraliza o conteúdo verticalmente e horizontalmente -->
        
        <div class="col-12 col-md-6">
        <!-- Card com imagem e nome -->
        <div class="card-perfil-info mb-4">
            <div class="fundo">
                <p>Perfil</p>
                <label class="ml-auto">Entrou em 2024</label>
            </div>
            <div class="profile-image">
                    <img src="https://via.placeholder.com/150" alt="Foto de Perfil">
                </div>
            <div class="card-body text-center d-flex">
                <h3 class="card-title">Cristian Adagoberto Enes Vianna da Silva</h3>
                <a href="#" class="card-link ml-auto">Alterar nome</a>
            </div>
        </div>

        <!-- Informações da conta -->
            <div id="info-conta" class="mb-4">
                <h3>Informações da Conta</h3>
                <div class="card-perfil-user">
                    <p>Nacionalidade</p>
                    <h5>Brasileiro</h5>
                    <p>Id da Conta</p>
                    <h5>(ASDASD46A5S4DAS)</h5>
                    <p>CPF</p>
                    <h5>496.476.678-09</h5>
                    <button>Encerrar Conta</button>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6">
            <div id="emails" class="mb-4">
                <div class="d-flex">
                    <h3>E-mails</h3>
                    <button class="btn btn-primary mb-3">Adicionar +</button>
                </div>
                <div class="email card-perfil mb-2">
                    <i>(logo email)</i>
                    <label for="">Principal</label>
                    <p>jbcristian78@gmail.com</p>
                    <a href="#">editar</a>
                </div>
            </div>

            <div id="telefones" class="mb-4">
                <div class="d-flex">
                    <h3>Numeros de telefone</h3>
                    <button class="btn btn-primary mb-3">Adicionar +</button>
                </div>
                <div class="telefone card-perfil mb-2">
                    <i>(logo telefone)</i>
                    <label for="">Principal</label>
                    <p>(11) 94112-5900</p>
                    <a href="#">editar</a>
                </div>
            </div>

            <div id="enderecos" class="mb-4">
                <div class="d-flex">
                    <h3>Endereços</h3>
                    <button class="btn btn-primary mb-3">Adicionar +</button>
                </div>
                <div class="endereco card-perfil mb-2">
                    <i>(logo casa)</i>
                    <label for="">Principal</label>
                    <p>Rua maria rosa fernandes, Parque Taboão, Taboão da serra SP 06764450</p>
                    <a href="#">editar</a>
                </div>
            </div>
        </div>
    
    </div>
</div>



    
    
<style>
    /* Pefil */
    .card-perfil-info {
        background-color: white;
        border-radius: 10px;
        border: 1px solid #c7c7c7;
        position: relative;
    }

    .card-perfil-info h3 {
        margin-top: 10px;
        font-size: larger;
    }

    .card-perfil-info .fundo {
        background-color: #0080ff;
        border-radius: 10px 10px 0px 0px;
        width: 100%;
        height: 150px;
        position: relative; /* Necessário para criar o contexto para a imagem */
        z-index: 1; /* Define a camada inferior */
        color: white;
        display: flex;
        padding: 20px;
    }

    .profile-info {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        position: relative; /* Mantém o contexto flex */
    }

    .profile-image img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
        position: absolute; /* A imagem será posicionada dentro da div pai */
        top: 50%; /* Centraliza verticalmente em relação ao pai */
        left: 50%; /* Centraliza horizontalmente em relação ao pai */
        transform: translate(-300%, -55%); /* Ajuste fino para centralizar exato */
        z-index: 2; /* A imagem ficará acima da div .fundo */
    }
    /* Informações da conta*/
    .card-perfil-user {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #c7c7c7;
    }

    .card-perfil-user p{
        font-size: small;
        font-style: italic;
        margin: 0;
        padding: 0;
    }

    .card-perfil-user h5{
        font-size: medium;
        margin-bottom: 30px;
    }

    .card-perfil-user button {
        border: 1px solid black;
        padding: 15px;
        background-color: white;
        border-radius: 40px;
        width: 100%;
    }

    .card-perfil-user button:hover {
        background-color: #ebebeb;
    }


    .card-perfil {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #c7c7c7;
    }

   
</style>

    
</body>
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
</html>
