<?php  include_once '../../header.html';
include_once 'indexSQL.php';
$index = (new indexSQL())->procurar();
$clientes = (new indexSQL())->procuraCliente();
?>

    <fieldset>
        <legend>Últimas vendas realizadas</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data da venda</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($index as $index){
                    echo "
            <tr align='center'>
                <td scope='row'>{$index['nome']}</td>
                <td scope='row'>{$index['desc_produto']}</td>
                <td scope='row'>{$index['qtd']}</td>
                <td scope='row'>{$index['data_venda']}</td></tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>

    <fieldset>
        <legend>Últimos clientes cadastrados</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone 1</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente){
                    echo "
            <tr align='center'>
                <td scope='row'>{$cliente['nome']} </td>
                <td scope='row'>{$cliente['tipo_logradouro']} {$cliente['logradouro']} {$cliente['complemento_endereco']}</td>
                <td scope='row'>{$cliente['tel1']}</td>
                <td scope='row'>{$cliente['email']}</td>
            </tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>


<?php include_once("../../footer.html"); ?>