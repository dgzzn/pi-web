<?php
include_once 'CargoSQL.php';

$cargo = new CargoSQL();

switch($_GET['acao']){
    case "excluir":
        $resultado = $cargo->excluir($_GET['id_cargo']);
        break;
    case "salvar":
        $resultado = $cargo->inserir($_POST);
        break;
}


?>

<script>
    var mensagem = '<?php echo $resultado ? 'Sucesso' : 'Ocorreu um erro' ?>';
    alert(mensagem);
    window.location.href = 'index_cargo.php';
</script>