<?php  include_once '../../header.html';
include_once 'MedidaSQL.php';
$medidas = (new MedidaSQL())->procurar();

?>

<a name="" id="" class="btn btn-primary" href="form_medida.php" role="button">Inserir Nova</a><br><br>
<fieldset>
    <legend>Medidas</legend>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Medida</th>
                <th>Unidade</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($medidas as $medida){
                echo "
            <tr align='center'>
                <td scope='row'>{$medida['nome']}</td>
                <td scope='row'>{$medida['unidade']}</td>
                <td><a class='btn btn-primary' href='form_medida.php?id_medida={$medida['id_medida']}' role='button'>Alterar</a>
                <a class='btn btn-danger' href='MedidaDAO.php?id_medida={$medida['id_medida']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
            }
            ?>
            </tbody>
        </table>
    </div>
</fieldset>


