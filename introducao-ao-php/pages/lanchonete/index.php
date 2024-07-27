<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanchonete</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        $totalGeral = 0;
        $mensagem = "";

        function calcularPreco($codigo, $quantidade, &$produto) {
            $precos = [
                101 => ['produto' => 'Hambúrguer', 'preco' => 15.00],
                102 => ['produto' => 'Batata Frita', 'preco' => 8.00],
                103 => ['produto' => 'Salada', 'preco' => 12.00],
                104 => ['produto' => 'Pizza', 'preco' => 20.00],
                105 => ['produto' => 'Sushi', 'preco' => 25.00],
                106 => ['produto' => 'Sorvete', 'preco' => 7.00],
                107 => ['produto' => 'Donut', 'preco' => 5.00],
                108 => ['produto' => 'Suco', 'preco' => 6.00],
                109 => ['produto' => 'Bolo', 'preco' => 10.00]
            ];

            if (isset($precos[$codigo])) {
                $produto = $precos[$codigo]['produto'];
                return $quantidade * $precos[$codigo]['preco'];
            }

            return null;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $codigos = explode(',', filter_input(INPUT_POST, 'codigos', FILTER_SANITIZE_STRING));
            $quantidades = explode(',', filter_input(INPUT_POST, 'quantidades', FILTER_SANITIZE_STRING));

            if (count($codigos) !== count($quantidades)) {
                $mensagem = "O número de códigos e quantidades não corresponde. Por favor, verifique os dados.";
            } else {
                for ($i = 0; $i < count($codigos); $i++) {
                    $codigo = filter_var($codigos[$i], FILTER_VALIDATE_INT);
                    $quantidade = filter_var($quantidades[$i], FILTER_VALIDATE_INT);

                    if ($codigo && $quantidade) {
                        $produto = '';
                        $total = calcularPreco($codigo, $quantidade, $produto);
                        if ($total !== null) {
                            $totalGeral += $total;
                            $mensagem .= "$produto(s) x $quantidade = R$ " . number_format($total, 2, ",", ".") . ".<br>";
                        } else {
                            $mensagem .= "Código $codigo não localizado. Por favor, verifique e tente novamente.<br>";
                        }
                    } else {
                        $mensagem .= "Pedido com código $codigo e quantidade $quantidade inválidos. Por favor, preencha os dados corretamente.<br>";
                    }
                }
                $mensagem .= "<b>Total geral: R$ " . number_format($totalGeral, 2, ",", ".");
            }
        }
    ?>
    <div class="container">
        <div class="left-container">
            <h1>Lanchonete</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>PRODUTO</th>
                        <th>VALOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>🍔 Hambúrguer</td>
                        <td>R$ 15,00</td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>🍟 Batata Frita</td>
                        <td>R$ 8,00</td>
                    </tr>
                    <tr>
                        <td>103</td>
                        <td>🥗 Salada</td>
                        <td>R$ 12,00</td>
                    </tr>
                    <tr>
                        <td>104</td>
                        <td>🍕 Pizza</td>
                        <td>R$ 20,00</td>
                    </tr>
                    <tr>
                        <td>105</td>
                        <td>🍣 Sushi</td>
                        <td>R$ 25,00</td>
                    </tr>
                    <tr>
                        <td>106</td>
                        <td>🍦 Sorvete</td>
                        <td>R$ 7,00</td>
                    </tr>
                    <tr>
                        <td>107</td>
                        <td>🍩 Donut</td>
                        <td>R$ 5,00</td>
                    </tr>
                    <tr>
                        <td>108</td>
                        <td>🍹 Suco</td>
                        <td>R$ 6,00</td>
                    </tr>
                    <tr>
                        <td>109</td>
                        <td>🍰 Bolo</td>
                        <td>R$ 10,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <section class="right-container" id="form-section" style="display: <?php echo ($totalGeral !== 0 || $mensagem) ? 'none' : 'block'; ?>;">
            <form id="lanchoneteForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="form-header">
                    <h1>Faça um pedido!</h1>
                </div>
                <div class="input-group">
                    <label for="codigos">Códigos dos pedidos (separados por vírgula)</label>
                    <div class="input-field">
                        <i class="fa-solid fa-cash-register"></i>
                        <input type="text" name="codigos" id="codigos" required />
                    </div>
                    <label for="quantidades">Quantidades (separadas por vírgula)</label>
                    <div class="input-field">
                        <i class="fa-solid fa-money-bill"></i>
                        <input type="text" name="quantidades" id="quantidades" required />
                    </div>
                    <div class="button-submit">
                        <button type="submit">Calcular</button>
                    </div>
                </div>
            </form>
        </section>

        <section class="right-container" id="resultado-section" style="display: <?php echo ($totalGeral !== 0 || $mensagem) ? 'block' : 'none'; ?>;">
            <div class="form-header">
                <h1>Pedido</h1>
            </div>
            <div>
                <?php
                    if ($mensagem !== "") {
                        echo "<p>$mensagem</p>";
                    }
                ?>
                <div class="button-again">
                    <button type="button" onclick="javascript:document.getElementById('form-section').style.display = 'block'; document.getElementById('resultado-section').style.display = 'none'; document.getElementById('lanchoneteForm').reset();">Calcular Novamente</button>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
