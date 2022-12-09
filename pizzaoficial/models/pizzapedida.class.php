<?php
    class PizzaPedida {
        public $idPizzaPedida;
        public $quantidade;
        public $idPedido;
        public $idPizza;

        public function __construct($idPizzaPedida, $quantidade, $idPedido, $idPizza){
            $this->idPizzaPedida = $idPizzaPedida;
            $this->quantidade = $quantidade;
            $this->idPedido = $idPedido;
            $this->idPizza = $idPizza;
        }

        public static function adicionar($conexao, $quantidade, $idPedido, $idPizza) {
            $sql = "INSERT INTO pizzapedida(quantidade, pedido_idPedido, pizza_idPizza) VALUES ($quantidade, $idPedido, $idPizza)";
            $conexao->query($sql);
        }

        public static function getTodos($conexao) {
            $sql = "SELECT * FROM pizzapedida";
            $resultado = $conexao->query($sql);
            
            foreach($resultado as $registro) {
                $pizzaPedido[] = new PizzaPedida($registro['idPizzaPedida'], $registro['quantidade'], $registro['pepido_idPedido'], $registro['pizza_idPizza']);
            }

            return $pizzaPedido;
        }
    }
?>