<?php
$tarefa = $_POST['tarefa'];
$responsavel = $_POST['responsavel'];
$status = $_POST['status'];

include_once "conexao.php";

$sqlGravar = "insert into t_tarefas(descricao, responsavel, status) values('$tarefa', '$responsavel', '$status')";

echo $sqlGravar;

mysqli_query($conexao, $sqlGravar);

mysqli_close($conexao);

header("location: index.php?msg=cadastro");

?>
