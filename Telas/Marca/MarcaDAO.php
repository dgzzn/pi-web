<?php
include_once 'MarcaSQL.php';

$marca = new MarcaSQL();

switch($_GET['acao']){
    case "excluir":
        $msg = 2;
        $resultado = $marca->excluir($_GET['id_marca']);
        break;
    case "salvar":
        if(!empty($_POST['id_marca'])){
            $msg = 2;
            $resultado = $marca->alterar($_POST);
        } else{
            $msg = 1;
            $resultado = $marca->inserir($_POST);
        }
        break;
}
?>

<script>
    var mensagem = '<?php if($msg==1){echo $resultado ? 'Sucesso' : 'Ocorreu um erro';}else{echo $resultado ? 'Ocorreu um erro' : 'Sucesso';} ?>';
    alert(mensagem);
    window.location.href = 'index_marca.php';
</script>