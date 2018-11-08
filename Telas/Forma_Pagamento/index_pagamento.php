<?php  include_once '../../header.html';
include_once 'PagamentoSQL.php';
$pagamentos = (new PagamentoSQL())->procurar();?>

    <a name="" id="" class="btn btn-primary" href="form_pagamento.php" role="button">Inserir Nova</a><br><br>
    <fieldset>
        <legend>Formas de pagamento</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr align="center">
                    <th>Formas de pagamento</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pagamentos as $pagamento){
                    echo "
            <tr align='center'>
                <td scope='row'>{$pagamento['nome']}</td>
                <td><a class='btn btn-primary' href='form_pagamento.php?id_forma_pagamento={$pagamento['id_forma_pagamento']}' role='button'>Alterar</a>
                <a class='btn btn-danger' href='PagamentoDAO.php?id_forma_pagamento={$pagamento['id_forma_pagamento']}&acao=excluir' role='button'>Excluir</a></td>
            </tr>
            ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </fieldset>







<?php  include_once '../../footer.html'?><?php
