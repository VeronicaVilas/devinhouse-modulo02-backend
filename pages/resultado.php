<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <div class="container">
    <div class="left-container">
      <h1>Calculadora Básica</h1>
    </div>

    <div class="right-container">

      <div class="form-header">
          <h1>Resultado</h1>
      </div>
        <?php
          $valor1 = filter_var($_POST['valor1'], FILTER_VALIDATE_FLOAT);
          $valor2 = filter_var($_POST['valor2'], FILTER_VALIDATE_FLOAT);
          $operacao = isset($_POST['operacao']);

          if(!$valor1 || !$valor2 ) {
              echo "Por favor, insira o valores para prosseguir com a solicitação.";
              exit;
          } else {
            switch($operacao) {
              case 'soma': {
                $resultado = number_format($valor1 + $valor2, 2, ",", ".");
                echo number_format($valor1, 2, ",", "."). " + " .number_format($valor2, 2, ",", "."). " = $resultado";
                break;
              }
              case 'subtracao': {
                $resultado = number_format($valor1 - $valor2, 2, ",", ".");
                echo number_format($valor1, 2, ",", "."). " - " .number_format($valor2, 2, ",", "."). " = $resultado";
                break;
              }
              case 'multiplicacao': {
                $resultado = number_format($valor1 * $valor2, 2, ",", ".");
                echo number_format($valor1, 2, ",", "."). " * " .number_format($valor2, 2, ",", "."). " = $resultado";
                break;
              }
              case 'divisao': {
                $resultado = number_format($valor1 / $valor2, 2, ",", ".");
                echo number_format($valor1, 2, ",", "."). " / " .number_format($valor2, 2, ",", "."). " = $resultado";
                break;
              }
              default: {
                echo "Operação não encontrada";
                break;
              }
            }
          }
        ?>
      <div>
        <div class="button-again">
          <button><a href="./calculadora.php">Calcular Novamente</a></button>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>