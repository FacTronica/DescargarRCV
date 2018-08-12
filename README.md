# DescargarRCV
<b>Descargar Registro de Compra y Venta del SII</b>
<BR>
<br><b>Introducción</b>:
<br>Hoy en día para declarar los impuestos mensuales f29, todos los contribuyentes se rigen fielmente 
<br>a lo informado en el registro de compras y ventas que entrega el sii desde agosto 2017 en adelante.
<br>
<br>A raiz de este registro, es que se genera el siguiente conflicto, el cual es que el contribuyente deba cuadrar
<br>sus compras recibidas en su sistema versus lo informado al sii.
<br>Cuando son pocos documentos no hay problema, pero cuando son  muchos documentos, se pone complejo el escenario.
<br>Ya que realizar ese cruce toma mucho tiempo generalmente los contribuyentes lo realizan a fin de mes bajo un estres que se transforma en rutinario al termino de cada mes, sin contar que los servidores del sii colapsan el último día de cada mes.
<br>
<br>Es por ello que Factronica ha desarrollado una aplicación que descarga en forma automática el registro csv.
<br>Además de descargarlo de forma directa y automática, en sistema el ERP FacTronica se realiza una AutoConciliación de Documentos.
<br>De esta forma el contribuyente tiene un reporte a diario de la cuadratura y cruze de información registrada en el SII Chile.
<br>
<br><b>Procedimiento Para Integrar en Software Propio:</b>
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
<br>
<br><b>Enviar archivo txt desde Consola Windows:</b>
<br>c:\curl\curl.exe --form "archivotxt=@c:\curl\datos_rcv.txt" http://www.factronica.cl/servidores/factronica_rcv/index.php?TOKENFACTRONICA=123
<br>
<br><b>Enviar archivo desde Consola Linux:</b>
<br>curl --form "archivotxt=@datos_rcv.txt" http://www.factronica.cl/servidores/factronica_rcv/index.php?TOKENFACTRONICA=123
<br>
<hr>
<h3>Proceso 3: Recuperar el Csv con Rcv:</h3>
Este proceso es necesario para poder descargar el archivo que contiene el listado con registros de compras o ventas.
<br>
<br><b>Recuperar archivo Csv con Windows:</b>
<br>c:\curl\curl.exe -o c:\curl\rcv_enero2018.csv http://www.factronica.cl/servidores/home/111111111/rcv_comprasenero2018.csv
<br>
<br><b>Recuperar Archivo Csv con Linux:</b>
<br>curl -o rcv_enero2018.csv http://www.factronica.cl/servidores/home/111111111/rcv_comprasenero2018.csv
<br>
<hr>
<b>Token de Acceso:</b>
<br>
<br>Para tener acceso a la API y poder descargar sus registros de compra y venta, debe registrarse en factronica.
<br>Al momento de registrarse, se le entregará un Token con el siguiente formato: TOKENFACTRONICA=sutoken
<br>Link para Registro:  http://www.factronica.cl/registro
<br>

  
