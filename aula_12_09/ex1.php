<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Copa do Mundo de Futebol Feminino</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <center>
	<form action="" method= "post">
        <select name="slAno">
            <option value="1991"> 1991</option> 
            <option value="1995"> 1995</option> 
            <option value="1999"> 1999</option> 
            <option value="2003"> 2003</option> 
            <option value="2007"> 2007</option> 
            <option value="2011"> 2011</option> 
            <option value="2015"> 2015</option> 
            <option value="2019"> 2019</option> 
            <option value="2023"> 2023</option> 
            <option value="2027"> 2027</option> 
        </select>
        <br>
        <input type="submit" value="Verificar" name="btnVer">
    </form>
</center>
<center>
        <?php

            $Op = $_POST['slAno'];
            
            switch ($Op) {
                case '1991':
                    echo"China<br>";
                    echo"<img src= 'flags/china.png'";
                    break;
                case '1995':
                    echo"Suécia<br>";
                    echo"<img src= 'flags/suecia.png'";
                    break;
                case '1999':
                    echo"EUA<br>";
                    echo"<img src=' flags/usa.png'";
                    break;
                case '2003':
                    echo"EUA<br>";
                    echo"<img src=' flags/usa.png'";
                    break;
                case '2007':
                    echo"China<br>";
                    echo"<img src= 'flags/china.png'";
                    break;
                case '2011':
                    echo"Alemanha<br>";
                    echo"<img src= 'flags/ger.png'";
                    break;
                case '2015':
                    echo"Canadá<br>";
                    echo"<img src= 'flags/canada.png'";

                    break;
                case '2019':
                    echo"França<br>";
                    echo"<img src= 'flags/franca.png'";

                    break;
                case '2023':
                    echo"Austrália e Nova Zelândia<br>";
                    echo"<img src= 'flags/aus_nz.png'";

                    break;
                case '2027':
                    echo"Brasil<br>";
                    echo"<img src= 'flags/brasil.png'";
                    break;

                default:
                    echo"Selecione um ano na lista";
                    break;
                
            }
        ?>
</center>
<bottom>
<li><a href="Index.php">Voltar </a> </li>    
</bottom>
</body>
</html>