<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        $valor1 = isset($_POST['valor1']) ? filter_var($_POST['valor1'], FILTER_VALIDATE_FLOAT) : null;
        $valor2 = isset($_POST['valor2']) ? filter_var($_POST['valor2'], FILTER_VALIDATE_FLOAT) : null;
        $operacao = isset($_POST['operacao']) ? $_POST['operacao'] : null;
        $mensagem = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($valor1 === null || $valor2 === null || $operacao === null) {
                $mensagem = "Por favor, insira valores válidos para prosseguir com a solicitação.";
            } else {
                switch ($operacao) {
                    case 'soma':
                        $resultado = number_format($valor1 + $valor2, 2, ",", ".");
                        $mensagem = number_format($valor1, 2, ",", ".") . " + " . number_format($valor2, 2, ",", ".") . " = $resultado";
                        break;
                    case 'subtracao':
                        $resultado = number_format($valor1 - $valor2, 2, ",", ".");
                        $mensagem = number_format($valor1, 2, ",", ".") . " - " . number_format($valor2, 2, ",", ".") . " = $resultado";
                        break;
                    case 'multiplicacao':
                        $resultado = number_format($valor1 * $valor2, 2, ",", ".");
                        $mensagem = number_format($valor1, 2, ",", ".") . " * " . number_format($valor2, 2, ",", ".") . " = $resultado";
                        break;
                    case 'divisao':
                        if ($valor2 != 0) {
                            $resultado = number_format($valor1 / $valor2, 2, ",", ".");
                            $mensagem = number_format($valor1, 2, ",", ".") . " / " . number_format($valor2, 2, ",", ".") . " = $resultado";
                        } else {
                            $mensagem = "Erro: Divisão por zero.";
                        }
                        break;
                    default:
                        $mensagem = "Operação não encontrada.";
                        break;
                }
            }
        }
    ?>
    <div class="container">
        <div class="left-container">
            <h1>Calculadora Básica</h1>
        </div>
        <section class="right-container" id="form-section" style="<?php echo ($mensagem !== "") ? 'display: none;' : 'display: block;'; ?>">
            <form id="calcForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="form-header">
                    <h1>Calculadora</h1>
                </div>
                <div class="input-group">
                    <label for="valor1">Primeiro valor:</label>
                    <div class="input-field">
                        <input type="number" name="valor1" id="valor1" step="any" required />
                    </div>
                    <label for="valor2">Segundo valor:</label>
                    <div class="input-field">
                        <input type="number" name="valor2" id="valor2" step="any" required />
                    </div>
                    <label>Escolha a operação: </label>
                    <select class="select-input" name="operacao">
                        <option value="soma">➕ SOMA</option>
                        <option value="subtracao">➖ SUBTRAÇÃO</option>
                        <option value="multiplicacao">✖️ MULTIPLICAÇÃO</option>
                        <option value="divisao">➗ DIVISÃO</option>
                    </select>
                    <div class="button-submit">
                        <button type="submit">Calcular</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="right-container" id="resultado-section" style="<?php echo ($mensagem !== "") ? 'display: block;' : 'display: none;'; ?>">
            <div class="form-header">
                <h1>Resultado</h1>
            </div>
            <div>
                <?php
                    if ($mensagem !== "") {
                        echo "<p style='text-align:center;'>$mensagem</p>";
                    }
                ?>
                <div class="button-again">
                    <button type="button" onclick="javascript:document.getElementById('form-section').style.display = 'block'; document.getElementById('resultado-section').style.display = 'none';">Calcular Novamente</button>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
