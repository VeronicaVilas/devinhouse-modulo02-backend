<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container">

    <div class="left-container">
      <h1>Calculadora Básica</h1>
    </div>

    <form class="right-container" method="post" action="resultado.php"> 

      <div class="form-header">
          <h1>Calculadora</h1>
      </div>

      <div class="input-group">

        <label>Primeiro valor:</label>
        <div class="input-field" >
          <input type="number" name="valor1" step="any"/>
        </div>
          
        <label>Segundo valor:</label>
        <div class="input-field">
          <input type="number" name="valor2" step="any"/>
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
  </div>
</body>
</html>