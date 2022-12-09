<?php
    class Cliente {
        public $idCliente;
        public $nome;
        public $telefone;

        public function __construct($idCliente, $nome, $telefone) {
            $this->idCliente = $idCliente;
            $this->nome = $nome;
            $this->telefone = $telefone;
        }

        public static function adicionar($conexao, $nome, $telefone) {
            $sql = "INSERT INTO cliente (nome, telefone) VALUES ('$nome', '$telefone')";
            $conexao->query($sql);
        }

        public static function getTodos($conexao) {
            $sql = "SELECT * FROM cliente";
            $resultado = $conexao->query($sql);
            foreach($resultado as $registro) {
                $clientes[] = new Cliente($registro['idCliente'], $registro['nome'], $registro['telefone']);
            }

            return $clientes;
        }

        public static function get($conexao){
            $sql = "SELECT cliente.idCliente FROM cliente ORDER BY cliente.idCliente DESC LIMIT 1;";
            $resultado = $conexao->query($sql);
            $registro = $resultado->fetch();
            return intval($registro['idCliente']);
        }

        public static function getNome($conexao, $idCliente) {
            $sql = "SELECT cliente.nome FROM cliente WHERE cliente.idCliente = $idCliente";
            $resultado = $conexao->query($sql);
            $registro = $resultado->fetch();
            return $registro['nome'];
        }
    }
?>