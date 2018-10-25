<?php include_once("../../header.html"); ?>


    <h1>Registrar marca</h1><br>
    <h6><i>* = obrigatório</i></h6><br>


    <form action="MarcaDAO.php?acao=salvar" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Informações do marca</legend>
            <div class="form-group">
                <label for="nome"><b>Nome da marca*</b></label>
                <input type="text" class="form-control col-md-12" name="nome" id="nome" aria-describedby="helpId" placeholder="Nome da marca">
            </div>
            <div class="form-group">
                <label for=""><b>Foto*</b></label>
                <input type="file" class="form-control" name="imagem" id="imagem" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">*logotipo da marca</small>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>