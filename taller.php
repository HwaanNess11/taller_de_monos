<!DOCTYPE html> <!-- Hecho por Dulce Ioánnis Villa Rosendo y Saúl Vega Navas -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller de Monos</title>
</head>
<body>
    <?php

        $texto = (isset($_POST["texto"]) && $_POST["texto"] != "") ? $_POST["texto"] : false;
        $modo =  (isset($_POST["modo"]) && $_POST["modo"] != "") ? $_POST["modo"] : false;
        $zona =  (isset($_POST["zona"]) && $_POST["zona"] != "") ? $_POST["zona"] : false;

    function libro(){
        for($i=1;$i<=10;$i++)
        {
            $carac = rand(48, 122);
            echo chr($carac);
        }
    }

    function modo($normal, $orden){
        
        $texto = (isset($_POST["texto"]) && $_POST["texto"] != "") ? $_POST["texto"] : "No hay texto";
        $des = explode(" ", $texto);   //$desorden
        $cont = count($des);      //$contador de palabras

        if($normal==false){
            do{
                $hey = false;
                for($i=0;$i<$cont;$i++){
                    $pal[$i] = rand(1,2100);       //$localizador de palabra
                }
                if($orden==true){
                    for($i=0; $i<$cont-1; $i++){
                        if($pal[$i]>$pal[$i+1] && $hey==false)
                            $hey = true;
                    }
                }
                if($hey==false){
                    for($i=0;$i<$cont;$i++){
                        for($i2=0; $i2<$cont; $i2++){
                            if($i!=$i2 && $pal[$i]==$pal[$i2]) //detecta que un localizador no coincida con otro
                                $hey = true;
                        }
                    }
                }
            }
            while($hey==true);

            for($i=1;$i<=2100;$i++){
                $carac = rand(65, 122);
                echo chr($carac);
                if($i%200 == 0)
                    echo "<br>";
                if($i%25 == 0)
                    echo " ";
                for($i2=0;$i2<$cont;$i2++){
                    if($i == $pal[$i2])
                        echo "<strong><font color=#0000ff>$des[$i2]</font></strong>";
                }
            }
        }

        else{
            $pos = rand(1,2100);
            for($i=1;$i<=2100;$i++){
                $carac = rand(65, 122);
                echo chr($carac);
                if($i%200 == 0)
                    echo "<br>";
                if($i%25 == 0)
                    echo " ";
                if($i == $pos){
                    echo "<strong><font color=#0000ff>$texto</font></strong>";
                    $i = $i + strlen($texto);
                }
            }
        }
    }

    $orden = false;
    if($modo=='normal')
        $normal = true;
    else{
        $normal = false;
        if($modo=='orden')
            $orden = true;
    }

    echo "<table border=1 cellpadding=15px align=center>
    <thead>
        <tr>
            <th><h3>Libro número: ", libro() ,"</h3></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align=center>", modo($normal, $orden), "</td>
        </tr>
    </tbody>
    </table><br>";

    if($zona == "México - CDMX")
        date_default_timezone_set('America/Mexico_City');
    if($zona == "Tailandia - Bangkok")
        date_default_timezone_set('Asia/Bangkok');
    if($zona == "Australia - Sydney")
        date_default_timezone_set('Australia/Sydney');
    if($zona == "Reino Unido - Londres")
        date_default_timezone_set('Europe/London');
    if($zona == "Egipto - Cairo")
        date_default_timezone_set('Africa/Cairo');

    $actual_date = date("d/m/Y h:i"); 
    echo "<strong> Fecha y hora de consulta: </strong>", $actual_date;
    echo "<br><strong>Lugar: </strong>", $zona;
    echo "<br><br><strong>Fecha de creación del libro: </strong>", date("d/m/Y", rand(0, 10**9));

    ?>
</body>
</html>