<?php
// Mensajes
if (isset($_GET["insertado"])) {
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        ✅ Coche con matrícula <strong>{$_GET['insertado']}</strong> insertado correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
    </div>";
}

if (isset($_GET["editado"])) {
    echo "
    <div class='alert alert-info alert-dismissible fade show' role='alert'>
        ✏️ Coche con matrícula <strong>{$_GET['editado']}</strong> editado correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
    </div>";
}

if (isset($_GET["eliminado"])) {
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        ✅ Coche con matrícula <strong>{$_GET['eliminado']}</strong> eliminado correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
    </div>";
}

if (isset($_GET["error"]) && $_GET["error"] == "matricula_duplicada") {
    echo "
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        ❌ Error: Ya existe un coche con esa matrícula.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Cerrar'></button>
    </div>";
}


//Visualización del Index
$xml = new DOMDocument;
$xml->load("../xml/coches.xml");

$xsl = new DOMDocument;
$xsl->load("../xml/coches.xsl");

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);

echo <<<HTML
<!-- jQuery y DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Inicialización -->
<script>
  $(document).ready(function() {
    $('#tabla-coches').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
      }
    });
  });
</script>
HTML;


?>

