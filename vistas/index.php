<?php
$xml = new DOMDocument;
$xml->load("../xml/coches.xml");

$xsl = new DOMDocument;
$xsl->load("../xml/coches.xsl");

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>

