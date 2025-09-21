
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST">
	<table>
		<tr>
			<td>Valor 1 </td>
			<td>
				<input type="text" name="valor1">
			</td>
		</tr>
		<tr>
			<td> Valor 2 </td>
			<td>
				<input type="text" name="valor2">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Calcular">
			</td>
		</tr>
	</table>
	<?php
	//recebe do html
	$n1 = $_POST['valor1'];

	$n2 = $_POST['valor2'];

	$soma = $n1+$n2;
	$menos = $n1-$n2;
	$div = $n1/$n2;
	$mult = $n1*$n2;
	//exibir
	//echo $nome;

	echo 'Primeiro:'.$n1.'<br>';

	echo 'Segundo:'.$n2. '<br>';

	echo 'Resultado da soma é:'.$soma.'<br>';

	echo 'Resultado da subtração é:'.$menos.'<br>';

	echo 'Resultado da divisão é:'.$div.'<br>';

	echo 'Resultado da multiplicação é:'.$mult.'<br>';

	?>
</form>
</body>
</html>