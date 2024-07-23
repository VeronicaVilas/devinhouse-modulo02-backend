<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lanchonete</title>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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

    <form class="right-container" method="post" action="calcular_preco.php"> 

      <div class="form-header">
          <h1>Faça um pedido!</h1>
      </div>

      <div class="input-group">

        <label>Código do pedido</label>
        <div class="input-field" >
          <i class="fa-solid fa-cash-register"></i>
          <input type="text" name="codigo" />
        </div>
          
        <label>Quantidade</label>
        <div class="input-field">
        <i class="fa-solid fa-money-bill"></i>
          <input type="number" name="quantidade" />
        </div>

        <div class="button-submit">
          <button type="submit">Calcular</button>
        </div>

      </div>
    </form>
  </div>
</body>
</html>