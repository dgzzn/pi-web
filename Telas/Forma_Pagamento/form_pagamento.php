<?php include_once("../../header.html");
include_once 'PagamentoSQL.php';

$pagamento = new PagamentoSQL();

if(!empty($_GET['id_forma_pagamento'])){
    $pagamento->selecionarId($_GET['id_forma_pagamento']);
}?>


    <h1>Registrar forma de pagamento</h1><br>
    <h6><i>* = obrigatório</i></h6><br>


    <form action="PagamentoDAO.php?acao=salvar" method="post">
        <fieldset>
            <legend>Formas de pagamento</legend>
            <div class="form-group">
                <input type="hidden" name="id_forma_pagamento" value="<?php echo $pagamento->getIdFormaPagamento(); ?>">
                <label for="nome"><b>Nome*</b></label>
                <input type="text" class="form-control col-md-12" name="nome" required id="nome" value="<?php echo $pagamento->getNome(); ?>"   aria-describedby="helpId" placeholder="Nome da pagamento">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
    </form>



<?php include_once("../../footer.html"); ?>