<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
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
                <a href=""><i class="fa-solid fa-house"></i></a><p>></p><a href="">Trámites</a><p>></p><a href="index.php">Consulta de recibo de luz</a><p>></p><p>Editar Registro</p>
            </div>
            <div class="m9">
                <div class="m8">
                    <h1>Editar Recibo de Luz</h1>
                    <br><br><br><br>
                    <?php
                        include('conexion.php');

                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            $id = $_GET['id'];
                            
                            $sql = "SELECT * FROM registros WHERE id = ?";
                            $stmt = $conexion->prepare($sql);
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $nombre_servicio = $row['nombre_servicio'];
                                $numero_servicio = $row['numero_servicio'];
                            } else {
                                echo "<p class='mensaje-error'>No se encontró el registro.</p>";
                                exit;
                            }
                        } else {
                            echo "<p class='mensaje-error'>ID inválido.</p>";
                            exit;
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['nombre_servicio']) && isset($_POST['numero_servicio'])) {
                                $nuevo_nombre_servicio = $conexion->real_escape_string($_POST['nombre_servicio']);
                                $nuevo_numero_servicio = $conexion->real_escape_string($_POST['numero_servicio']);

                                $sql_update = "UPDATE registros SET nombre_servicio = ?, numero_servicio = ? WHERE id = ?";
                                $stmt_update = $conexion->prepare($sql_update);
                                $stmt_update->bind_param("ssi", $nuevo_nombre_servicio, $nuevo_numero_servicio, $id);

                                if ($stmt_update->execute()) {
                                    echo "<p class='mensaje-exito'>Registro actualizado correctamente.</p>";
                                    echo "<script>setTimeout(() => window.location.href = 'ver.php', 2000);</script>";
                                } else {
                                    echo "<p class='mensaje-error'>Error al actualizar el registro.</p>";
                                }

                                $stmt_update->close();
                            } else {
                                echo "<p class='mensaje-error'>Por favor, completa todos los campos.</p>";
                            }
                        }
                    ?>
                    <form class="m10" method="POST" action="">
                        <label for="nombre_servicio">Nombre del servicio:</label>
                        <input type="text" id="nombre_servicio" name="nombre_servicio" value="<?php echo htmlspecialchars($nombre_servicio); ?>" required>
                
                        <label for="numero_servicio">Número de servicio:</label>
                        <input type="text" id="numero_servicio" name="numero_servicio" value="<?php echo htmlspecialchars($numero_servicio); ?>" required>
                        
                        <div>
                            <button class="btn2" type="submit">Guardar Cambios</button>
                            <br><br>
                            <a href="ver.php" class="btn2">Cancelar</a>
                        </div>
                    </form>
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
