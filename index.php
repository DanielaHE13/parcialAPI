<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas ICAI</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body>
    <h1>Estadísticas de Papers - Conferencia ICAI</h1>

    <label for="selectEdicion">Selecciona una edición:</label>
    <select id="selectEdicion">
        <option value="">-- Seleccione --</option>
        <?php
        require_once 'persistencia/EdicionDAO.php';
        $ediciones = EdicionDAO::obtenerEdiciones();
        foreach ($ediciones as $edicion) {
            echo "<option value='{$edicion->getId()}'>{$edicion->getNombre()}</option>";
        }
        ?>
    </select>

    <h2>Resumen de Papers Aceptados y Rechazados</h2>
    <table border="1" id="tablaResumen">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>

    <h2>Papers por Topic</h2>
    <table border="1" id="tablaTopics">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Aceptados</th>
                <th>Rechazados</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</body>
</html>
