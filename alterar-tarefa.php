<?php include_once "header.php";?>
<h3>Alterar tarefa</h3>
<?php 
$id = $_GET['id'];
$descricao = "";
$responsavel = "";
$status = "";


include_once "conexao.php";

$sqlBusca = "select * from t_tarefas where id = $id";

$todasTarefas = mysqli_query($conexao, $sqlBusca);

while ($umaTarefa = mysqli_fetch_assoc($todasTarefas)){
    $descricao = $umaTarefa['descricao'];
    $responsavel = $umaTarefa['responsavel'];
    $status = $umaTarefa['status'];
}

//echo "$id - $descricao" para impressão
?> 

<form action="confirmar-alteracao.php" method="post" class="d-flex justify-content-center align-items-center mb-4">
    <div class="form-outline flex-fill me-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input class="form-control" name="descricao" value="<?php echo $descricao; ?>">
        
    </div>
    <div>
    <input class="form-control" name="responsavel" value="<?php echo $responsavel; ?>">
    </div>
    <div class="form-outline flex-fill me-3">
        <select class="form-control" name="status">
            <option value="Planejada" <?php echo($status == "Planejada") ? " selected" : "" ; ?>>Planejada</option>
            <option value="Em Execução" <?php if($status == "Em Execução"){ echo " selected"; }?>>Em Execução</option>
            <option value="Concluído" <?php if($status == "Concluída"){ echo " selected"; }?>>Concluído</option>
        </select>
    </div>
    <button type="submit" class='btn btn-dark' i class="bi bi-save-fill"></i> Salvar</button>
</form>


<?php include_once "footer.php";?>
