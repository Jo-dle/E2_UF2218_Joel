<?php
$xml = new DOMDocument();
$xml->load("../xml/coches.xml");

$matricula = $_POST["matricula"];
$coches = $xml->getElementsByTagName("coche");

// Verificar si ya existe la matrícula
foreach ($coches as $coche) {
    if ($coche->getAttribute("matricula") === $matricula) {
        header("Location: ../vistas/index.php?error=matricula_duplicada");
        exit();
    }
}

// Crear nuevo coche
$nuevo = $xml->createElement("coche");
$nuevo->setAttribute("matricula", $matricula);
$nuevo->appendChild($xml->createElement("marca", $_POST["marca"]));
$nuevo->appendChild($xml->createElement("modelo", $_POST["modelo"]));
$nuevo->appendChild($xml->createElement("puertas", $_POST["puertas"]));
$nuevo->appendChild($xml->createElement("color", $_POST["color"]));

$precio = $xml->createElement("precio", $_POST["precio"]);
$precio->setAttribute("venta", $_POST["venta"]);
$nuevo->appendChild($precio);

$xml->documentElement->appendChild($nuevo);
$xml->save("../xml/coches.xml");

header("Location: ../vistas/index.php?insertado=" . urlencode($matricula));
exit();
