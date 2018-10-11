<?php
include_once '../SQL/CargoSQL.php';

$cargo = new CargoSQL();
$resultado = $cargo->inserir($_POST);
$resultado_select = $cargo->procurar();


?>

<script>
    var mensagem = '<?php echo $resultado ? 'Sucesso' : 'Ocorreu um erro' ?>';
    alert(mensagem);
    window.location.href = '../forms/form_cargo.php';
</script>