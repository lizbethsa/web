<?php
include('conexion.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; 

    $sql = "DELETE FROM registros WHERE id = ?";

    if ($stmt = $conexion->prepare($sql)) {

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Registro eliminado correctamente.');</script>";
            echo "<script>window.location.href = 'ver_registros.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar el registro.');</script>";
            echo "<script>window.location.href = 'ver_registros.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error en la consulta de eliminación.');</script>";
        echo "<script>window.location.href = 'ver_registros.php';</script>";
    }
} else {
    echo "<script>alert('ID de registro inválido.');</script>";
    echo "<script>window.location.href = 'ver_registros.php';</script>";
}

$conexion->close();
?>
