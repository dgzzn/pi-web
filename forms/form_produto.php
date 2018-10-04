<?php include_once("../header.html"); ?>

<h1>Registrar produto</h1><br>
<h6><i>* = obrigatório</i></h6><br>
<fieldset>
<legend>Informações do produto</legend>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome_produto"><b>Nome do produto*</b></label>
            <input type="text" class="form-control col-md-12" name="nome_produto" id="nome_produto" aria-describedby="helpId" placeholder="Nome do produto">
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                <div class="form-group">
                <label for="marca"><b>Marca*</b></label>
                <select class="form-control" name="marca" id="marca">
                    <option>Friboi</option>
                    <option>Sony</option>
                    <option></option>
                </select>
                </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                    <label for="quantidade"><b>Quantidade*</b></label>
                    <input type="number" class="form-control" name="quantidade" id="quantidade" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">*apenas números</small>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <div class="form-group">
                  <label for="medida">Medida*</label>
                  <select class="form-control" name="medida" id="medida">
                    <option>kg</option>
                    <option>ml</option>
                    <option>unidades</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="codigo"><b>Código*</b></label>
                <input type="text" class="form-control" name="codigo" id="codigo" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="valor"><b>Código*</b></label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="">
            </div>
        </div>

</fieldset>
            <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
</form>


</div>






<?php include_once("../footer.html"); ?>