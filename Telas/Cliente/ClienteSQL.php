<?php
include_once '../../Conexao.php';

class ClienteSQL{
    protected $id_cliente;
    protected $nome;
    protected $cpf;
    protected $cnpj;
    protected $tel1;
    protected $tel2;
    protected $email;
    protected $limite_credito;
    protected $complemento_endereco;
    protected $fk_id_cep;
    protected $cep;
    protected $tipo_logradouro;
    protected $logradouro;
    protected $municipio;

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * @param mixed $tel1
     */
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;
    }

    /**
     * @return mixed
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * @param mixed $tel2
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLimiteCredito()
    {
        return $this->limite_credito;
    }

    /**
     * @param mixed $limite_credito
     */
    public function setLimiteCredito($limite_credito)
    {
        $this->limite_credito = $limite_credito;
    }

    /**
     * @return mixed
     */
    public function getComplementoEndereco()
    {
        return $this->complemento_endereco;
    }

    /**
     * @param mixed $complemento_endereco
     */
    public function setComplementoEndereco($complemento_endereco)
    {
        $this->complemento_endereco = $complemento_endereco;
    }

    /**
     * @return mixed
     */
    public function getFkIdCep()
    {
        return $this->fk_id_cep;
    }

    /**
     * @param mixed $fk_id_cep
     */
    public function setFkIdCep($fk_id_cep)
    {
        $this->fk_id_cep = $fk_id_cep;
    }
    public function inserir($dados)
    {
        //id_cliente;nome;cpf;cnpj;tel1;tel2;email;limite_credito;complemento_endereco;fk_id_cep;
        $nome = $dados['nome'];
        if($dados['tipo_pessoa']=="física"){
            $cpf = $dados['cpf_cnpj'];
            $cnpj = '';
        }else{
            $cpf = '';
            $cnpj = $dados['cpf_cnpj'];
        }
        $tel1 = $dados['tel1'];
        $tel2 = $dados['tel2'];
        $email = $dados['email'];
        $limite_credito = $dados['limite_credito'];
        $fk_id_cep = $dados['cep'];
        $complemento = $dados['complemento_endereco'];
        $sql = "insert into cliente(nome,cpf,cnpj,tel1,tel2,email,limite_credito,complemento_endereco,fk_id_cep)
        values ('$nome', '$cpf', '$cnpj', '$tel1', '$tel2', '$email', $limite_credito, '$complemento',
         (select id_cep from cep where cep=$fk_id_cep))";
        echo $sql;

        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select c.*, e.* from cliente c join cep e on c.fk_id_cep=e.id_cep order by nome asc";
        return (new Conexao())->recuperarDados($sql);
    }
    public function procurarDetalhe($id){
        $sql = "select c.*, e.* from cliente c join cep e on c.fk_id_cep=e.id_cep where c.id_cliente=$id";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from cliente where id_cliente=$id";
        return (new Conexao())->executar($sql);
    }
    public function selecionarId($id_cliente)
    {
        $sql = "select c.*, cep.* from cliente c join cep on c.fk_id_cep=cep.id_cep and id_cliente=$id_cliente";
        $cliente = (new Conexao())->recuperarDados($sql);

        $this->id_cliente = $cliente[0]['id_cliente'];
        $this->nome = $cliente[0]['nome'];
        $this->cpf = $cliente[0]['cpf'];
        $this->cnpj = $cliente[0]['cnpj'];
        $this->tel1 = $cliente[0]['tel1'];
        $this->tel2 = $cliente[0]['tel2'];
        $this->email = $cliente[0]['email'];
        $this->limite_credito = $cliente[0]['limite_credito'];
        $this->complemento_endereco = $cliente[0]['complemento_endereco'];
        $this->fk_id_cep = $cliente[0]['fk_id_cep'];
        $this->cep = $cliente[0]['cep'];

    }
    public function alterar($dados)
    {
        $id_cliente = $dados['id_cliente'];
        $nome = $dados['nome'];
        if($dados['tipo_pessoa']=="física"){
            $cpf = $dados['cpf_cnpj'];
            $cnpj='';
        }else{
            $cnpj = $dados['cpf_cnpj'];
            $cpf='';
        }
        $tel1 = $dados['tel1'];
        $tel2 = $dados['tel2'];
        $email = $dados['email'];
        $limite_credito = $dados['limite_credito'];
        $complemento = $dados['complemento_endereco'];
        $id_cep = $dados['cep'];

        $sql = "update cliente set nome='$nome', cpf='$cpf', cnpj='$cnpj', tel1='$tel1', tel2='$tel2', 
         email='$email', limite_credito='$limite_credito', complemento_endereco='$complemento', fk_id_cep=(select id_cep from cep where cep=$id_cep) where id_cliente=$id_cliente";
        echo $sql;
        return (new Conexao())->executar($sql);
    }

}