<?php
include_once 'ClienteSQL.php';

$cliente = new ClienteSQL();

switch($_GET['acao']){
    case "visualizar":

        break;
    case "excluir":
        $msg = 2;
        $resultado = $cliente->excluir($_GET['id_cliente']);
        break;
    case "salvar":
        if(!empty($_POST['id_cliente'])){
            $msg = 2;
            $resultado = $cliente->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $cliente->inserir($_POST);
        }
        break;

}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_cliente.php';
</script>