<?php

echo print_r($detFact);
echo $cabFact["IdFactura"] . '<br>';
for ($i = 0; $i < sizeof($detFact); $i++) {
    echo $detFact[$i]['CodigoPrincipal'] . '<br>';
    //echo print_r($detFact[$i]['impuestos']);
    $impuesto = $detFact[$i]['impuestos'];
    for ($j = 0; $j < sizeof($impuesto); $j++) {
        echo $impuesto[$j]['BaseImponible'] . '<br>';
    }
}
?>


