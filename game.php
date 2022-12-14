<?php
    if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
        $usuario = isset($_POST['username']) ? $_POST['username'] : 'usuario';
        $palabra = $_POST['plgam'];
        $jugador = array('usuario' => $usuario, 'palabra' => $palabra);
        $json_string = json_encode($jugador);
        $file = 'games.json';
        file_put_contents($file, $json_string);
    }
    // ---------------- Letras ------------------\\
    // $archivoJson = 'games2.json';
    // if (file_exists($archivoJson)) {
    //     $let = $_POST['key'];
    //     array_push($letras, $let);
    //     $json_data = json_encode($letras);
    //     $file2 = 'games2.json';
    //     file_put_contents($file2, $json_data);
    // } else {
    //     $let = isset($_POST['key']) ? $_POST['key'] : null;
    //     $letras = array($let);
    //     $json_data = json_encode($letras);
    //     $file2 = 'games2.json';
    //     file_put_contents($file2, $json_data);
    // }

    //------------ Ver Plabra-----------
    $datos = file_get_contents("games.json");
    $json_jugador = json_decode($datos, true);
    $palabraJuego = $json_jugador['palabra'];
?>



<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>El Ahorcado</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <style>
    #letraInp {
        max-width: 30px;
        font-family: inherit;
        border: 0;
        border-bottom: 2px solid grey;
        outline: 0;
        font-size: 1.3rem;
        color: white;
        padding: 7px 0;
        background: transparent;
        border-radius: 0px;
    }
    </style>
    <body>
        <header>
            <div class="container text-center mt-2">
                <img src="https://raw.githubusercontent.com/JimyCalvo/RecursoosPHP/main/ezgif.com-gif-maker.gif" alt="El Ahorcado" srcset="" width="60%">
            </div>
            <hr>
        </header>
        <main class="container">
            <!-- ========== Start Vista Leta ========== -->
            <section class="container p-2s m-5">
                <div class="container bg-dark">
                    <div class="input-group justify-content-center m-3">
                    <?php
                        $numLetras=mb_strlen($palabraJuego);
                        $intentos=6;
                        $a = array('á', 'é', 'í', 'ó', 'ú');
                        $b = array('A', 'E', 'I', 'O', 'U');
                        $gamePalabra = strtoupper(str_replace($a, $b, $palabraJuego));
                        
                        if($intentos!=0){
                            for ($i = 0; $i <$numLetras; $i++) {
                                echo "<input class='form-control m-3 text-center' type='text' maxlength='1' name='valor$i' id='letraInp' disabled>";
                            }
                        }
                    ?>
                    </div>
                </div>
            </section>
            <!-- ========== End Vista Letra ========== -->
            

        </main>
        <footer>

        </footer>
    </body>

</html>