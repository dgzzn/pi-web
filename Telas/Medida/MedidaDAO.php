<?php
include_once 'MedidaSQL.php';

$medida = new MedidaSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $medida->excluir($_GET['id_medida']);
        break;
    case "salvar":
        if(!empty($_POST['id_medida'])){
            $msg = 2;
            $resultado = $medida->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $medida->inserir($_POST);
        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_medida.php';
</script>