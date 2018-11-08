<?php include_once("../../header.html");
include_once 'ProdutoSQL.php';
include_once '../../Telas/Marca/MarcaSQL.php';
include_once '../../Telas/Medida/MedidaSQL.php';


$produto = new ProdutoSQL();
$marcas = (new MarcaSQL())->procurar();
$m = new MarcaSQL();
$medidas = (new MedidaSQL())->procurar();

if(!empty($_GET['id_produto'])){
    $produto->selecionarId($_GET['id_produto']);
}?>

<h1>Registrar produto</h1><br>
<h6><i>* = obrigatório</i></h6><br>
<fieldset>
<legend>Informações do produto</legend>
    <form action="ProdutoDAO.php?acao=salvar" method="post">
        <div class="form-group">
            <input type="hidden" name="id_produto" value="<?php echo $produto->getIdProduto(); ?>">
            <label for="nome_produto"><b>Nome do produto*</b></label>
            <input type="text" class="form-control col-md-12" name="desc_produto" id="nome_produto" value="<?php echo $produto->getDescProduto(); ?>" aria-describedby="helpId" placeholder="Nome do produto">
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                <div class="form-group">
                <label for="marca"><b>Marca*</b></label>
                <select class="form-control" name="marca" id="marca">
                    <?php foreach ($marcas as $marca){ ?>
                        <option value="<?php echo $marca['id_marca'] ?>" <?php echo ($marca['id_marca'] == $produto->getFkIdMarca()) ? ' selected="selected"' : '';?>><?php echo $marca['nome']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                    <label for="quantidade"><b>Quantidade*</b></label>
                    <input type="number" class="form-control" name="qtd_estoque" id="quantidade" value="<?php echo $produto->getQtdEstoque(); ?>" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">*apenas números</small>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <div class="form-group">
                  <label for="medida">Medida*</label>
                  <select class="form-control" name="medida" id="medida">
                    <?php foreach ($medidas as $medida){ ?>
                        <option value="<?php echo $medida['id_medida'] ?>" <?php echo ($medida['id_medida'] == $produto->getFkIdMedida()) ? ' selected="selected"' : '';?>><?php echo $medida['nome'],' (', ($medida['unidade']),')'; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="codigo"><b>Código*</b></label>
                <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $produto->getCodigo(); ?>" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="valor"><b>Valor*</b></label>
                <input type="text" class="form-control" name="valor" id="valor" value="<?php echo $produto->getValor(); ?>" aria-describedby="helpId" placeholder="">
            </div>
        </div>

</fieldset>
            <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
</form>
</div>


<?php include_once("../../footer.html"); ?>