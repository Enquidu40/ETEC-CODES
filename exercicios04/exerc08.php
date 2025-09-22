<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reajuste de Aluguel</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
	<center>
        <h1>Exercício 08: Reajuste de Aluguel</h1>
        <h3>Calcule o novo valor do aluguel com base no reajuste anual.</h3>
    </center>

    <form method="post" action="">
        <label>Valor atual do aluguel (R$):</label>
        <input type="number" step="0.01" name="valor_atual" required>

        <label>Percentual de reajuste (%):</label>
        <select name="reajuste" required>
            <option value="0.7">IGP-M (+0,7%)</option>
            <option value="0.6">IPCA (+0,6%)</option>
            <option value="1.0">Personalizado (+1,0%)</option>
        </select>

        <input type="submit" value="Calcular Novo Aluguel">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor_atual = (float)$_POST['valor_atual'];
        $reajuste = (float)$_POST['reajuste'];

        $novo_valor = $valor_atual * (1 + $reajuste / 100);

        echo "<br><br>";
        echo "<h2>Novo valor do aluguel: R$ " . number_format($novo_valor, 2, ',', '.') . "</h2>"; 
    }
    ?>
<br><br>
    <a href="index.php">Voltar à página inicial</a>
</body>
</html>
