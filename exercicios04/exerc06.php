<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salário com Adicional Noturno</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
    <center>
    <h1>Salário com Adicional Noturno</h1>
    <h3>Calcule o salário total de um funcionário considerando horas trabalhadas, valor da hora e adicional noturno.</h3>
    </center>
    <center>
    <form method="post">
        <label>Informe o valor do salário:</label>
        <input type="number" name="salario" required><br><br>

        <label>Informe o turno de trabalho:</label>
        <select name="turno" required>
            <option value="Diurno">Diurno</option>
            <option value="Noturno">Noturno</option>
        </select><br><br>

        <input type="submit" value="Calcular">
        </form>
    </center>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $salario = (float) $_POST["salario"];
        $turno = $_POST["turno"];
        $adicional_noturno = 0;

        if ($turno == "Noturno") {
            $adicional_noturno = $salario * 0.20;
        }

        $salario_total = $salario + $adicional_noturno;

        echo "<br><br><h3>Resultado:</h3>";
        echo "Turno de trabalho: <h2> <b>{$turno}</h2> </b><br> ";
        echo "Salário base: R$ <b>" . number_format($salario, 2, ',', '.') . "</b><br>";
        echo "Salário total: R$ <b>" . number_format($salario_total, 2, ',', '.') . "</b>";
    }
?>
<br><br>
    <a href="index.php">Voltar à pagina inicial.</a>
</body>
</html>