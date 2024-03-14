<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <style>
        /* Estilos para a tabela */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: blue;
            color: white;
            padding: 10px 30px;
            border:none;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #008CBA;
        }
    </style>
</head>
<body>
<?php
// Conecta-se ao banco de dados usando mysqli
$host = "localhost";
$user = "root";
$password = "";
$database = "gereciador-de-tarefas";

$conexao = mysqli_connect($host, $user, $password, $database);

// Verifica se houve algum erro na conexão
if (mysqli_connect_errno()) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Cria uma consulta SQL que seleciona todos os dados da tabela tarefas
$sql = "SELECT * FROM tarefas";

// Executa a consulta SQL e armazena o resultado
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Título</th><th>Categoria</th><th>Data de Vencimento</th><th>Prioridade</th><th>Descrição</th><th>Ações</th></tr>";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td><input type='text' name='titulo' value='" . $linha["titulo"] . "'></td>";
        echo "<td><input type='text' name='categoria' value='" . $linha["categoria"] . "'></td>";
        echo "<td><input type='date' name='data_vencimento' value='" . $linha["data-vencimento"] . "'></td>";
        echo "<td><input type='text' name='prioridade' value='" . $linha["prioridade"] . "'></td>";
        echo "<td><input type='text' name='descricao' value='" . $linha["descricao"] . "'></td>";
        echo "<td><button onclick='salvarEdicao(" . $linha["id"] . ")'>Salvar</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo '<a href="tarefas.html"><button>Voltar</button></a>';
} else {
    echo "Não há dados cadastrados na tabela";
    header("Refresh: 2; url=tarefas.html");
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

<script>
function salvarEdicao(id) {
    // Aqui você deve implementar a lógica para atualizar os dados no banco de dados
    // Use AJAX ou um formulário para enviar os dados para um arquivo PHP que fará o UPDATE
    // Exemplo: salvar_edicao.php?id=ID_DA_TAREFA&titulo=NOVO_TITULO&categoria=NOVA_CATEGORIA...
}
</script>
</body>
</html>
