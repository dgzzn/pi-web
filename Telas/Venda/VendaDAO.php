<?php
include_once 'VendaSQL.php';

$venda = new VendaSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $venda->excluir($_GET['id_venda']);
        break;
    case "salvar":
        if(!empty($_POST['id_venda'])){
            $msg = 2;
            $resultado = $venda->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $venda->inserirVenda($_POST);
            $venda->atualizaEstoque($_POST);
            $venda->inserirItens($_POST);

        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_venda.php';
</script>