<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza à pedir</title>

    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .button-pedido {
            font-size: 16px;
            border-radius: 6px;

            cursor: pointer;
            border: none;
            color: #FFF;
            background-color: #669921;

            padding: 8px 16px;


            position: absolute;
            top: 16px;
            right: 50%;
            transform: translateX(50%);
        }
    </style>
</head>

<body>
    <section class="pedido-pizza">
        <?php
        require_once '../../configs/conexao.php';
        require_once '../../models/pizza.class.php';

        $pizzas = Pizza::getTodos($conexao);
        foreach ($pizzas as $registros) {
        ?>
            <form action="../criar/criar_pedido_pizza.php" class="card">
                <img src="../../img/post-1.jpg">
                <?php
                if (intval($registros->idPizza) === 1) {
                ?>
                    <input type="submit" class="button-pedido" value="Fazer Pedido">
                <?php
                }
                ?>

                <div class="sobre">
                    <div>
                        <span>Sabor: </span> <span><?php echo $registros->sabor ?></span>
                    </div>
                    <div>
                        <span>Preço: </span> <span>R$ <?php echo $registros->preco ?></span>
                    </div>
                    <div>
                        <span>Tamanho: </span> <span><?php echo $registros->tamanho ?></span>
                    </div>
                    <div>
                        <span>Quantidade: </span> <input type="number" name="quantidade[]" id="quantidade" min="0" max="15">
                    </div>
                </div>
                <input class="ok" type="checkbox" name="idPizza" id="idPizza" value="<?php echo $registros->idPizza ?>">

            </form>
        <?php
        }
        ?>

    </section>
</body>

</html>