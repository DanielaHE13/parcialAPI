<?php
class Paper {
    private $id;
    private $estado;
    private $idTopic;
    private $idEdicion;

    public function __construct($id, $estado, $idTopic, $idEdicion) {
        $this->id = $id;
        $this->estado = $estado;
        $this->idTopic = $idTopic;
        $this->idEdicion = $idEdicion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getIdTopic() {
        return $this->idTopic;
    }

    public function getIdEdicion() {
        return $this->idEdicion;
    }
}
?>
