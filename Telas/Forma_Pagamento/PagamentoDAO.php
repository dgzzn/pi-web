<?php
include_once 'PagamentoSQL.php';

$pagamento = new PagamentoSQL();

switch($_GET['acao']){
    case "excluir":
        $resultado = $pagamento->excluir($_GET['id_forma_pagamento']);
        break;
    case "salvar":
        $resultado = $pagamento->inserir($_POST);
        break;
}


?>

<script>
    var mensagem = '<?php echo $resultado ? 'Sucesso' : 'Ocorreu um erro' ?>';
    alert(mensagem);
    window.location.href = 'index_pagamento.php';
</script>