<?php include_once("../../header.html");
include_once 'MedidaSQL.php';

$medida = new MedidaSQL();

if(!empty($_GET['id_medida'])){
    $medida->selecionarId($_GET['id_medida']);
}?>


    <h1>Registrar medida</h1><br>
    <h6><i>* = obrigatório</i></h6><br>


    <form action="MedidaDAO.php?acao=salvar" method="post">
        <fieldset>
            <legend>Informações do medida</legend>
            <div class="form-group">
                <input type="hidden" name="id_medida" value="<?php echo $medida->getIdMedida(); ?>">
                <label for="nome"><b>Nome da medida*</b></label>
                <input type="text" class="form-control col-md-12" name="nome" id="nome" value="<?php echo $medida->getNome(); ?>" aria-describedby="helpId" placeholder="Nome da medida">
            </div>
            <div class="form-group">
                <label for="nome"><b>Unidade da medida*</b></label>
                <input type="text" class="form-control col-md-12" name="unidade" id="unidade" value="<?php echo $medida->getUnidade(); ?>" aria-describedby="helpId" placeholder="Unidade (kg, ml, etc)">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>