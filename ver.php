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
        <div class="m11">
            <div class="m13">
                <div class="m2">
                    <a href=""><i class="fa-solid fa-house"></i></a><p>></p><a href="">Trámites</a><p>></p><a href="index.php">Consulta de recibo de luz</a><p>></p><p>Ver registros</p>
                </div>
                <div class="m12">
                    <div>
                        <table class="m12" border="1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Servicio</th>
                                    <th>Número del Servicio</th>
                                    <th>Fecha de Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('conexion.php'); 

                                    $sql = "SELECT id, nombre_servicio, numero_servicio, fecha_registro FROM registros";
                                    $result = $conexion->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['nombre_servicio'] . "</td>";
                                            echo "<td>" . $row['numero_servicio'] . "</td>";
                                            echo "<td>" . $row['fecha_registro'] . "</td>";
                                            echo "<td>";
                                            echo "<a href='editar.php?id=" . $row['id'] . "' class='btn-editar'><i class='fa-solid fa-pen-to-square btn-editar'></i></a>";
                                            echo "<a href='eliminar.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");' class='btn-eliminar'><i class='fa-solid fa-trash-can btn-eliminar'></i></a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' style='text-align: center;'>No hay registros.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="text-align:center;">
                <p class="texto-pequeño">¿No aparece tu registro?<br><a href="registrar.php" class="link texto-pequeño">REGISTRATE</a></p>
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