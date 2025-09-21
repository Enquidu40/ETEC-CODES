<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ex1 - Intervalo (for e while)</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Ex1 - Números entre dois valores. </h1>
    <center>
	<form method= "post">
        <label> Primeiro número (menor): </label>
        <br> <input type="number" name="txTa" required> <br><br>

        <label> Segundo número (maior): </label>
        <br> <input type="number" name="txTb" required> <br><br>
        
        <input type="submit" value="mostrar"> Mostrar </button>
    </form>
</center>
<center>
        <?php

        if $_SERVER['REQUEST_METHOD'] == 'POST'{
            
        $a = $_POST['txtA'];
        $b = $_POST['txtB'];

        if ($a = null || $b == null){
            echo "<p> Valores inválidos.</p>";
        }
        if ($a < $b){
            echo "<h3> Usando FOR </h3>"
            for ($i = $a; $i <= $b; $i++){
                echo $i . " ";
            }
            echo "<h3> Usando while </h3>";
            $i = $a;
            while ($i <= $b) {
                echo $i . " ";
                $i++;
            }
        }
        else{
            echo "<p style='color:red'> Erro: o primeiro número deve ser MENOR que o segundo. </p>";
        }
    }
        ?>
</center>
</body>
</html>