<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	$cidade = $_POST['cep'];

	switch ($cidade) {
		case 'ati':
			$cep = '12940-000';
			break;
		case 'cai':
			$cep = '07801-000';
			break;
		case 'cjm':
			$cep = '07750-000';
			break;
		case 'frm':
			$cep = '07900-000';
			break;
		case 'frr':
			$cep = '07801-000';
			break;
		case 'jui':
			$cep = '13200-000';
			break;
		case 'vap':
			$cep = '13220-000';
			break;
		default:
			echo "Escolha uma cidade!";
			break;
	}

	if ($cidade == 'ati') {
		echo "Atibaia";
	}
	elseif ($cidade == 'cai') {
		echo "Caieiras";
	}
	elseif ($cidade == 'cjm') {
		echo "Cajamar";
	}
	elseif ($cidade == 'frm') {
		echo "Francisco Morato";
	}
	elseif ($cidade == 'frr') {
		echo "Franco da Rocha";
	}
	elseif ($cidade == 'jui') {
		echo "Jundiaí";
	}
	elseif ($cidade == 'vap') {
		echo "Várzea Paulista";
	}
	echo '<br>'.$cep.'<br>'; 
	?>
</body>
</html>