<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Custo de Viagem por Combustível</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
    <center>
    <h1>Custo de Viagem por Combustível</h1>
    <h3>Calcule o custo total de uma viagem com base na distância, consumo do veículo e preço do combustível.</h3>
    </center>
    <center>
    <form method="post">
        <label>Distância da viagem (em km):</label>
        <input type="number" name="distancia" required><br><br>

        <label>Tipo de veículo utilizado:</label>
        <select name="veiculo" required>
            <option value="Econômico">Econômico</option>
            <option value="Intermediário">Intermediário</option>
            <option value="SUV">SUV</option>
        </select><br><br>

        <input type="submit" value="Calcular">
        </form>
    </center>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distancia = (float) $_POST["distancia"];
    $veiculo = $_POST["veiculo"];
    $gas = 6;

    switch ($veiculo){
        case 'Econômico':
            $consumo = 14;
            break;
        case 'Intermediário':
            $consumo = 10;
        case 'SUV':
            $consumo = 8;
            break;
        default:
            $consumo = 0;
    }

    $litros_necessarios = $distancia / $consumo;

    $custo_total = $litros_necessarios * $gas;

    echo "<br><br><h3>Resultado:</h3>";
    echo "Distância da viagem: <b>{$distancia} km</b><br>";
    echo "Tipo de veículo: <b>{$veiculo}</b><br>";
    echo "Custo total da viagem: R$ <b>" . number_format($custo_total, 2, ',', '.') . "</b>";
 }
?>

<br><br>
    <a href="index.php">Voltar à pagina inicial.</a>
</body>
</html>