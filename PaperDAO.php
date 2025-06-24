<?php
require_once 'Conexion.php';

class PaperDAO {
    public static function contarPorEstado($idEdicion) {
        $conn = Conexion::conectar();
        $sql = "SELECT estado, COUNT(*) as cantidad 
                FROM papers 
                WHERE id_edicion = ? 
                GROUP BY estado";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idEdicion);
        $stmt->execute();
        $result = $stmt->get_result();

        $datos = [];
        while ($row = $result->fetch_assoc()) {
            $datos[$row['estado']] = $row['cantidad'];
        }

        $conn->close();
        return $datos;
    }

    public static function contarPorTopicYEstado($idEdicion) {
        $conn = Conexion::conectar();
        $sql = "SELECT t.nombre AS topic, p.estado, COUNT(*) as cantidad
                FROM papers p
                JOIN topics t ON p.id_topic = t.id
                WHERE p.id_edicion = ?
                GROUP BY t.nombre, p.estado";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idEdicion);
        $stmt->execute();
        $result = $stmt->get_result();

        $datos = [];
        while ($row = $result->fetch_assoc()) {
            $topic = $row['topic'];
            $estado = $row['estado'];
            $cantidad = $row['cantidad'];

            if (!isset($datos[$topic])) {
                $datos[$topic] = ['accepted' => 0, 'rejected' => 0];
            }

            $datos[$topic][$estado] = $cantidad;
        }

        $conn->close();
        return $datos;
    }
}
?>
