<?php
class Topic {
    private $id;
    private $nombre;

    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }
}
?>
