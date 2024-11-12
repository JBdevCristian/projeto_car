<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário de login
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);
    $autenticado = false;

    function autenticarUsuario($email, $senha, $arquivoUsuarios) {
        // Verifica se o arquivo existe
        if (!file_exists($arquivoUsuarios)) {
            throw new Exception("Arquivo de usuários não encontrado.");
        }

        // Abre o arquivo de usuários
        $file = fopen($arquivoUsuarios, "r");
        if (!$file) {
            throw new Exception("Não foi possível abrir o arquivo de usuários.");
        }

        // Lê cada linha do arquivo
        while (($linha = fgets($file)) !== false) {
            // Divide a linha em nome, email e senha
            list($nomeUsuario, $usuarioEmail, $usuarioSenhaHash) = explode("|", trim($linha));

            // Verifica se as credenciais estão corretas
            if ($email === $usuarioEmail && password_verify($senha, $usuarioSenhaHash)) {
                fclose($file); // Fecha o arquivo antes de retornar
                return true; // Autenticação bem-sucedida
            }
        }

        fclose($file); // Fecha o arquivo após a leitura
        return false; // Autenticação falhou
    }

    // Tenta autenticar o usuário
    try {
        if (autenticarUsuario($email, $senha, "usuarios.txt")) {
            $_SESSION["autenticado"] = 'SIM';
            $_SESSION["usuario"] = $email;
            header("Location: ../painel.php");
            exit;
        } else {
            $_SESSION["autenticado"] = 'NÃO';
            header("Location: ../login.php?login=erro");
            exit;
        }
    } catch (Exception $e) {
        // Exibir ou registrar a mensagem de erro
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
