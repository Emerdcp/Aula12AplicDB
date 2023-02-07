<?php 
$msg = $_GET['msg'] ?? "";

if($msg == "excluir"){
    echo "<div class='alert alert-info'>Tarefa excluída sucesso!</div>";
}
?>