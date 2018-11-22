<?php
include_once '../../Conexao.php';

function retorna($cep){
    $sql = "select concat(tipo_logradouro, ' ', logradouro) as 'logradouro', bairro, municipio, estado from cep where cep='$cep' limit 1";
    $resultado = (new Conexao())->recuperarDados($sql);

    if($resultado->num_rows){
        $valores['logradouro'] = $resultado['logradouro'];
        $valores['bairro'] = $resultado['bairro'];
        $valores['municipio'] = $resultado['municipio'];
        $valores['estado'] = $resultado['estado'];
    }
}

if(isset($_GET['cep'])){
    echo retorna($_GET['cep']);
}

?>