<?php  include_once '../../header.html';
include_once 'ClienteSQL.php';

$clientes = (new ClienteSQL())->procurar();

?>

    <a name="" id="" class="btn btn-primary" href="form_cliente.php" role="button">Inserir Novo</a><br><br>
    <fieldset>
        <legend>Clientes</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone 1</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente){
                    echo "
            <tr align='center'>
                <td scope='row'><a href='detalhe_cliente.php?id_cliente={$cliente['id_cliente']}'>{$cliente['nome']}</a> </td>
                <td scope='row'>{$cliente['tipo_logradouro']} {$cliente['logradouro']} {$cliente['complemento_endereco']}</td>
                <td scope='row'>{$cliente['tel1']}</td>
                <td scope='row'>{$cliente['email']}</td>
                <td><a class='btn btn-primary' href='form_cliente.php?id_cliente={$cliente['id_cliente']}' role='button'>Alterar</a>
                <a class='btn btn-danger' href='clienteDAO.php?id_cliente={$cliente['id_cliente']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>







<?php  include_once '../../footer.html'?>
