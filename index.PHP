<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CheckCar - Seu Diagnóstico Automotivo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/estilo.css">
</head>
<body>
    <?php include("public/views/navbar.php"); ?>
    

    <section id="hero" class="text-center text-white bg-primary py-5">
        <div>
            <h1>Bem-vindo à CheckCar</h1>
            <p>Diagnóstico Automotivo Rápido e Eficiente</p>
            <a href="#contact" class="btn btn-success">Agende Agora</a>
        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center">Por que Escolher o CheckCar?</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Diagnóstico Preciso</h3>
                            <p class="card-text">Utilizamos tecnologia avançada para identificar problemas no seu veículo com precisão.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Rápido e Confiável</h3>
                            <p class="card-text">Nossos especialistas garantem rapidez e confiança em cada serviço realizado.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Suporte Completo</h3>
                            <p class="card-text">Oferecemos assistência completa para manutenção e consertos, sempre ao seu lado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 bg-dark text-white text-center">
        <h2>Sobre Nós</h2>
        <p>Na CheckCar, somos apaixonados por tecnologia automotiva. Nossa equipe de especialistas tem anos de experiência em diagnósticos e reparos, garantindo que seu carro receba o melhor cuidado possível.</p>
    </section>

    <?php include("public/views/footer.php") ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
