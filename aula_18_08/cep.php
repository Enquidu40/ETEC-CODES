<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BuscaCEP</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<form action="rcep.php" method="POST">
		Busque a cidade para encontrar o CEP:
		<select name="cep">
			<option value="">&nbsp</option>
			<option value="ati">Atibaia</option>
			<option value="cai">Caieiras</option>
			<option value="cjm">Cajamar</option>
			<option value="frm">Francisco Morato</option>
			<option value="frr">Franco da Rocha</option>
			<option value="jui">Jundiaí</option>
			<option value="vap">Várzea Paulista</option>	
		</select>
		<input type="submit" name="Buscar">
	</form>
	
</body>
</html>