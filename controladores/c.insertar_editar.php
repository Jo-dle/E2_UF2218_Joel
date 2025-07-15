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
    // Verificamos si la matrícula ya existe antes de crear uno nuevo
    foreach ($xml->getElementsByTagName("coche") as $existing) {
        if ($existing->getAttribute("matricula") === $matricula) {
            // Si existe redirigimos con el mensaje de error
            header("Location: ../vistas/index.php?error=matricula_duplicada");
            exit();
        }
    }

    // Crear nuevo coche
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

// Guardamos y redirigimos
$xml->save("../xml/coches.xml");
header("Location: ../vistas/index.php?insertado=" . urlencode($matricula));
exit();

?>
