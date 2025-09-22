<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consumo de água em Evento</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <center>
    <h1>Consumo de água em Evento</h1>
    <h3>Calcule o consumo de água para um evento com base no número de pessoas, duração e clima.</h3>
    </center>
    <center>
    <form method="post">
        <label>Número de pessoas:</label>
        <input type="number" name="pessoas" required><br><br>

        <label>Duração do evento (em horas):</label>
        <input type="number" name="horas" required><br><br>

        <label id="cl">Clima do dia:</label>
        <select name="clima" required id="cli">
            <option value="frio">Frio (0,4 L/h)</option>
            <option value="ameno">Ameno (0,6 L/h)</option>
            <option value="quente">Quente (0,8 L/h)</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>
</center>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pessoas = (int) $_POST["pessoas"];
        $horas   = (int) $_POST["horas"];
        $clima   = $_POST["clima"];

        switch ($clima) {
            case "frio":
                $consumo = 0.4;
                break;
            case "ameno":
                $consumo = 0.6;
                break;
            case "quente":
                $consumo = 0.8;
                break;
            default:
                $consumo = 0;
        }

        $total = $pessoas * $horas * $consumo;

        echo "<h3>Resultado:</h3>";
        echo "Total de água necessário: <b>{$total} litros</b><br>";

        if ($total > 500) {
            echo "<p> ⚠ Atenção: Consumo elevado! Recomenda-se providenciar galões extras.</p>";
        }
    }
    ?>
    <br><br>
    <a href="index.php">Voltar à página inicial</a>

</body>
</html>