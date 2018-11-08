<?php
include_once 'CargoSQL.php';

$cargo = new CargoSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $cargo->excluir($_GET['id_cargo']);
        break;
    case "salvar":
        if(!empty($_POST['id_cargo'])){
            $msg = 2;
            $resultado = $cargo->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $cargo->inserir($_POST);
        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_cargo.php';
</script>