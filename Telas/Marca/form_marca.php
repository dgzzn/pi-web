<?php include_once("../../header.html");
include_once 'MarcaSQL.php';

$marca = new MarcaSQL();

if(!empty($_GET['id_marca'])){
    $marca->selecionarId($_GET['id_marca']);
}?>


    <h1>Registrar marca</h1><br>
    <h6><i>* = obrigatório</i></h6><br>


    <form action="MarcaDAO.php?acao=salvar" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Informações do marca</legend>
            <div class="form-group">
                <input type="hidden" name="id_marca" value="<?php echo $marca->getIdMarca(); ?>">
                <label for="nome"><b>Nome da marca*</b></label>
                <input type="text" class="form-control col-md-12" required name="nome" id="nome" value="<?php echo $marca->getNome(); ?>" aria-describedby="helpId" placeholder="Nome da marca">
            </div>
            <div class="form-group">
                <label for=""><b>Foto*</b></label>
                <input type="file" accept="image/*" class="form-control" name="imagem" id="imagem" required aria-describedby="helpId" value="<?php echo $marca->getImagem(); ?>" placeholder=""><?php echo $marca->getImagem(); ?>
                <small id="helpId" class="form-text text-muted">*logotipo da marca</small>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>