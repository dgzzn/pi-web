<?php  include_once '../../header.html';
include_once 'MarcaSQL.php';
$marcas = (new MarcaSQL())->procurar();?>

    <a name="" id="" class="btn btn-primary" href="form_marca.php" role="button">Inserir Nova</a><br><br>
    <fieldset>
        <legend>Marcas</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Formas de pagamento</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($marcas as $marca){
                    $img = $marca['imagem'];
                    echo "
            <tr align='center'>
                <td scope='row'>{$marca['nome']}</td>
                <td><img src='{$marca['imagem']}' width=50px; height=50px;></td>
                <td><a class='btn btn-primary' href='#' role='button'>Alterar</a>
                <a class='btn btn-danger' href='MarcaDAO.php?id_marca={$marca['id_marca']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>







<?php  include_once '../../footer.html'?><?php
/**
 * Created by PhpStorm.
 * User: Zetsubouteki
 * Date: 14/10/2018
 * Time: 18:47
 */