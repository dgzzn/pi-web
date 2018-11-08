<?php
include_once '../../Conexao.php';

class MedidaSQL{
    protected $id_medida;
    protected $nome;
    protected $unidade;

    public function getIdMedida()
    {
        return $this->id_medida;
    }

    public function setIdMedida($id_medida)
    {
        $this->id_medida = $id_medida;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getUnidade(){
        return $this->unidade;
    }
    public function setUnidade($unidade){
        $this->unidade = $unidade;
    }
    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $unidade = $dados['unidade'];
        $sql = "insert into medida(nome, unidade) values ('$nome', '$unidade')";

        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select * from medida";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from medida where id_medida=$id";
        return (new Conexao())->executar($sql);
    }
    public function selecionarId($id_medida)
    {
        $sql = "select * from medida where id_medida=$id_medida";
        $medida = (new Conexao())->recuperarDados($sql);

        $this->id_medida = $medida[0]['id_medida'];
        $this->nome = $medida[0]['nome'];
        $this->unidade = $medida[0]['unidade'];

    }
    public function alterar($dados)
    {
        $nome = $dados['nome'];
        $id_medida = $dados['id_medida'];
        $unidade = $dados['unidade'];

        $sql = "update medida set nome='$nome', unidade='$unidade' where id_medida=$id_medida";
        return (new Conexao())->executar($sql);
    }
}