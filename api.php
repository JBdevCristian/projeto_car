<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo de API</title>
</head>
<body>
    <form id="fipeForm">
        <label for="marca">Marca:</label>
        <select name="marca" id="marca">
            <option value="">Selecione uma marca</option>
        </select>

        <label for="modelo" style="display: none;">Modelo:</label>
        <select name="modelo" id="modelo" style="display: none;">
            <option value="">Selecione um modelo</option>
        </select>

        <label for="ano" style="display: none;">Ano:</label>
        <select name="ano" id="ano" style="display: none;">
            <option value="">Selecione um ano</option>
        </select>
    </form>

    <div id="desc"></div>

    <script>
        async function fetchApiData(url) {
            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error("Erro ao buscar dados da API");
                return await response.json();
            } catch (error) {
                console.error("Erro:", error);
                alert("Falha ao buscar dados da API");
            }
        }

        async function loadMarcas() {
            const data = await fetchApiData("https://parallelum.com.br/fipe/api/v1/carros/marcas");
            const marcaSelect = document.getElementById("marca");

            if (data) {
                marcaSelect.innerHTML = '<option value="">Selecione uma marca</option>';
                data.forEach(marca => {
                    const option = document.createElement("option");
                    option.value = marca.codigo;
                    option.textContent = marca.nome;
                    marcaSelect.appendChild(option);
                });

                marcaSelect.style.display = "block";
            }
        }

        async function loadModelos(marca) {
            const data = await fetchApiData(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos`);
            const modeloSelect = document.getElementById("modelo");

            if (data) {
                modeloSelect.innerHTML = '<option value="">Selecione um modelo</option>';
                data.modelos.forEach(modelo => {
                    const option = document.createElement("option");
                    option.value = modelo.codigo;
                    option.textContent = modelo.nome;
                    modeloSelect.appendChild(option);
                });

                modeloSelect.style.display = "block";
            }
        }

        async function loadAnos(marca, modelo) {
            const data = await fetchApiData(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos/${modelo}/anos`);
            const anoSelect = document.getElementById("ano");

            if (data) {
                anoSelect.innerHTML = '<option value="">Selecione um ano</option>';
                data.forEach(ano => {
                    const option = document.createElement("option");
                    option.value = ano.codigo;
                    option.textContent = ano.nome;
                    anoSelect.appendChild(option);
                });

                anoSelect.style.display = "block";
            }
        }

        async function loadTabelaFipe(marca, modelo, ano) {
            const data = await fetchApiData(`https://parallelum.com.br/fipe/api/v1/carros/marcas/${marca}/modelos/${modelo}/anos/${ano}`);
            const descDiv = document.getElementById("desc");

            if (data) {
                descDiv.innerHTML = `
                    <p><strong>Ano:</strong> ${data.AnoModelo}</p>
                    <p><strong>Combustível:</strong> ${data.Combustivel}</p>
                    <p><strong>Marca:</strong> ${data.Marca}</p>
                    <p><strong>Modelo:</strong> ${data.Modelo}</p>
                    <p><strong>Valor:</strong> ${data.Valor}</p>
                `;
            }
        }

        document.getElementById("marca").addEventListener("change", async function () {
            const marca = this.value;
            if (marca) {
                await loadModelos(marca);
            }
        });

        document.getElementById("modelo").addEventListener("change", async function () {
            const marca = document.getElementById("marca").value;
            const modelo = this.value;
            if (marca && modelo) {
                await loadAnos(marca, modelo);
            }
        });

        document.getElementById("ano").addEventListener("change", async function () {
            const marca = document.getElementById("marca").value;
            const modelo = document.getElementById("modelo").value;
            const ano = this.value;
            if (marca && modelo && ano) {
                await loadTabelaFipe(marca, modelo, ano);
            }
        });

        // Inicializa as marcas ao carregar a página
        loadMarcas();
    </script>
</body>
</html>
