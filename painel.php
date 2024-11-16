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
    <link rel="stylesheet" href="./public/CSS/painel.css">
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
                        <h3>Quanto cobrar pelo seu serviço?</h3>
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
        /* API */
        /*
            document.getElementById("searchForm").addEventListener("submit", async function (event) {
            event.preventDefault(); // Evita o comportamento padrão do formulário
            const input = document.getElementById("veiculoInput").value.trim();

            if (input === "") {
                alert("Por favor, digite um modelo de veículo.");
                return;
            }

            const resultadosDiv = document.getElementById("resultados");
            resultadosDiv.innerHTML = "<p>Carregando...</p>";

            try {
                // Faz a chamada para obter as marcas
                const marcasResponse = await fetch("https://parallelum.com.br/fipe/api/v1/carros/marcas");
                const marcas = await marcasResponse.json();

                const resultados = [];

                // Itera sobre cada marca e busca modelos correspondentes ao input
                for (const marca of marcas) {
                    const modelosResponse = await fetch(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca.codigo}/modelos`);
                    const modelos = await modelosResponse.json();

                    // Filtra os modelos que incluem o texto digitado no input
                    const modelosFiltrados = modelos.modelos.filter(modelo =>
                        modelo.nome.toLowerCase().includes(input.toLowerCase())
                    );

                    // Adiciona os resultados encontrados ao array
                    modelosFiltrados.forEach(modelo => {
                        resultados.push({
                            marca: marca.nome,
                            modelo: modelo.nome,
                            codigo: modelo.codigo,
                        });
                    });
                }

                // Exibe os resultados na div
                if (resultados.length > 0) {
                    resultadosDiv.innerHTML = "<h4>Resultados encontrados:</h4>";
                    resultados.forEach(item => {
                        const itemHtml = `
                            <p><strong>Marca:</strong> ${item.marca} | <strong>Modelo:</strong> ${item.modelo} | <strong>Código:</strong> ${item.codigo}</p>
                        `;
                        resultadosDiv.innerHTML += itemHtml;
                    });
                } else {
                    resultadosDiv.innerHTML = "<p>Nenhum modelo encontrado.</p>";
                }
            } catch (error) {
                console.error("Erro ao buscar dados:", error);
                resultadosDiv.innerHTML = "<p>Ocorreu um erro ao buscar os dados. Tente novamente.</p>";
            }
        });
        */
    </script>
</body>
</html>
