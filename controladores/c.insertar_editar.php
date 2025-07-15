<?php
$xml = new DOMDocument();
$xml->load("../xml/coches.xml");

// Verificamos si estamos editando (por matrícula)
$matricula = $_POST["matricula"];
$exists = false;

foreach ($xml->getElementsByTagName("coche") as $coche) {
    if ($coche->getAttribute("matricula") == $matricula) {
        $exists = true;
        $coche->getElementsByTagName("marca")[0]->nodeValue = $_POST["marca"];
        $coche->getElementsByTagName("modelo")[0]->nodeValue = $_POST["modelo"];
        $coche->getElementsByTagName("puertas")[0]->nodeValue = $_POST["puertas"];
        $coche->getElementsByTagName("color")[0]->nodeValue = $_POST["color"];
        $precio = $coche->getElementsByTagName("precio")[0];
        $precio->nodeValue = $_POST["precio"];
        $precio->setAttribute("venta", $_POST["venta"]);
        break;
    }
}

if (!$exists) {
    $coche = $xml->createElement("coche");
    $coche->setAttribute("matricula", $matricula);

    $coche->appendChild($xml->createElement("marca", $_POST["marca"]));
    $coche->appendChild($xml->createElement("modelo", $_POST["modelo"]));
    $coche->appendChild($xml->createElement("puertas", $_POST["puertas"]));
    $coche->appendChild($xml->createElement("color", $_POST["color"]));

    $precio = $xml->createElement("precio", $_POST["precio"]);
    $precio->setAttribute("venta", $_POST["venta"]);
    $coche->appendChild($precio);

    $xml->documentElement->appendChild($coche);
}

$xml->save("../xml/coches.xml");
header("Location: ../vistas/index.php");
?>
