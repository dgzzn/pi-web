<?php
include_once 'PagamentoSQL.php';

$pagamento = new PagamentoSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $pagamento->excluir($_GET['id_forma_pagamento']);
        break;
    case "salvar":
        if(!empty($_POST['id_forma_pagamento'])){
            $msg = 2;
            $resultado = $pagamento->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $pagamento->inserir($_POST);
        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_pagamento.php';
</script>