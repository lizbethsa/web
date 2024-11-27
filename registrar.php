<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta tu recibo de la luz</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/circulo.png" type="image/x-icon">


</head>
<body>
    <header>
        <div class="he1">
            <nav>
                <div>
                    <img class="he2" src="imgs/logo_blanco.svg" alt="Aqui va el logo">
                </div>
                <div>
                    <div class="he3">
                        <ul>
                            <li><a href="">Trámites</a></li>
                            <li><a href="">Gobierno</a></li>
                            <li><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="m7">
            <div class="m2">
                <a href=""><i class="fa-solid fa-house"></i></a><p>></p><a href="">Trámites</a><p>></p><a href="index.php">Consulta de recibo de luz</a><p>></p><p>Registro</p>
            </div>
            <div class="m9">
                <div class="m8">
                    <h1>Registra tu recibo de luz</h1>
                    <br><br><br><br>
                    <form class="m10" method="POST" action="">
                        <label for="nombre_servicio">Nombre del servicio:</label>
                        <input type="text" id="nombre_servicio" name="nombre_servicio" placeholder="Ejemplo: Luz" required>
                
                        <label for="numero_servicio">Número de servicio:</label>
                        <input type="text" id="numero_servicio" name="numero_servicio" placeholder="Ejemplo: 123456789" required>
                        <div>
                            <button class="btn2" type="submit">Guardar Registro</button>
                            <br> <br>
                            <p class="texto-pequeño">¿Ya estas registrado?<br><a href="ver.php" class="link texto-pequeño">CONSULTALO</a></p>
                        </div>
                        
                    </form>

                    <?php
                        include('conexion.php');

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['nombre_servicio']) && isset($_POST['numero_servicio'])) {
                                $nombre_servicio = $conexion->real_escape_string($_POST['nombre_servicio']);
                                $numero_servicio = $conexion->real_escape_string($_POST['numero_servicio']);

                                $sql_check = "SELECT * FROM registros WHERE nombre_servicio = '$nombre_servicio' OR numero_servicio = '$numero_servicio'";
                                $result_check = $conexion->query($sql_check);

                                if ($result_check->num_rows > 0) {
                                    echo "<p class='mensaje-error'>El nombre o el número de servicio ya existe.</p>";
                                } else {
                                    // Insertar datos
                                    $sql = "INSERT INTO registros (nombre_servicio, numero_servicio) VALUES ('$nombre_servicio', '$numero_servicio')";

                                    if ($conexion->query($sql) === TRUE) {
                                        echo "<p class='mensaje-exito'>Se ha registrado con éxito.</p>";
                                    } else {
                                        echo "<p class='mensaje-error' >Error: " . $sql . "<br>" . $conexion->error . "</p>";
                                    }
                                }
                            } else {
                                echo "<p class='mensaje-error'>Hay espacios sin rellenar. Por favor, completa todos los campos.</p>";
                            }
                        }


                        $conexion->close();
                    ?>

                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="fo1">
            <div class="fo2">
                <div>
                    <img src="imgs/logo_blanco.svg" alt="Aqui va el logo">
                </div>
                <div class="fo3">
                    <div>
                        <h2>Enlaces</h2>     
                    </div>
                    <div>
                        <ul>
                            <li><a href="">Participa</a></li>
                            <li><a href="">Publicaciones Oficiales</a></li>
                            <li><a href="">Marco Jurídico</a></li>
                            <li><a href="">Plataforma Nacional de Transparencia</a></li>
                            <li><a href="">Alerta</a></li>
                            <li><a href="">Denuncia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="fo3">
                    <div>
                        <h2>¿Qué es gob.mx?</h2>
                    </div>
                    <div>
                        <p>Es el portal único de trámites, información y participación ciudadana. <a href="">Leer más</a></p>
                    </div>
                </div>
                <div class="fo3">
                    <div>
                        <a href="">Denuncia contra servidores públicos</a>
                    </div>
                    <div>
                        <h2>Síguenos en</h2>
                        <br>
                        <div class="fo4">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>