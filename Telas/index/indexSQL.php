


<?php
include_once '../../Conexao.php';

class indexSQL{

    public function procurar(){
        $sql = "select c.nome, p.desc_produto, v.data_venda, i.qtd from venda v
        join cliente c on v.fk_id_cliente=c.id_cliente
        join produto p on v.fk_id_produto=p.id_produto
        join itens_venda i on v.id_venda=i.fk_id_venda order by v.data_venda DESC limit 5;";
        return (new Conexao())->recuperarDados($sql);
    }

    public function procuraCliente(){
        $sql = "select c.*, e.* from cliente c join cep e on c.fk_id_cep=e.id_cep order by c.id_cliente desc limit 5";
        return (new Conexao())->recuperarDados($sql);
    }
}
?>