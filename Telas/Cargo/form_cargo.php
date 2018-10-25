<?php include_once("../../header.html"); ?>


<h1>Registrar cargo</h1><br>
<h6><i>* = obrigatório</i></h6><br>


    <form action="CargoDAO.php?acao=salvar" method="post">
        <fieldset>
            <legend>Informações do cargo</legend>
            <div class="form-group">
                <label for="nome"><b>Nome do cargo*</b></label>
                <input type="text" class="form-control col-md-12" name="nome" id="nome" aria-describedby="helpId" placeholder="Nome do cargo">
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="nivel_perfil"><b>Nível de acesso do perfil*</b></label>
                        <select class="form-control" name="nivel_perfil" id="nivel_perfil">
                            <option>Administrador</option>
                            <option>Gerente</option>
                            <option>Vendedor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-6">
                    <label for="max_desconto"><b>Desconto máximo(%)*</b></label>
                    <div>
                        <input type="number" step="1" class="form-control" name="max_desconto" id="max_desconto" aria-describedby="helpId" placeholder="">
                        <small id="helpId" class="form-text text-muted">*apenas números</small>
                    </div>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>