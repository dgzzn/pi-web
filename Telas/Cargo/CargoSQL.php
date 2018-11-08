<?php

    include_once '../../Conexao.php';

    class CargoSQL{
        protected $id_cargo;
        protected $nome;
        protected $nivel_perfil;
        protected $desconto;

        /**
         * @return mixed
         */
        public function getIdCargo()
        {
            return $this->id_cargo;
        }

        /**
         * @param mixed $id_cargo
         */
        public function setIdCargo($id_cargo)
        {
            $this->id_cargo = $id_cargo;
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
        public function getNivelPerfil()
        {
            return $this->nivel_perfil;
        }

        /**
         * @param mixed $nivel_perfil
         */
        public function setNivelPerfil($nivel_perfil)
        {
            $this->nivel_perfil = $nivel_perfil;
        }

        /**
         * @return mixed
         */
        public function getDesconto()
        {
            return $this->desconto;
        }

        /**
         * @param mixed $desconto
         */
        public function setDesconto($desconto)
        {
            $this->desconto = $desconto;
        }

        public function inserir($dados)
        {
            $nome = $dados['nome'];
            $nivel_perfil = $dados['nivel_perfil'];
            $desconto = $dados['max_desconto'];
            $sql = "insert into cargo(nome, nivel_perfil, max_desconto) values ('$nome', '$nivel_perfil', '$desconto')";

            return (new Conexao())->executar($sql);
        }

        public function procurar(){
            $sql = "select * from cargo";
            return (new Conexao())->recuperarDados($sql);
        }

        public function excluir($id)
        {
            $sql = "delete from cargo where id_cargo=$id";
            return (new Conexao())->executar($sql);
        }
        public function selecionarId($id_cargo)
        {
            $sql = "select * from cargo where id_cargo=$id_cargo";
            $cargo = (new Conexao())->recuperarDados($sql);

            $this->id_cargo = $cargo[0]['id_cargo'];
            $this->nome = $cargo[0]['nome'];
            $this->nivel_perfil = $cargo[0]['nivel_perfil'];
            $this->desconto = $cargo[0]['max_desconto'];

        }
        public function alterar($dados)
        {
            $nome = $dados['nome'];
            $id_cargo = $dados['id_cargo'];
            $nivel_perfil = $dados['nivel_perfil'];
            $max_desconto = $dados['max_desconto'];


            $sql = "update cargo set nome='$nome', nivel_perfil='$nivel_perfil', max_desconto='$max_desconto' where id_cargo=$id_cargo";
            return (new Conexao())->executar($sql);
        }
    }


?>