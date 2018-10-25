<?php include_once("../../header.html"); ?>


    <h1>Registrar forma de pagamento</h1><br>
    <h6><i>* = obrigatório</i></h6><br>


    <form action="PagamentoDAO.php?acao=salvar" method="post">
        <fieldset>
            <legend>Formas de pagamento</legend>
            <div class="form-group">
                <label for="nome"><b>Nome*</b></label>
                <input type="text" class="form-control col-md-12" name="nome" id="nome" aria-describedby="helpId" placeholder="Nome da marca">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>