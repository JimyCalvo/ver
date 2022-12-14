<?php
include 'listaPalabras.php';
$max=count($palabras);
$valor=rand(0, $max);
$palabra=$palabras[$valor];
echo 'La palabra es: '.$palabra.' el tamaño es de: '.mb_strlen($palabra);
echo "<br>";
$a = array('á','é','í','ó','ú');
$b = array('Á','É','Í','Ó','Ú');
$palabraJuego=strtoupper(str_replace($a,$b,$palabra));
echo ">>>>>>>>".$palabraJuego;
echo "<br>";
for($i=0;$i<mb_strlen($palabraJuego);$i++)
{
    echo "<input type='text' maxlength='1' name='valor$i'>";
}
echo "<br>";
$letra="a";
$str = "motana";
$stra="MOTANA";
for($j=0;$j<mb_strlen($str);$j++){
    if($str[$j]===$letra){
        echo "<input type='text' maxlength='1' name='valor$j' value='$stra[$j]'>";
    }
    else{
        echo "<input type='text' maxlength='1' name='valor$j'>";
    }
    
}



?>