<?php
include_once 'ProdutoSQL.php';

$produto = new ProdutoSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $produto->excluir($_GET['id_produto']);
        break;
    case "salvar":
        if(!empty($_POST['id_produto'])){
            $msg = 2;
            $resultado = $produto->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $produto->inserir($_POST);
        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_produto.php';
</script>