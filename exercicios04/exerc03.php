<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multa por Atraso na Biblioteca</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>  
   <center>
    <h1>Multa por Atraso na Biblioteca</h1>
    <h3>Calcule a multa por atraso na devolução de livros na biblioteca.</h3>
    </center>

    <center>
    <form method="post">
        <label>Dias de atraso:</label>
        <input type="number" name="dias" required><br><br>

        <label>Tipo de material:</label>
        <select name="material" required>
            <option value="livro">Livro (R$ 1,50/dia)</option>
            <option value="revista">Revista (R$ 1,00/dia)</option>
            <option value="dvd">DVD (R$ 2,50/dia)</option>
        <input type="submit" value="Calcular">
    </form>
</center>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dias = $_POST['dias'];
    $material = $_POST['material'];

    switch ($material) {
        case 'livro':
            $multa_por_dia = 1.50;
            break;
        case 'revista':
            $multa_por_dia = 1.00;
            break;
        case 'dvd':
            $multa_por_dia = 2.50;
            break;
        default:
            $multa_por_dia = 0;
            break;
    }
    $multa_total = $dias * $multa_por_dia;
    if ($dias<30){
        print"<br><br><h3>Resultado:</h3>";
        print"Dias de atraso: <b>{$dias}</b><br>"."Valor da multa: R$ {$multa_total}";
    }
    else if ($dias >= 30) {
        print"<br><br><h3>Resultado:</h3>";
        print"Usuário bloqueado, proibido de retirar novos materiais."."<br>"."Valor da multa: R$ {$multa_total}";
    }
 }
/*
receba qtd dias atraso emprestimo biblioteca
select tipo de material:
livro
revista
CD
mult=	
	1,50 livro
	1,00 revista
	2,50 dvd
mult=
	dias*material
print "mult"

atraso => 30 dias
	usuario empréstimo= bloqueado 
*/
?>
<br><br>
    <a href="index.php">Voltar à pagina inicial.</a>
 
</body>
</html>


