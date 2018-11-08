<?php  include_once '../../header.html';
include_once 'ProdutoSQL.php';
include_once '../../Telas/Marca/MarcaSQL.php';
include_once '../../Telas/Medida/MedidaSQL.php';
$produtos = (new ProdutoSQL())->procurar();
$marcas = new MarcaSQL();
$medidas = new MedidaSQL();

?>

    <a name="" id="" class="btn btn-primary" href="form_produto.php" role="button">Inserir Novo</a><br><br>
    <fieldset>
        <legend>Produtos</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Produto</th>
                    <th>Qtd. em estoque</th>
                    <th>Marca</th>
                    <th>Valor unitário</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($produtos as $produto){
                    echo "
            <tr align='center'>
                <td scope='row'>{$produto['desc_produto']}  ({$produto['unidade']})</td>
                <td scope='row'>{$produto['qtd_estoque']}</td>
                <td scope='row'>{$produto['nome']}</td>
                <td scope='row'>{$produto['valor']}</td>
                <td><a class='btn btn-primary' href='form_produto.php?id_produto={$produto['id_produto']}' role='button'>Alterar</a>
                <a class='btn btn-danger' href='ProdutoDAO.php?id_produto={$produto['id_produto']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>







<?php  include_once '../../footer.html'?>
