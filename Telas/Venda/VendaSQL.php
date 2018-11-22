<?php
include_once '../../Conexao.php';

class VendaSQL{
    protected $id_venda;
    protected $fk_id_funcionario;
    protected $fk_id_produto;
    protected $fk_id_forma_pagamento;
    protected $fk_id_cliente;
    protected $numero_parcelas;
    protected $data_venda;

    /**
     * @return mixed
     */
    public function getIdVenda()
    {
        return $this->id_venda;
    }

    /**
     * @param mixed $id_venda
     */
    public function setIdVenda($id_venda)
    {
        $this->id_venda = $id_venda;
    }

    /**
     * @return mixed
     */
    public function getFkIdFuncionario()
    {
        return $this->fk_id_funcionario;
    }

    /**
     * @param mixed $fk_id_funcionario
     */
    public function setFkIdFuncionario($fk_id_funcionario)
    {
        $this->fk_id_funcionario = $fk_id_funcionario;
    }

    /**
     * @return mixed
     */
    public function getFkIdvenda()
    {
        return $this->fk_id_venda;
    }

    /**
     * @param mixed $fk_id_venda
     */
    public function setFkIdvenda($fk_id_venda)
    {
        $this->fk_id_venda = $fk_id_venda;
    }

    /**
     * @return mixed
     */
    public function getFkIdFormaPagamento()
    {
        return $this->fk_id_forma_pagamento;
    }

    /**
     * @param mixed $fk_id_forma_pagamento
     */
    public function setFkIdFormaPagamento($fk_id_forma_pagamento)
    {
        $this->fk_id_forma_pagamento = $fk_id_forma_pagamento;
    }

    /**
     * @return mixed
     */
    public function getFkIdCliente()
    {
        return $this->fk_id_cliente;
    }

    /**
     * @param mixed $fk_id_cliente
     */
    public function setFkIdCliente($fk_id_cliente)
    {
        $this->fk_id_cliente = $fk_id_cliente;
    }

    /**
     * @return mixed
     */
    public function getNumeroParcelas()
    {
        return $this->numero_parcelas;
    }

    /**
     * @param mixed $numero_parcelas
     */
    public function setNumeroParcelas($numero_parcelas)
    {
        $this->numero_parcelas = $numero_parcelas;
    }

    /**
     * @return mixed
     */
    public function getDataVenda()
    {
        return $this->data_venda;
    }

    /**
     * @param mixed $data_venda
     */
    public function setDataVenda($data_venda)
    {
        $this->data_venda = $data_venda;
    }

    public function inserirVenda($dados)
    {
        $codigo = $dados['codigo'];
        $forma_pagamento = $dados['forma_pagamento'];
        $cpf_cnpj = $dados['cpf_cnpj'];
        $numero_parcelas = $dados['numero_parcelas'];
        $data_venda = date('Y-m-d H:i:s');
        //desc_venda, qtd_estoque, codigo, valor, fk_id_marca, fk_id_medida
        $sql = "insert into venda(fk_id_funcionario, fk_id_produto, fk_id_forma_pagamento, fk_id_cliente, numero_parcelas, data_venda) 
        values (1,
        (select id_produto from produto where codigo='$codigo'),
        $forma_pagamento,
        (select id_cliente from cliente where cpf='$cpf_cnpj' or cnpj='$cpf_cnpj'),
        $numero_parcelas,
        '$data_venda');";
        echo $sql;

        return (new Conexao())->executar($sql);
    }
    public function inserirItens($dados){
        $quantidade = $dados['quantidade'];
        $valor_unit = $dados['valor_unitario'];
        $produto = $dados['codigo'];

        $sql = "insert into itens_venda(qtd, valor_unit, fk_id_produto, fk_id_venda)
        values ($quantidade, (select valor from produto where codigo='$produto'),
        (select id_produto from produto where codigo='$produto'),
        (select max(id_venda) from venda));";
        echo $sql;
        return (new Conexao())->executar($sql);

    }
    public function atualizaEstoque($dados){
        $quantidade = $dados['quantidade'];
        $codigo = $dados['codigo'];

        $sql = "update produto set qtd_estoque=(qtd_estoque-$quantidade) where codigo='$codigo';";
        echo $sql;
        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select c.nome, p.desc_produto, v.data_venda, f.nome pag, v.numero_parcelas, i.qtd from venda v
        join cliente c on v.fk_id_cliente=c.id_cliente
        join produto p on v.fk_id_produto=p.id_produto
        join forma_pagamento f on v.fk_id_forma_pagamento=f.id_forma_pagamento
        join itens_venda i on v.id_venda=i.fk_id_venda order by v.data_venda DESC";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from venda where id_venda=$id";
        return (new Conexao())->executar($sql);
    }
    public function selecionarId($id_venda)
    {
        $sql = "select * from venda where id_venda=$id_venda";
        $venda = (new Conexao())->recuperarDados($sql);

        $this->id_venda = $venda[0]['id_venda'];
        $this->desc_venda = $venda[0]['desc_venda'];
        $this->qtd_estoque = $venda[0]['qtd_estoque'];
        $this->codigo = $venda[0]['codigo'];
        $this->valor = $venda[0]['valor'];
        $this->fk_id_marca = $venda[0]['fk_id_marca'];
        $this->fk_id_medida = $venda[0]['fk_id_medida'];

    }
    public function alterar($dados)
    {
        $id_venda = $dados['id_venda'];
        $desc_venda = $dados['desc_venda'];
        $qtd_estoque = $dados['qtd_estoque'];
        $codigo = $dados['codigo'];
        $valor = $dados['valor'];
        $fk_id_marca = $dados['marca'];
        $fk_id_medida = $dados['medida'];

        $sql = "update venda set desc_venda='$desc_venda', qtd_estoque='$qtd_estoque', 
        codigo='$codigo', valor='$valor', fk_id_marca='$fk_id_marca', fk_id_medida='$fk_id_medida' where id_venda=$id_venda";
        return (new Conexao())->executar($sql);
    }
}



?>