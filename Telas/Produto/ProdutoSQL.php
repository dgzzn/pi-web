<?php
include_once '../../Conexao.php';

class ProdutoSQL{
    protected $id_produto;
    protected $desc_produto;
    protected $qtd_estoque;
    protected $codigo;
    protected $valor;
    protected $fk_id_marca;
    protected $fk_id_medida;

    /**
     * @return mixed
     */
    public function getIdProduto()
    {
        return $this->id_produto;
    }

    /**
     * @param mixed $id_produto
     */
    public function setIdProduto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    /**
     * @return mixed
     */
    public function getDescProduto()
    {
        return $this->desc_produto;
    }

    /**
     * @param mixed $desc_produto
     */
    public function setDescProduto($desc_produto)
    {
        $this->desc_produto = $desc_produto;
    }

    /**
     * @return mixed
     */
    public function getQtdEstoque()
    {
        return $this->qtd_estoque;
    }

    /**
     * @param mixed $qtd_estoque
     */
    public function setQtdEstoque($qtd_estoque)
    {
        $this->qtd_estoque = $qtd_estoque;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getFkIdMarca()
    {
        return $this->fk_id_marca;
    }

    /**
     * @param mixed $fk_id_marca
     */
    public function setFkIdMarca($fk_id_marca)
    {
        $this->fk_id_marca = $fk_id_marca;
    }

    /**
     * @return mixed
     */
    public function getFkIdMedida()
    {
        return $this->fk_id_medida;
    }

    /**
     * @param mixed $fk_id_medida
     */
    public function setFkIdMedida($fk_id_medida)
    {
        $this->fk_id_medida = $fk_id_medida;
    }
    public function inserir($dados)
    {
        $desc_produto = $dados['desc_produto'];
        $qtd_estoque = $dados['qtd_estoque'];
        $codigo = $dados['codigo'];
        $valor = $dados['valor'];
        $fk_marca = $dados['marca'];
        //$fk_medida = $dados['medida'];
        //desc_produto, qtd_estoque, codigo, valor, fk_id_marca, fk_id_medida
        $sql = "insert into produto(desc_produto, qtd_estoque, codigo, valor, fk_id_marca, fk_id_medida) values ('$desc_produto',
        $qtd_estoque, '$codigo', $valor, $fk_marca, 1)"; //$fk_medida
        echo $sql;

        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select p.id_produto, p.desc_produto, p.qtd_estoque, p.codigo, p.valor, m.nome, md.unidade
        from produto p join marca m on p.fk_id_marca=m.id_marca join medida md on p.fk_id_medida=md.id_medida;";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from produto where id_produto=$id";
        return (new Conexao())->executar($sql);
    }
    public function selecionarId($id_produto)
    {
        $sql = "select * from produto where id_produto=$id_produto";
        $produto = (new Conexao())->recuperarDados($sql);

        $this->id_produto = $produto[0]['id_produto'];
        $this->desc_produto = $produto[0]['desc_produto'];
        $this->qtd_estoque = $produto[0]['qtd_estoque'];
        $this->codigo = $produto[0]['codigo'];
        $this->valor = $produto[0]['valor'];
        $this->fk_id_marca = $produto[0]['fk_id_marca'];
        $this->fk_id_medida = $produto[0]['fk_id_medida'];

    }
    public function alterar($dados)
    {
        $id_produto = $dados['id_produto'];
        $desc_produto = $dados['desc_produto'];
        $qtd_estoque = $dados['qtd_estoque'];
        $codigo = $dados['codigo'];
        $valor = $dados['valor'];
        $fk_id_marca = $dados['marca'];
        //$fk_id_medida = $dados['fk_id_medida'];  fk_id_medida='$fk_id_medida'

        $sql = "update produto set desc_produto='$desc_produto', qtd_estoque='$qtd_estoque', 
        codigo='$codigo', valor='$valor', fk_id_marca='$fk_id_marca' where id_produto=$id_produto";
        return (new Conexao())->executar($sql);
    }
}








?>