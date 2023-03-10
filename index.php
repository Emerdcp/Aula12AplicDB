<?php include_once "header.php";?>
<?php include_once "mensagemAlteracao.php";?>
<?php include_once "mensagemCadastro.php";?>
<?php include_once "mensagemExcluir.php";?>


<!-- Inicio Conteúdo -->
<form class="d-flex justify-content-center align-items-center mb-4" action="inserir-tarefa.php" method="post">
    <div class="form-outline flex-fill">
        <input type="text" id="form2" class="form-control" placeholder="Nova tarefa" name="tarefa">
    </div>
    <div>
        <input type="text" id="responsavel" class="form-control" placeholder="Responsável" name="responsavel">
    </div>
    <div>
        <select class="form-control" name="status">
            <option value="Planejada">Planejada</option>
            <option value="Em Execução">Em Execução</option>
            <option value="Concluído">Concluído</option>
        </select>
    </div>
    <button type="submit" class="btn btn-dark ms-2"><i class="bi bi-save"></i> ADD</button>
</form>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-list-task"></i> Todas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?status=Planejada"><i class="bi bi-list-nested"></i> Planejadas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?status=Em Execução "><i class="bi bi-list-nested"></i> Em Execução</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?status=Concluído"><i class="bi bi-list-check"></i> Concluídas<i class="bi bi-0-circle"></i>
        </a>
    </li>
</ul>


<ul class="list-group mb-0">
    <?php
    include "conexao.php";
    $condicao = "";
    $status = $_GET["status"] ?? "";

    if($status != ""){
        $condicao = "where status='$status'";
    }
    $sqlBusca = "select * from t_tarefas $condicao";
    $todasAsTarefas = mysqli_query($conexao, $sqlBusca);
    while ($umaTarefa = mysqli_fetch_assoc($todasAsTarefas)) {
    ?>
        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded fundo-cinza justify-content-between">
            <div class="col-1"> 
                <?php echo $umaTarefa['id']; ?>
            </div>
            <div class="col-5"> 
                <?php echo $umaTarefa['descricao']; ?>
            </div>
            <div class="col-2">
                <?php echo $umaTarefa['responsavel']; ?>
            </div>
            <div class="col-2">
                <?php echo $umaTarefa['status']; ?>
            </div>
            <div class="col-2">
                <span>
                    <a class='btn btn-light' href="alterar-tarefa.php?id=<?php echo $umaTarefa['id']?>"><i class="bi bi-pencil-fill"></i></a>
                    <a class='btn btn-light' href="excluir-tarefa.php?id=<?php echo $umaTarefa['id']?>"><i class="bi bi-trash3-fill"></i></a>
                </span>
            </div>
        </li>
    <?php
    }
    mysqli_close($conexao);
    ?>
</ul>
<!-- Fim Conteúdo -->
<?php include_once "footer.php";?>
