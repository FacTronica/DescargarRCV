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
<br>https://github.com/FacTronica/DescargarRCV/blob/master/datos_rcv.txt
<br>
<hr>
<h3>Proceso 2: Enviar Archivo Txt</h3>
Para enviar el archivo plano TXT al servidor Factronica se hace uso de librería opensource CURL.
<br><br><b>Enviar archivo txt desde Consola Windows:</b>
<br>c:\curl\curl.exe --form "archivotxt=@c:\curl\datos_rcv.txt" http://www.factronica.cl/servidor/factronica_rcv/index.php
<br><br><b>Enviar archivo desde Consola Linux:</b>
<br>curl --form "archivotxt=@datos_rcv.txt" http://www.factronica.cl/servidor/factronica_rcv/index.php
<br>
<hr>
<h3>Proceso 3: Recuperar el Csv con Rcv:</h3>
Este proceso es necesario para poder descargar el archivo que contiene el listado con registros de compras o ventas.
<br>
<br><b>Recuperar archivo Csv con Windows:</b>
<br>c:\curl\curl.exe -o c:\curl\factura_folio777_tipo33_trackid.xml http://www.factronica.cl/factronica_webservice_servidor_beta/trackid/factura_folio777_tipo33_trackid.xml
<br>
<br><b>Recuperar Archivo Xml con Linux:</b>
<br>curl -o factura_folio777_tipo33_trackid.xml http://www.factronica.cl/factronica_webservice_servidor_beta/trackid/factura_folio777_tipo33_trackid.xml
