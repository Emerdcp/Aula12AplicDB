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
        <select name="status" id="status" class="form-select">
            <option value="Ativo">Aberto</option>
            <option value="Inatico">Parcial</option>
            <option value="Bloqueado">Concluído</option>
        </select>

    </div>
    <button type="submit" class="btn btn-dark ms-2"><i class="bi bi-save"></i> ADD</button>
</form>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-list-task"></i> Todas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-list-nested"></i> Em execução</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-list-check"></i> Concluídas<i class="bi bi-0-circle"></i>
        </a>
    </li>
</ul>


<ul class="list-group mb-0">
    <?php
    include "conexao.php";
    $sqlBusca = "select * from t_tarefas";
    $todasAsTarefas = mysqli_query($conexao, $sqlBusca);
    while ($umaTarefa = mysqli_fetch_assoc($todasAsTarefas)) {
    ?>
        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded fundo-cinza justify-content-between">
            <?php echo $umaTarefa['id']; ?> -
            <?php echo $umaTarefa['descricao']; ?> - 
            <?php echo $umaTarefa['responsavel']; ?> - 
            <?php echo $umaTarefa['status']; ?>
            <span>
                <a class='btn btn-light' href="alterar-tarefa.php?id=<?php echo $umaTarefa['id']?>"><i class="bi bi-pencil-fill"></i></a>
                <a class='btn btn-light' href="excluir-tarefa.php?id=<?php echo $umaTarefa['id']?>"><i class="bi bi-trash3-fill"></i></a>
            </span>
        </li>
    <?php
    }
    mysqli_close($conexao);
    ?>
</ul>
<!-- Fim Conteúdo -->
<?php include_once "footer.php";?>
