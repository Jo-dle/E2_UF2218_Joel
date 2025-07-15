<?php
$xml = new DOMDocument();
$xml->load("../xml/coches.xml");

// Obtener la matrícula
$matricula = $_REQUEST["matricula"] ?? null;

$coches = $xml->getElementsByTagName("coche");

// Modo edición
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($coches as $coche) {
        if ($coche->getAttribute("matricula") === $matricula) {
            $coche->getElementsByTagName("marca")[0]->nodeValue = $_POST["marca"];
            $coche->getElementsByTagName("modelo")[0]->nodeValue = $_POST["modelo"];
            $coche->getElementsByTagName("puertas")[0]->nodeValue = $_POST["puertas"];
            $coche->getElementsByTagName("color")[0]->nodeValue = $_POST["color"];
            $precio = $coche->getElementsByTagName("precio")[0];
            $precio->nodeValue = $_POST["precio"];
            $precio->setAttribute("venta", $_POST["venta"]);
            $xml->save("../xml/coches.xml");

            header("Location: ../vistas/index.php?editado=" . urlencode($matricula));
            exit();
        }
    }

    header("Location: ../vistas/index.php?error=no_encontrado");
    exit();
}

//rellenar el formulario con los datos actuales
foreach ($coches as $coche) {
    if ($coche->getAttribute("matricula") === $matricula) {
        $marca = $coche->getElementsByTagName("marca")[0]->nodeValue;
        $modelo = $coche->getElementsByTagName("modelo")[0]->nodeValue;
        $puertas = $coche->getElementsByTagName("puertas")[0]->nodeValue;
        $color = $coche->getElementsByTagName("color")[0]->nodeValue;
        $precio = $coche->getElementsByTagName("precio")[0]->nodeValue;
        $venta = $coche->getElementsByTagName("precio")[0]->getAttribute("venta");
        break;
    }
}
