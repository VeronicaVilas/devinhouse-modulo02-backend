<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Média</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <div class="container">
    <div class="left-container">
      <h1>Calculadora de média</h1>
    </div>

    <div class="right-container">

      <div class="form-header">
          <h1>Resultado</h1>
      </div>
      
      <div>
        <?php
          $nota1 = filter_var($_POST['nota1'], FILTER_VALIDATE_FLOAT);
          $nota2 = filter_var($_POST['nota2'], FILTER_VALIDATE_FLOAT);
          $nota3 = filter_var($_POST['nota3'], FILTER_VALIDATE_FLOAT);
          $nota4 = filter_var($_POST['nota4'], FILTER_VALIDATE_FLOAT);

          if(!$nota1 || !$nota2 || !$nota3 || !$nota4 ) {
            echo "É necessário inserir as notas!";
            exit;
          } else {
            $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
          }
        ?>

        <div class="table-average">
            <table border="1">
            <thead>
            <tr>
                <th>NOTA 1</th>
                <th>NOTA 2</th>
                <th>NOTA 3</th>
                <th>NOTA 4</th>
                <th>MÉDIA</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo number_format($nota1, 2, ",", ".") ?></td>
                <td><?php echo number_format($nota2, 2, ",", ".") ?></td>
                <td><?php echo number_format($nota3, 2, ",", ".") ?></td>
                <td><?php echo number_format($nota4, 2, ",", ".") ?></td>
                <td><strong><?php echo number_format($media, 2, ",", ".") ?></strong></td>
            </tr>
            </tbody>
        </table>
        </div>


        <div class="button-again">
          <button><a href="./media.php">Calcular Novamente</a></button>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>