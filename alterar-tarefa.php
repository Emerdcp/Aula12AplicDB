<?php include_once "header.php";?>
<h3>Alterar tarefa</h3>
<?php 
$id = $_GET['id'];
$descricao = "";

include_once "conexao.php";

$sqlBusca = "select * from t_tarefas where id = $id";

$todasTarefas = mysqli_query($conexao, $sqlBusca);

while ($umaTarefa = mysqli_fetch_assoc($todasTarefas)){
    $descricao = $umaTarefa['descricao'];
}

//echo "$id - $descricao" para impressão
?> 

<form action="confirmar-alteracao.php" method="post" class="d-flex justify-content-center align-items-center mb-4">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input class="form-control" name="descricao" value="<?php echo $descricao; ?>">
    <button type="submit" class='btn btn-dark' i class="bi bi-save-fill"></i> Salvar</button>
</form>


<?php include_once "footer.php";?>
