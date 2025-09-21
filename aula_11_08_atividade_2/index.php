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
			<td>Nome do Pagador </td>
			<td>
				<input type="text" name="nome">
			</td>
		</tr>
		<tr>
			<td>Valor da parcela </td>
			<td>
				<input type="text" name="parcela">
			</td>
		</tr>
		<tr>
			<td> data de vencimento)</td>
			<td>
				<input type="text" name="data">
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
	$nome = $_POST['nome'];

	$salario = $_POST['salario'];

	$horas = $_POST['horas'];

	$bruto = $salario*$horas;

	$inss = $bruto*0.11;
	
	$liqido = $bruto/$inss;

	 
	
	//exibir
	//echo $nome;
	echo 'Nome:'.$nome.'<br>';

	echo 'Sálario bruto é:'.$bruto.'<br>';

	echo 'Sálario liquido é:'.$liqido. '<br>';

	echo 'Desconto do INSS é:'.$inss.'<br>';


	?>
</form>
</body>
</html>