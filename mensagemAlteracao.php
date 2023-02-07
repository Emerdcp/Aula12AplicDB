<?php 
$msg = $_GET['msg'] ?? "";

if($msg == "alteracao"){
    echo "<div class='alert alert-info'>Tarefa alterada com sucesso!</div>";
}
?>