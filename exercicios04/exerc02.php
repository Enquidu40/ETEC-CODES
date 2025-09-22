<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estimativa de Tinta para Parede</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
    <center>
    <h1>Estimativa de Tinta para Parede</h1>
    <h3>Calcule a quantidade de tinta necessária para pintar uma parede com base na área e no rendimento da tinta.</h3>
    </center>
    <center>
    <form method="post">
        <label>Largura da parede (em m²):</label>
        <input type="number" name="largura" required><br><br>

        <label>Altura da parede (em m²):</label>
        <input type="number" name="altura" required><br><br>

        <label>Tipo de tinta:</label>
        <select name="tinta" required>
            <option value="simples">Tinta premium (12m²/L)</option>
            <option value="premium">Tinta simples (8m²/L)</option>
        </select>
        
        <input type="submit" value="Calcular">
    </form>
</center>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $largura = (float) $_POST["largura"];
    $altura  = (float) $_POST["altura"];
    $tinta   = $_POST["tinta"];

    $area = $largura * $altura;

    if ($tinta == "simples") {
        $tinta_necessaria = $area / 8;
    } else if ($tinta == "premium") {
        $tinta_necessaria = $area / 12;
    }

    echo "<br><br><h3>Resultado:</h3>";
    echo "Área da parede: <b>{$area} m²</b><br>";
    echo "Você precisará de <b>{$tinta_necessaria}</b> litros de tinta.";

    if ($tinta_necessaria > 18) {
        $latas = ceil($tinta_necessaria / 18);
        echo "<br>Você precisará de <b>{$latas}</b> lata(s) de 18 litros.";
    }
}

/*
Receba largura e altura da parede em metros
Escolha select do tipo de tinta
<simples>
<premium>
Simples= 8m²/L
Premium= 12m²/L

if simples{
	area= alt*larg
	resul1= area/8
}
else premium
	area= alt*larg
	resul1= area/12

if resul>18{
	resul1/18= {x} tintas simples
	resul2/18= {x} tintas premium
}
*/
?>
    <br>
    <br>

    <a href="index.php">Voltar à pagina inicial.</a>
    
</body>
</html>

