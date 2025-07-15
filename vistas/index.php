<?php
//Mensajes
if (isset($_GET["eliminado"])) {
    echo "<div class='alert alert-success'>✅ Coche con matrícula <strong>{$_GET['eliminado']}</strong> eliminado correctamente.</div>";
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

