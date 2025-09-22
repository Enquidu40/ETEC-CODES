<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tarifa de Telefonia por Plano</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
    <center>
    <h1>Tarifa de Telefonia por Plano</h1>
    <h3>Calcule a tarifa de telefonia com base no plano escolhido e na duração da chamada.</h3>
    </center>
    <center>
    <form method="post">
        <label>Minutos consumidos no mês:</label>
        <input type="number" name="minutos" required><br><br>

        <label>Plano escolhido:</label>
        <select name="plano" required>
            <option value="Básico">Básico R$ 29,90(100min mensal)</option>
            <option value="Plus">Plus R$ 49,90(200min mensal)</option>
            <option value="Pro">Pro R$ 79,90(500min mensal)</option>
        </select><br><br>
        <input type="submit" value="Calcular">
    </form>
</center>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minutos = (int) $_POST["minutos"];
    $plano = $_POST["plano"];

    switch ($plano) {
        case 'Básico':
            $custo_fixo = 29.90;
            $minutos_inclusos = 100;
            $custo_excedente = 0.50;
            break;
        case 'Plus':
            $custo_fixo = 49.90;
            $minutos_inclusos = 200;
            $custo_excedente = 0.30;
            break;
        case 'Pro':
            $custo_fixo = 79.90;
            $minutos_inclusos = 500;
            $custo_excedente = 0.10;
            break;
        default:
            $custo_fixo = 0;
            $minutos_inclusos = 0;
            $custo_excedente = 0;
            break;
    }

    if ($minutos > $minutos_inclusos) {
        $minutos_excedentes = $minutos - $minutos_inclusos;
        $custo_total = $custo_fixo + ($minutos_excedentes * $custo_excedente);
    } else {
        $custo_total = $custo_fixo;
    }

    echo "<br><br><h3>Resultado:</h3>";
    echo "Plano escolhido: <b>{$plano}</b><br>";
    echo "Minutos consumidos: <b>{$minutos}</b><br>";
    echo "Custo total do mês: <b>R$ {$custo_total}</b><br>";
 }
/*
Receba total de minutos em um mês
<select>
Básico= 100min; >100= + 0,50/min; R$ 29,90
Plus= 200min; >200= + 0,35/min; R$ 49,90
Pro= 500MIN; >500= +0,20/min; R$ 79,90

Cálculo:

Exiba fatura da franquia+min excedentes
*/
 ?>
<br><br>
    <a href="index.php">Voltar à pagina inicial.</a>
</body>
</html>