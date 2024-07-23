<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IMC</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <div class="container">
    <div class="left-container">
      <h1>Índice de Massa Corporal (IMC)</h1>
    </div>

    <div class="right-container">

      <div class="form-header">
          <h1>Resultado</h1>
      </div>
      
      <div>
        <?php
          $peso = filter_var($_POST['peso'], FILTER_VALIDATE_FLOAT);
          $altura = filter_var($_POST['altura'], FILTER_VALIDATE_FLOAT);

          if(!$peso || !$altura) {
            echo "O peso e a altura são obrigatório para prosseguir com o resultado";
            exit;
          } else {
            $imc = $peso / ($altura ** 2);

            if ($imc <= 18.5) {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Você está abaixo do peso!";
            } else if ($imc >= 18.6 && $imc <= 24.9) {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Parabéns!! Você está com peso ideal!";
            } else if ($imc >= 25.0 && $imc <= 29.9) {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Você está levemente acima do peso!";
            } else if ($imc >= 30 && $imc <= 34.9) {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Você está com Obesidade Grau I!";
            } else if ($imc >= 35 && $imc <= 39.9) {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Você está com Obesidade Grau II!";
            } else {
              echo "O seu imc é ".number_format($imc, 1, ",", "."). ". Você está com Obesidade Grau III!";
            }
          }
        ?>

        <div class="button-again">
          <button><a href="./imc.php">Calcular Novamente</a></button>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>