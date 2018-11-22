<?php  include_once '../../header.html';
include_once 'ClienteSQL.php';
$clientes = (new ClienteSQL())->procurarDetalhe($_GET['id_cliente']);


?>

<fieldset>
<legend>Informações do cliente</legend>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <?php foreach ($clientes as $cliente){
                echo "
<style>
h1, h6 {
    display: inline-block;
}
</style>
            <div class='row'>
                <div class='col-sm-6 col-lg-6'>
	                <h6>Nome: </h6>  {$cliente['nome']}<br>
	                <h6>Email: </h6>  {$cliente['email']}<br>
	                <h6>Endereço: </h6>  {$cliente['tipo_logradouro']} {$cliente['logradouro']} {$cliente['complemento_endereco']} / {$cliente['bairro']} {$cliente['municipio']}/{$cliente['estado']}
                </div>
                <div class='col-sm-6 col-lg-6'>
                    <h6>CPF/CNPJ:  </h6> {$cliente['cpf']}{$cliente['cnpj']}<br>
                    <h6>Telefone 1: </h6>  {$cliente['tel1']}<br>
                    <h6>Telefone 2: </h6>  {$cliente['tel2']}<br>
                    <h6>Limite de crédito: </h6> R$ {$cliente['limite_credito']}<br>
                </div>
            </div>


            ";
            }
            ?>

        </div>
    </div>

</fieldset>


