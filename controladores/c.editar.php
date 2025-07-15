<?php
$matricula = $_REQUEST["matricula"];
$xml = new DOMDocument();
$xml->load("../xml/coches.xml");

foreach ($xml->getElementsByTagName("coche") as $coche) {
    if ($coche->getAttribute("matricula") == $matricula) {
        $marca = $coche->getElementsByTagName("marca")[0]->nodeValue;
        $modelo = $coche->getElementsByTagName("modelo")[0]->nodeValue;
        $puertas = $coche->getElementsByTagName("puertas")[0]->nodeValue;
        $color = $coche->getElementsByTagName("color")[0]->nodeValue;
        $precio = $coche->getElementsByTagName("precio")[0]->nodeValue;
        $venta = $coche->getElementsByTagName("precio")[0]->getAttribute("venta");
        break;
    }
}
?>