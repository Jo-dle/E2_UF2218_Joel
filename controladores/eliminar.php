<?php
if (!isset($_GET["matricula"])) {
    die("⚠️ Error: Matrícula no especificada.");
}

$matricula = $_GET["matricula"];
$archivoXML = "../xml/coches.xml";

if (!file_exists($archivoXML)) {
    die("📁 Error: No se encuentra el archivo XML.");
}

$xml = new DOMDocument();
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load($archivoXML);

$coches = $xml->getElementsByTagName("coche");
$encontrado = false;

foreach ($coches as $coche) {
    if ($coche->getAttribute("matricula") === $matricula) {
        // Doble verificación de existencia
        if ($coche->parentNode !== null) {
            $coche->parentNode->removeChild($coche);
            $encontrado = true;
        }
        break;
    }
}

if ($encontrado) {
    if ($xml->save($archivoXML)) {
        header("Location: ../vistas/index.php?eliminado=" . urlencode($matricula));
        exit();
    } else {
        echo "💾 Error al guardar el archivo XML después de eliminar.";
    }
} else {
    echo "🚫 Error: Coche con matrícula '$matricula' no encontrado o ya fue eliminado.";
}
?>
