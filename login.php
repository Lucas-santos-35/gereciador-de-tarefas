<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $email = htmlspecialchars($email);

    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $senha = ($senha);

    $sql = "SELECT id FROM cadastro WHERE email = '$email' and senha = '$senha'";
    $result = mysqli_query($conexao, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
        echo "Login bem-sucedido";
        // Adiciona um cabeçalho para redirecionar a página após 3 segundos
       header("Refresh: 3; url=tarefas.html");

    } else {
        echo "Seu email ou senha estão incorretos";
                // Adiciona um cabeçalho para redirecionar a página após 3 segundos
       header("Refresh: 2; url=login.html");
    }
}
?>