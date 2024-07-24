<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        $peso = isset($_POST['peso']) ? filter_var($_POST['peso'], FILTER_VALIDATE_FLOAT) : null;
        $altura = isset($_POST['altura']) ? filter_var($_POST['altura'], FILTER_VALIDATE_FLOAT) : null;
        $imc = null;
        $mensagem = "";

        if ($peso && $altura) {
            $imc = $peso / ($altura ** 2);

            if ($imc <= 18.5) {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Você está abaixo do peso!</p>";
            } elseif ($imc >= 18.6 && $imc <= 24.9) {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Parabéns! Você está com peso ideal!</p>";
            } elseif ($imc >= 25.0 && $imc <= 29.9) {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Você está levemente acima do peso!</p>";
            } elseif ($imc >= 30 && $imc <= 34.9) {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Você está com Obesidade Grau I!</p>";
            } elseif ($imc >= 35 && $imc <= 39.9) {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Você está com Obesidade Grau II!</p>";
            } else {
                $mensagem = "<p>O seu <strong>IMC é ".number_format($imc, 1, ",", "."). "</strong>. Você está com Obesidade Grau III!</p>";
            }
        }
    ?>
    <div class="container">
        <div class="left-container">
            <h1>Índice de Massa Corporal (IMC)</h1>
        </div>
        <section class="right-container" id="form-section" style="<?php echo ($imc !== null) ? 'display: none;' : 'display: block;'; ?>">
            <form id="imcForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="form-header">
                    <h1>Calculadora - IMC</h1>
                </div>
                <div class="input-group">
                    <label for="peso">Peso em kg</label>
                    <div class="input-field">
                        <i class="fa-solid fa-weight-scale"></i>
                        <input type="number" name="peso" id="peso" step="any" required />
                        <span>kg</span>
                    </div>
                    <label for="altura">Altura em metros</label>
                    <div class="input-field">
                        <i class="fa-solid fa-ruler"></i>
                        <input type="number" name="altura" id="altura" step="any" required />
                        <span>m</span>
                    </div>
                    <div class="button-submit">
                        <button type="submit">Calcular</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="right-container" id="resultado-section" style="<?php echo ($imc !== null) ? 'display: block;' : 'display: none;'; ?>">
                <div class="form-header">
                    <h1>Resultado</h1>
                </div>
                <div>
                    <?php
                        if ($imc !== null) {
                            echo $mensagem;
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