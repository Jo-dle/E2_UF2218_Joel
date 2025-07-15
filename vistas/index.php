<?php
// Mensajes
if (isset($_GET["insertado"])) {
    echo "<div class='alert alert-success'>✅ Coche con matrícula <strong>{$_GET['insertado']}</strong> insertado correctamente.</div>";
}
if (isset($_GET["editado"])) {
    echo "<div class='alert alert-info'>✏️ Coche con matrícula <strong>{$_GET['editado']}</strong> editado correctamente.</div>";
}

if (isset($_GET["eliminado"])) {
    echo "<div class='alert alert-success'>✅ Coche con matrícula <strong>{$_GET['eliminado']}</strong> eliminado correctamente.</div>";
}
if (isset($_GET["error"]) && $_GET["error"] == "matricula_duplicada") {
    echo "<div class='alert alert-danger'>❌ Error: Ya existe un coche con esa matrícula.</div>";
}

//Visualización del Index
$xml = new DOMDocument;
$xml->load("../xml/coches.xml");

$xsl = new DOMDocument;
$xsl->load("../xml/coches.xsl");

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);



?>

