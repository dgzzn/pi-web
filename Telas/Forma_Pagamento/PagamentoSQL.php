<?php
include_once '../../Conexao.php';

class PagamentoSQL{
    protected $id_forma_pagamento;
    protected $nome;

    /**
     * @return mixed
     */
    public function getIdFormaPagamento()
    {
        return $this->id_forma_pagamento;
    }

    /**
     * @param mixed $id_forma_pagamento
     */
    public function setIdFormaPagamento($id_forma_pagamento)
    {
        $this->id_forma_pagamento = $id_forma_pagamento;
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


    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $sql = "insert into forma_pagamento(nome) values ('$nome')";

        return (new Conexao())->executar($sql);
    }

    public function procurar(){
        $sql = "select * from forma_pagamento";
        return (new Conexao())->recuperarDados($sql);
    }

    public function excluir($id)
    {
        $sql = "delete from forma_pagamento where id_forma_pagamento=$id";
        return (new Conexao())->executar($sql);
    }
}



?>