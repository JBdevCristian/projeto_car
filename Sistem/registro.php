<?php
session_start();
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $nome = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["password"]);
    $confirmarSenha = trim($_POST["confirm_password"]);
    $autenticado = false;

    // Verifica se as senhas coincidem
    if ($senha !== $confirmarSenha) {
        header("Location: ../registrar.php?login=erro1");
    }

    // Hash da senha para maior segurança
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Armazena os dados em uma string
    $linha = "$nome|$email|$senhaHash\n";

    // Salva no arquivo "usuarios.txt"
    $arquivo = fopen("usuarios.txt", "a"); // Modo "a" adiciona ao final do arquivo
    if ($arquivo) {
        fwrite($arquivo, $linha);
        fclose($arquivo);
        header("Location: ../painel.php");
        $_SESSION['autenticado'] = 'SIM';
    } else {
        header("Location: ../registrar.php?login=erro3");
        $_SESSION['autenticado'] = 'NÃO';
    }
} else {
    echo "Método de requisição inválido.";
}
?>


