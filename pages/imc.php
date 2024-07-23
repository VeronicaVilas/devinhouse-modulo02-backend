<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IMC</title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">

    <div class="left-container">
      <h1>Índice de Massa Corporal (IMC)</h1>
    </div>

    <form class="right-container" method="post" action="calcular_imc.php"> 

      <div class="form-header">
          <h1>Calculadora - IMC</h1>
      </div>

      <div class="input-group">

        <label>Peso em kg</label>
        <div class="input-field" >
          <i class="fa-solid fa-weight-scale"></i>
          <input type="number" name="peso" />
          <span>kg</span>
        </div>
          
        <label>Altura em metros</label>
        <div class="input-field">
          <i class="fa-solid fa-ruler"></i>
          <input type="number" name="altura" step="any" />
          <span>m</span>
        </div>

        <div class="button-submit">
          <button type="submit">Calcular</button>
        </div>

      </div>
    </form>
  </div>
</body>
</html>