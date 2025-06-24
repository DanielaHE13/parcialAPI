<?php
require_once 'Conexion.php';
require_once __DIR__ . '/../logica/Edicion.php';

class EdicionDAO {
    public static function obtenerEdiciones() {
        $conn = Conexion::conectar();
        $sql = "SELECT id, nombre FROM ediciones";
        $result = $conn->query($sql);

        $ediciones = [];
        while ($row = $result->fetch_assoc()) {
            $ediciones[] = new Edicion($row['id'], $row['nombre']);
        }

        $conn->close();
        return $ediciones;
    }
}
?>
