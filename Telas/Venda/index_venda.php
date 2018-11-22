<?php  include_once '../../header.html';
include_once 'VendaSQL.php';

$vendas = (new VendaSQL())->procurar();

?>

<fieldset>
    <legend>Vendas realizadas</legend>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="data_inicio">Data de início</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" required aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="data_inicio">Data final</label>
                <input type="date" class="form-control" name="data_final" required id="data_final" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-sm-4">
            <a name="" id="" class="btn btn-primary" href="#" role="button">Procurar</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Cliente</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Forma de pagamento</th>
                <th>Data da venda</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vendas as $venda){
                echo "
            <tr align='center'>
                <td scope='row'>{$venda['nome']}</td>
                <td scope='row'>{$venda['desc_produto']}</td>
                <td scope='row'>{$venda['qtd']}</td>
                <td scope='row'>{$venda['pag']} ({$venda['numero_parcelas']}x)</td>
                <td scope='row'>{$venda['data_venda']}</td></tr>
            ";
            }
            ?>
            </tbody>
        </table>
    </div>
</fieldset>







<?php  include_once '../../footer.html'?>
