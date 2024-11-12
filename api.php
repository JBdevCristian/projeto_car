<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo de API</title>
</head>
    <body>

        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <label for="marca">Marca:</label>
        <select name="marca" id="marca" onchange="this.form.submit()">
            <option value="">Selecione uma marca</option>
            <?php foreach ($marcas as $marca): ?>
                <option value="<?php echo $marca['codigo']; ?>" <?php if (isset($_POST['marca']) && $_POST['marca'] == $marca['codigo']) echo 'selected'; ?>>
                    <?php echo $marca['nome']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (!empty($modelos)): ?>
            <label for="modelo">Modelo:</label>
            <select name="modelo" id="modelo" onchange="this.form.submit()">
                <option value="">Selecione um modelo</option>
                <?php foreach ($modelos as $modelo): ?>
                    <option value="<?php echo $modelo['codigo']; ?>" <?php if (isset($_POST['modelo']) && $_POST['modelo'] == $modelo['codigo']) echo 'selected'; ?>>
                        <?php echo $modelo['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>

        <?php if (!empty($anos)): ?>
            <label for="ano">Ano:</label>
            <select name="ano" id="ano" onchange="this.form.submit()">
                <option value="">Selecione um ano</option>
                <?php foreach ($anos as $ano): ?>
                    <option value="<?php echo $ano['codigo']; ?>" <?php if (isset($_POST['ano']) && $_POST['ano'] == $ano['codigo']) echo 'selected'; ?>>
                        <?php echo $ano['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
    </form>

    <?php if (isset($tabelaFipe)): ?>
        <div id="desc">
            <p><strong>Ano:</strong> <?php echo $tabelaFipe['AnoModelo']; ?></p>
            <p><strong>Combustível:</strong> <?php echo $tabelaFipe['Combustivel']; ?></p>
            <p><strong>Marca:</strong> <?php echo $tabelaFipe['Marca']; ?></p>
            <p><strong>Modelo:</strong> <?php echo $tabelaFipe['Modelo']; ?></p>
            <p><strong>Valor:</strong> <?php echo $tabelaFipe['Valor']; ?></p>
        </div>
    <?php endif; ?>
        
    </body>

    <script> 

        async function consumoApi() {
            let req = await fetch("https://parallelum.com.br/fipe/api/v1/carros/marcas");
            let data = await req.json();
        
            console.log(data);
        
          
            var select = document.getElementById("marca");
        
           
            select.innerHTML = '';
        
           
            data.forEach(item => {
                var option = document.createElement("option");
                option.value = item.codigo; // Definir o valor da opção
                option.innerHTML = item.nome; // Definir o texto da opção
                select.appendChild(option); // Adicionar a opção ao select
            });
        
            // Adicionar um event listener para capturar a opção selecionada
            select.addEventListener("change", function() {
                // Obter a opção selecionada
                let marca = select.value; // valor (código) da opção selecionada
                let selectedText = select.options[select.selectedIndex].text; // texto da opção selecionada

                marcas(marca);
            });
        }

        async function marcas(marca) {
            let UrlModelo = await fetch(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos`)
            let dataModelo = await UrlModelo.json();

            console.log(dataModelo.modelos)

            var select = document.getElementById("modelo");

            dataModelo.modelos.forEach(modelo => {
                var option = document.createElement("option");

                option.value = modelo.codigo; // Definir o valor da opção
                option.innerHTML = modelo.nome; // Definir o texto da opção
                select.appendChild(option); // Adicionar a opção ao select
            });

            select.addEventListener("change", function() {
                let modeloCarro = select.value;
                let modeloTxt = select.options[select.selectedIndex].text;

                anoCarro(marca, modeloCarro)
            })
        }

        async function anoCarro(marca, modelo) {
            let urlAno = await fetch(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos/${modelo}/anos`)
            let dataAno = await urlAno.json();

            var select = document.getElementById("ano");

            dataAno.forEach(ano => {
                var option = document.createElement("option");

                option.value = ano.codigo; // Definir o valor da opção
                option.innerHTML = ano.nome; // Definir o texto da opção
                select.appendChild(option); // Adicionar a opção ao select

                console.log(ano)
            })

            select.addEventListener("change", function() {
                let ano = select.value;
                let anoTxt = select.options[select.selectedIndex].text;

                tabelaFipe(marca, modelo, ano);
            });

        }

        async function tabelaFipe(marca, modelo, ano) {
            let urlTabela = await fetch(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos/${modelo}/anos/${ano}`)
            let dataTab = await urlTabela.json();

            console.log(dataTab);

            let div = document.getElementById("desc");
            let p = document.createElement("p");
            let p1 = document.createElement("p");
            let p2 = document.createElement("p");
            let p3 = document.createElement("p");
            let p4 = document.createElement("p");

            p.innerHTML = dataTab.AnoModelo;
            p1.innerHTML = dataTab.Combustivel;
            p2.innerHTML = dataTab.Marca;
            p3.innerHTML = dataTab.Modelo;
            p4.innerHTML = dataTab.Valor;

            div.appendChild(p);
            div.appendChild(p1);
            div.appendChild(p2);
            div.appendChild(p3);
            div.appendChild(p4);
        }

        
        

        consumoApi();

    </script>

        <?php
        function fetchApiData($url) {
            $response = file_get_contents($url);
            return json_decode($response, true);
        }

        // Obter as marcas
        $marcasUrl = "https://parallelum.com.br/fipe/api/v1/carros/marcas";
        $marcas = fetchApiData($marcasUrl);

        // Inicializar variáveis para os selects
        $modelos = [];
        $anos = [];

        // Se uma marca foi selecionada
        if (isset($_POST['marca'])) {
            $marca = $_POST['marca'];
            $modelosUrl = "https://parallelum.com.br/fipe/api/v1/carros/marcas/$marca/modelos";
            $modelos = fetchApiData($modelosUrl)['modelos'];
        }

        // Se uma marca e um modelo foram selecionados
        if (isset($_POST['marca']) && isset($_POST['modelo'])) {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anosUrl = "https://parallelum.com.br/fipe/api/v1/carros/marcas/$marca/modelos/$modelo/anos";
            $anos = fetchApiData($anosUrl);
        }

        // Se a marca, o modelo e o ano foram selecionados
        if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['ano'])) {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $ano = $_POST['ano'];
            $tabelaUrl = "https://parallelum.com.br/fipe/api/v1/carros/marcas/$marca/modelos/$modelo/anos/$ano";
            $tabelaFipe = fetchApiData($tabelaUrl);
        }
        ?>

</html>