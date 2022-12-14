<?php
if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
    $usuario = isset($_POST['username']) ? $_POST['username'] : 'usuario';
    $palabra = $_POST['plgam'];
    $jugador = array('usuario' => $usuario, 'palabra' => $palabra);
    $json_string = json_encode($jugador);
    $file = 'games.json';
    file_put_contents($file, $json_string);
}
$archivoJson = 'games2.json';
if (file_exists($archivoJson)) {
    $let = $_POST['key'];
    array_push($letras, $let);
    $json_data = json_encode($letras);
    $file2 = 'games2.json';
    file_put_contents($file2, $json_data);
} else {
    $let = isset($_POST['key']) ? $_POST['key'] : null;
    $letras = array($let);
    $json_data = json_encode($letras);
    $file2 = 'games2.json';
    file_put_contents($file2, $json_data);
}

?>
<!DOCTYPE html>
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
            <img src="https://raw.githubusercontent.com/JimyCalvo/RecursoosPHP/main/ezgif.com-gif-maker.gif" alt="El Ahorcado" srcset="" width="50%">
        </div>
        <hr>
    </header>
    <main>
        <?php
        $datos = file_get_contents("games.json");
        $json_jugador = json_decode($datos, true);
        $palabraJuego = $json_jugador['palabra'];
        ?>
        <!-- ========== Start Animation ========== -->

        <!-- ========== End Animation ========== -->
        <!-- ========== Start Palabra ========== -->
        <section>
            <div class="container m-5 p-2">
                <?php
                // echo "<div class='text-center'><h1>$palabraJuego</h1></div><br>";
                ?>
                <div class=" input-group justify-content-center bg-dark p-2 m-5">
                    <?php

                    $a = array('á', 'é', 'í', 'ó', 'ú');
                    $b = array('A', 'E', 'I', 'O', 'U');
                    $palabra = strtoupper(str_replace($a, $b, $palabraJuego));
                    $letra = isset($_POST['key']) ? $_POST['Key'] : null;
                    $pos = strrpos($palabra, $letra);

                    if ($letra === '') {
                        for ($i = 0; $i < mb_strlen($palabra); $i++) {
                            echo "<input class='form-control m-1 text-center' type='text' maxlength='1' name='valor$i' id='letraInp' disabled>";
                        }
                    } else {
                        // echo "<br><h1 class='text-light'>hay algo $letra</h1>";
                        if ($pos != '') {
                            for ($i = 0; $i < mb_strlen($palabra); $i++) {
                                if ($palabra[$i] == $letra) {
                                    echo "<input class='form-control m-1 text-center' type='text' maxlength='1' name='valor$i' value='$letra' id='letraInp' disabled>";
                                } else {
                                    echo "<input class='form-control m-1 text-center' type='text' maxlength='1' name='valor$i' id='letraInp' disabled>";
                                }
                            }
                        } else {
                            echo "<br><h1 class='text-light'>$pos  AQUITA No hay algo $letra</h1>";
                        }
                    }

                    ?>
                </div>
            </div>
        </section>
        <!-- ========== End Palabra ========== -->
        <!-- ========== Start Teclado ========== -->
        <section>
            <div class="container ">
                <form method="POST" action="juego.php">
                    <div class="row justify-content-center">
                        <?php
                        $alfabeto = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'z');
                        if ($letra == null) {
                            foreach ($alfabeto as $key => $values) {
                                echo "<div class='col-2 col-sm-1 m-1'><input type='submit' style='width: 40px !important;' class='btn btn-outline-dark' value='$values' name='key'></div>";
                            }
                        }

                        //>---------------- Archivar Letras -------------------<
                        $archivoJson = 'games2.json';
                        if (file_exists($archivoJson)) {
                            $let = $_POST['key'];
                            array_push($letras, $let);
                            $json_data = json_encode($letras);
                            $file2 = 'games2.json';
                            file_put_contents($file2, $json_data);
                        } else {
                            $let = isset($_POST['key']) ? $_POST['Key'] : null;
                            $letras = array($let);
                            $json_data = json_encode($letras);
                            $file2 = 'games2.json';
                            file_put_contents($file2, $json_data);
                        }

                        ?>
                    </div>
                </form>
            </div>
        </section>
        <!-- ========== End Teclado ========== -->
        <footer>
            <div class="contaier- fluid text-center bg-dark text-light p-3 m-2">
                <h6>Realizado por: <a href="https://github.com/JimyCalvo">Jimy Calvo M.</a></h6>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>