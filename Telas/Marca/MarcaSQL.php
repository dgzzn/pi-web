<?php
include_once '../../Conexao.php';

class MarcaSQL{
    protected $id_marca;
    protected $nome;
    protected $imagem;

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->id_marca;
    }

    /**
     * @param mixed $id_marca
     */
    public function setIdMarca($id_marca)
    {
        $this->id_marca = $id_marca;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }


    public function inserir($dados)
    {
        $filetmp = $_FILES["imagem"]["tmp_name"];
        $filename = $_FILES["imagem"]["name"];
        $filepath = "../../assets/img/marca/".$filename;
        move_uploaded_file($filetmp,$filepath);
        $nome = $dados['nome'];
        $sql = "insert into marca(nome, imagem) values ('$nome', '$filepath')";

        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select * from marca";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from marca where id_marca=$id";
        return (new Conexao())->executar($sql);
    }
    public function selecionarId($id_marca)
    {
        $sql = "select * from marca where id_marca=$id_marca";
        $marca = (new Conexao())->recuperarDados($sql);

        $this->id_marca = $marca[0]['id_marca'];
        $this->nome = $marca[0]['nome'];
        $this->imagem = $marca[0]['imagem'];

    }
    public function alterar($dados)
    {
        $nome = $dados['nome'];
        $id_marca = $dados['id_marca'];
        $filepath = $dados['imagem'];

        $filetmp = $_FILES["imagem"]["tmp_name"];
        $filename = $_FILES["imagem"]["name"];
        $filepath = "../../assets/img/marca/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $sql = "update marca set nome='$nome', imagem='$filepath' where id_marca=$id_marca";
        return (new Conexao())->executar($sql);
    }

}



?>