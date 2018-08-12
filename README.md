# DescargarRCV
Descargar Registro de Compra y Venta del SII
<br>A continuación se detalla el Procedimiento para realizar la Descarga de Archivos Csv Registro Compra y Venta del SII.
<h3>Procesos a Realizar:</h3>
1.-Generar Archivo Plano TXT
<br>2.-Enviar Archivo Plano TXT al Servidor Factronica
<br>3.-Recuperar Archivo Csv con Registro Descargado
<hr>
<h3>Proceso 1: Generar Archivo Plano</h3>
Este proceso Consiste en generar un archivo de texto plano con el formato requerido por el sdk de factronica.
<br>Dentro del archivo de texto plano debe ir la información requerida en el siguiente ejemplo.
<br>https://github.com/FacTronica/FacturaElectronicaAfecta/blob/master/FormatoFacturaElectronica.php
<br>
<hr>
<h3>Proceso 2: Enviar Archivo Txt</h3>
Para enviar el archivo plano TXT al servidor de Facturación se hace uso de librería opensource CURL.
<br><br><b>Enviar archivo txt desde Consola Windows:</b>
<br>c:\curl\curl.exe --form "archivito=@c:\curl\archivo_plano.txt" http://www.factronica.cl/factronica_webservice_servidor_beta/index.php
<br><br><b>Enviar archivo desde Consola Linux:</b>
<br>curl --form "archivito=@archivo_plano.txt" http://www.factronica.cl/factronica_webservice_servidor_beta/index.php
<br>
<hr>
<h3>Proceso 3: Recuperar el XML con TrackID:</h3>
Este proceso es necesario para poder validar que el SII Chile haya recibido el documento emitido.
<br><br><b>Recuperar archivo xml con Windows:</b>
<br>c:\curl\curl.exe -o c:\curl\factura_folio777_tipo33_trackid.xml http://www.factronica.cl/factronica_webservice_servidor_beta/trackid/factura_folio777_tipo33_trackid.xml
<br><br><b>Recuperar Archivo Xml con Linux:</b>
<br>curl -o factura_folio777_tipo33_trackid.xml http://www.factronica.cl/factronica_webservice_servidor_beta/trackid/factura_folio777_tipo33_trackid.xml
