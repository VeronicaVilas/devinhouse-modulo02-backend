<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lanchonete</title>
  <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  <div class="container">
    <div class="left-container">
      <h1>Lanchonete</h1>
    </div>

    <div class="right-container">

      <div class="form-header">
        <h1>Resultado</h1>
      </div>
      
      <div>
        <?php
          $codigo = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
          $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

          if(!$codigo || !$quantidade) {
              echo "Não entendemos o seu pedido! Por favor, preencha os dados corretamente para realizar o pedido.";
              exit;
          } else {
            switch($codigo) {
              case 101: {
                $total = number_format($quantidade * 15, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade hambúrguer(es), o total do sue pedido é de R$ $total.";
                break;
              }
              case 102: {
                $total = number_format($quantidade * 8, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade batata(s) frita(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 103: {
                $total = number_format($quantidade * 12, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade salada(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 104: {
                $total = number_format($quantidade * 20, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade pizza(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 105: {
                $total = number_format($quantidade * 25, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade sushi(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 106: {
                $total = number_format($quantidade * 7, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade sorvete(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 107: {
                $total = number_format($quantidade * 5, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade donut(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 108: {
                $total = number_format($quantidade * 6, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade suco(s), o total do sue pedido é de R$ $total.";
                break;
              }
              case 109: {
                $total = number_format($quantidade * 10, 2, ",", ".");
                echo "Obrigado pelo pedido! Você pediu $quantidade bolo(s), o total do sue pedido é de R$ $total.";
                break;
              }
              default: {
                echo "Código não localizado";
                break;
              }
            }
          }
        ?>

        <div class="button-again">
          <button><a href="./lanchonete.php">Pedir Novamente</a></button>
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>