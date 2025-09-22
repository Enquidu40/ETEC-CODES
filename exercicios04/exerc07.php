<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Preço de Ingressos com Desconto</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
	<center>
		<h1>Exercício 07: Preço de Ingressos com Desconto</h1>
	</center>
	<form method="post" action="">
		<label>Número de Ingressos:</label>
		<input type="number" name="num_ingressos" required>

		<label> Tipo de ingresso: </label>
		<select name="tipo_ingresso" required>
			<option value="inteira">Inteira (R$ 40,00)</option>
			<option value="meia">Meia-entrada (R$ 20,00)</option>
			<option value="estudante">Estudante (R$ 25,00)</option>
		</select>
		<br><br>
		<input type="submit" value="Calcular Preço Total">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$tipo_ingressos = (int)$_POST['num_ingressos'];
		$preco_unitario = 0;
		$desconto = 0;

		switch ($_POST['tipo_ingresso']) {
			case 'inteira':
				$preco_unitario = 40.00;
				break;
			case 'meia':
				$preco_unitario = 20.00;
				break;
			case 'estudante':
				$preco_unitario = 25.00;
				break;
		}
		if ($tipo_ingressos >= 5) {
			$desconto = 0.10; 
		}
		echo"<br>";
		echo"<br>";
		$preco_total = $tipo_ingressos * $preco_unitario * (1 - $desconto);
		echo "<h2>Preço Total: R$ " . number_format($preco_total, 2, ',', '.') . "</h2>";
	}
	?>
<br><br>
    <a href="index.php">Voltar à pagina inicial.</a>
</body>
</html>