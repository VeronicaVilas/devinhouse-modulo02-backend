<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Média</title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">

    <div class="left-container">
      <h1>Calculadora de média</h1>
    </div>

    <form class="right-container" method="post" action="calcular_media.php"> 

      <div class="form-header">
          <h1>Calculadora - Média</h1>
      </div>

      <div class="input-group">

        <label>Nota 1:</label>
        <div class="input-field">
          <input type="number" name="nota1" step="any"/>
        </div>

        <label>Nota 2:</label>
        <div class="input-field">
          <input type="number" name="nota2" step="any"/>
        </div>

        <label>Nota 3:</label>
        <div class="input-field">
          <input type="number" name="nota3" step="any"/>
        </div>

        <label>Nota 4:</label>
        <div class="input-field">
          <input type="number" name="nota4" step="any"/>
        </div>
  
        <div class="button-submit">
          <button type="submit">Calcular</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>