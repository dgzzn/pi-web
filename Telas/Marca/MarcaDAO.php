<?php
include_once 'MarcaSQL.php';

$marca = new MarcaSQL();

switch($_GET['acao']){
    case "excluir":
        $resultado = $marca->excluir($_GET['id_marca']);
        break;
    case "salvar":
        $resultado = $marca->inserir($_POST);
        break;
}


?>

<script>
    var mensagem = '<?php echo $resultado ? 'Sucesso' : 'Ocorreu um erro' ?>';
    alert(mensagem);
    window.location.href = 'index_marca.php';
</script>