<?php  include_once '../../header.html';
include_once 'CargoSQL.php';
$cargos = (new CargoSQL())->procurar();?>

    <a name="" id="" class="btn btn-primary" href="form_cargo.php" role="button">Inserir Novo</a><br><br>
    <fieldset>
    <legend>Cargos</legend>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Nome do cargo</th>
                <th>Nível</th>
                <th>Desconto máximo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cargos as $cargo){
            echo "
            <tr align='center'>
                <td scope='row'>{$cargo['nome']}</td>
                <td scope='row'>{$cargo['nivel_perfil']}</td>
                <td scope='row'>{$cargo['max_desconto']}%</td>
                <td><a class='btn btn-primary' href='form_cargo.php?id_cargo={$cargo['id_cargo']}' role='button'>Alterar</a>
                <a class='btn btn-danger' href='CargoDAO.php?id_cargo={$cargo['id_cargo']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
            }
            ?>
            </tbody>
        </table>
    </div>
</fieldset>







<?php  include_once '../../footer.html'?>