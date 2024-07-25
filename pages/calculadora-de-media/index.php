<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Média</title>
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
        $nota1 = isset($_POST['nota1']) ? filter_var($_POST['nota1'], FILTER_VALIDATE_FLOAT) : null;
        $nota2 = isset($_POST['nota2']) ? filter_var($_POST['nota2'], FILTER_VALIDATE_FLOAT) : null;
        $nota3 = isset($_POST['nota3']) ? filter_var($_POST['nota3'], FILTER_VALIDATE_FLOAT) : null;
        $nota4 = isset($_POST['nota4']) ? filter_var($_POST['nota4'], FILTER_VALIDATE_FLOAT) : null;
        $media = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if(!$nota1 || !$nota2 || !$nota3 || !$nota4 ) {
                echo "É necessário inserir as notas!";
                exit;
            } else {
                $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
            }
        }
    ?>
    <div class="container">
        <div class="left-container">
            <h1>Calculadora de média</h1>
        </div>
        <section class="right-container" id="form-section" style="<?php echo ($media !== null) ? 'display: none;' : 'display: block;'; ?>">
            <form id="calcForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="form-header">
                    <h1>Insira suas notas!</h1>
                </div>
                <div class="input-group">
                    <label for="nota1">Nota 1:</label>
                    <input type="number" name="nota1" id="nota1" step="any" required />
                    <label for="nota2">Nota 2:</label>
                    <input type="number" name="nota2" id="nota2" step="any" required />
                    <label for="nota3">Nota 3:</label>
                    <input type="number" name="nota3" id="nota3" step="any" required />
                    <label for="nota4">Nota 4:</label>
                    <input type="number" name="nota4" id="nota4" step="any" required />
                    <div class="button-submit">
                        <button type="submit">Calcular</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="right-container" id="resultado-section" style="<?php echo ($media !== null) ? 'display: block;' : 'display: none;'; ?>">
            <div class="form-header">
                <h1>Resultado</h1>
            </div>
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
                <button type="button" onclick="javascript:document.getElementById('form-section').style.display = 'block'; document.getElementById('resultado-section').style.display = 'none';">Calcular Novamente</button>
            </div>
        </section>
    </div>
</body>
</html>