<?php include_once("../../header.html");
include_once 'VendaSQL.php';
include_once '../../Telas/Marca/MarcaSQL.php';
include_once '../../Telas/Medida/MedidaSQL.php';
include_once '../../Telas/Produto/ProdutoSQL.php';
include_once '../../Telas/Cliente/ClienteSQL.php';
include_once '../../Telas/Forma_Pagamento/PagamentoSQL.php';


$produtos = (new ProdutoSQL())->procurar();
$marcas = (new MarcaSQL())->procurar();
$medidas = (new MedidaSQL())->procurar();
$clientes = (new ClienteSQL())->procurar();
$pagamentos = (new PagamentoSQL())->procurar();
?>

<h1>Realizar venda</h1>

<form action="VendaDAO.php?acao=salvar" method="post">
    <fieldset>
        <legend>Produto</legend>
        <div class="form-group">
            <label for="codigo"><b>Código*</b></label>
            <input type="text" class="form-control" required name="codigo" id="codigo" required aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="produto"><b>Produto</b></label>
            <input type="text" class="form-control" name="produto" id="produto" aria-describedby="helpId" placeholder="">
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="form-group">
                    <label for="quantidade"><b>Quantidade*</b></label>
                    <input type="number" class="form-control" required name="quantidade" id="quantidade" required aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="form-group">
                    <label for="valor_unitario"><b>Valor unitário (R$)</b></label>
                    <input type="number" class="form-control" name="valor_unitario" id="valor_unitario" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="form-group">
                    <label for="valor_total"><b>Valor total (R$)</b></label>
                    <input type="number" class="form-control" name="valor_total" id="valor_total" aria-describedby="helpId" placeholder="">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="forma_pagamento"><b>Forma de pagamento</b></label>
                    <select class="form-control" name="forma_pagamento" required id="forma_pagamento">
                        <option disabled selected value> -- Escolha uma forma de pagamento -- </option>
                    <?php foreach ($pagamentos as $pagamento){ ?>
                        <option value="<?php echo $pagamento['id_forma_pagamento'] ?>"><?php echo $pagamento['nome']; ?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="numero_parcelas"><b>Número de parcelas*</b></label>
                    <input type="number" class="form-control" required name="numero_parcelas" required id="numero_parcelas" aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Cliente</legend>
        <div class="form-group">
            <label for="cpf_cnpj"><b>CPF/CNPJ*</b></label>
            <input type="text" class="form-control" required name="cpf_cnpj" id="cpf_cnpj" required aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="nome"><b>Nome</b></label>
            <input type="text" class="form-control" name="nome" id="nome" aria-describedby="helpId" placeholder="">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-dark col-md-12">Finalizar venda</button>
</form>



















<?php include_once("../../footer.html");

?>
