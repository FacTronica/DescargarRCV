<?php
# 
# URL DEL ENDPOINT PARA DESCARGAR RCV SII
$url = "https://sistema.factronica.cl/erp/sistema/factronica_rcv2/index.php";
#
# APIKEY DE ACCESO A LA API
$apikey = "l680a0imqfcmtgnm33da4u78k2";
#
# RUT DE EMPRESA
$rut_pyme = "11222333-4";
#
# CLAVE DEL SII DE LA EMPRESA
$clave_sii = "aqui-va-clave-sii";
#
# MES Y AÑO A DESCARGAR
$ano = "2025";
$mes = "12";
#
# TIPO DE DOCUMENTO 0=TODOS
$tipodte = "0";
#
# TIPO DE OPERACION: COMPRA O VENTA
$operacion = "VENTA";
# 
# ARRAY CON DATOS A ENVIAR
$arregloJson = array(
    "ApiKey" => $apikey,
    "Rut" => $rut_pyme,
    "ClaveSii" => $clave_sii,
    "Mes" => $mes,
    "Ano" => $ano,
    "Operacion" => $operacion,
);
#
# FUNCION PARA ENVIAR JSON
function JsonEnviar($arregloJson, $url)
{
    $payload = json_encode($arregloJson);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_PORT, 443);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return $json_response;
}
#
# ENVIAR LA PETICION JSON AL ENDPOINT RCV SII
$retorno_raw = JsonEnviar($arregloJson, $url);
#
# TRANSFORMAR EL STRING EN JSON VALIDO
$data = json_decode($retorno_raw, true);
#
# VALIDAR SI ES JSON 
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "estado" => "error",
        "mensaje" => "Respuesta no es JSON válido",
        "raw" => $retorno
    ]);
    exit;
}
#
# SALIDAR TIPO JSON
header('Content-Type: application/json; charset=utf-8');
#
# MOSTRAR SALIDA
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
