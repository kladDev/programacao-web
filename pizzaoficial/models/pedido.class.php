<?php
    class Pedido {
        public $idPedido;
        public $idCliente;
        public $observacao;

        public function __construct($idPedido, $idCliente, $observacao) {
            $this->idPedido = $idPedido;
            $this->idCliente = $idCliente;
            $this->observacao = $observacao;
        }

        public static function adicionar($conexao, $idCliente, $observacao) {
            $sql = "INSERT INTO pedido(cliente_idCliente, observacao) VALUES ($idCliente, '$observacao')";
            $conexao->query($sql);
        }

        public static function getTodos($conexao) {
            $sql = "SELECT * FROM pedido";
            $resultado = $conexao->query($sql);
            foreach($resultado as $registro) {
                $pedidos[] = new Pedido($registro['idPedido'], $registro['cliente_idCliente'], $registro['observacao']);
            }

            return $pedidos;
        }
    } 
?>