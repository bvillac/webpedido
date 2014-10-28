<?php

$xmldata = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<factura id="comprobante" version="1.1.0">
    <infoTributaria>
        <ambiente>' . $cabFact["Ambiente"] . '</ambiente>
        <tipoEmision>' . $cabFact["TipoEmision"] . '</tipoEmision>
        <razonSocial>' . Yii::app()->getSession()->get('RazonSocial', FALSE) . '</razonSocial>
        <nombreComercial>' . Yii::app()->getSession()->get('NombreComercial', FALSE) . '</nombreComercial>
        <ruc>' . Yii::app()->getSession()->get('Ruc', FALSE) . '</ruc>
        <claveAcceso>' . $cabFact["ClaveAcceso"] . '</claveAcceso>
        <codDoc>' . $cabFact["CodigoDocumento"] . '</codDoc>
        <estab>' . $cabFact["Establecimiento"] . '</estab>
        <ptoEmi>' . $cabFact["PuntoEmision"] . '</ptoEmi>
        <secuencial>' . $cabFact["Secuencial"] . '</secuencial>
        <dirMatriz>' . $cabFact["DireccionMatriz"] . '</dirMatriz>
    </infoTributaria>
    <infoFactura>
        <fechaEmision>' . date(Yii::app()->params["dateXML"], strtotime($cabFact["FechaEmision"])) . '</fechaEmision>
        <dirEstablecimiento>' . $cabFact["DireccionEstablecimiento"] . '</dirEstablecimiento>
        <contribuyenteEspecial>' . $cabFact["ContribuyenteEspecial"] . '</contribuyenteEspecial>
        <obligadoContabilidad>' . $cabFact["ObligadoContabilidad"] . '</obligadoContabilidad>
        <tipoIdentificacionComprador>' . $cabFact["TipoIdentificacionComprador"] . '</tipoIdentificacionComprador>
        <razonSocialComprador>' . $cabFact["RazonSocialComprador"] . '</razonSocialComprador>
        <identificacionComprador>' . $cabFact["IdentificacionComprador"] . '</identificacionComprador>
        <totalSinImpuestos>' . Yii::app()->format->formatNumber($cabFact["TotalSinImpuesto"]) . '</totalSinImpuestos>
        <totalDescuento>' . Yii::app()->format->formatNumber($cabFact["TotalDescuento"]) . '</totalDescuento>
        <totalConImpuestos>
            <totalImpuesto>
                <codigo>2</codigo>
                <codigoPorcentaje>6</codigoPorcentaje>
				<descuentoAdicional>0</descuentoAdicional>
                <baseImponible>0.00</baseImponible>
                <valor>0.00</valor>
            </totalImpuesto>
            <totalImpuesto>
                <codigo>3</codigo>
                <codigoPorcentaje>3011</codigoPorcentaje>
                <baseImponible>0.00</baseImponible>
                <valor>0.00</valor>
            </totalImpuesto>
        </totalConImpuestos>
        <propina>0.00</propina>
        <importeTotal>0.00</importeTotal>
        <moneda>DOLAR</moneda>
    </infoFactura>
    <detalles>
        <detalle>
            <codigoPrincipal>011</codigoPrincipal>
            <descripcion>PRUEBA</descripcion>
            <cantidad>0.000000</cantidad>
            <precioUnitario>0.000000</precioUnitario>
            <descuento>0</descuento>
            <precioTotalSinImpuesto>0.00</precioTotalSinImpuesto>
            <impuestos>
                <impuesto>
                    <codigo>2</codigo>
                    <codigoPorcentaje>6</codigoPorcentaje>
                    <tarifa>0.00</tarifa>
                    <baseImponible>0.00</baseImponible>
                    <valor>0.00</valor>
                </impuesto>
                <impuesto>
                    <codigo>3</codigo>
                    <codigoPorcentaje>3011</codigoPorcentaje>
                    <tarifa>0.00</tarifa>
                    <baseImponible>0.00</baseImponible>
                    <valor>0.00</valor>
                </impuesto>
            </impuestos>
        </detalle>
    </detalles>
	<retenciones>
        <retencion>
	    <codigo>4</codigo>
	    <codigoPorcentaje>327</codigoPorcentaje>
	    <tarifa>0.00</tarifa>	    
	    <valor>0.00</valor>
        </retencion>
        <retencion>
	    <codigo>4</codigo>
	    <codigoPorcentaje>328</codigoPorcentaje>
	    <tarifa>0.00</tarifa>	    
	    <valor>0.00</valor>
        </retencion>
		 <retencion>
	    <codigo>4</codigo>
	    <codigoPorcentaje>3</codigoPorcentaje>
	    <tarifa>1</tarifa>	    
	    <valor>0.00</valor>
        </retencion>
    </retenciones>
    <infoAdicional>
        <campoAdicional nombre="Dirección">xyz</campoAdicional>
        <campoAdicional nombre="Email">sri@gob.ec</campoAdicional>
    </infoAdicional>
</factura>';


$nomDocfile = $cabFact['NombreDocumento'] . '-' . $cabFact['NumDocumento'] . '.xml';
if (file_put_contents(Yii::app()->params['seaDocFact'] . $nomDocfile, $xmldata)) { // this code is working fine xml get created
    //echo "file created";exit;
    header('Content-type: text/xml');   // i am getting error on this line
    //Cannot modify header information - headers already sent by (output started at D:\xampp\htdocs\yii\framework\web\CController.php:793)

    header('Content-Disposition: Attachment; filename="' . $nomDocfile . '"');
    // File to download
    readfile(Yii::app()->params['seaDocFact'] . $nomDocfile);        // i am not able to download the same file
}

//$xmlobj = new SimpleXMLElement($xmldata);
//$xmlobj->asXML(Yii::app()->params['seaDocFact'] . "memberBill.xml");
//echo htmlentities($xmldata);
?>

