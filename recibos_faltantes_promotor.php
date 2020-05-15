<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores


date_default_timezone_set('America/Mexico_City');


$strNombrePromotor = $_POST['nombrePromotor'];


$servidor = "localhost";
$basedatos = "crese";
$usuario = "root";
$contrasena = "Admin123";

try {
    $conexionMysql = new mysqli($servidor,$usuario,$contrasena,$basedatos);
    if ($conexionMysql->connect_errno) {
		echo "Fallo la conexion con MySQL: (".$conexionMysql->connect_errno.")" . $conexionMysql->connect_errno;
	} else {

    /////////////// OBTENER EL TOTAL DE RECIBOS DEL PROMOTOR
    
    $obtenerTotalRecibosPromotor = utf8_decode("select count(Numero_Recibo) from TotalPromotoresPagos where Nombre = '".$strNombrePromotor."'");
    $resultado = $conexionMysql->query($obtenerTotalRecibosPromotor);
    $row=$resultado->fetch_assoc();
    $TotalRecibosPromotor = $row['count(Numero_Recibo)'];

    ?>
    <script>
     function recibosIngresadosFaltantes(){
        $("#txtRecibosIngresadosP").val('0');
        $("#txtRecibosFaltantesP").val('<?php echo $TotalRecibosPromotor; ?>')
        };

        recibosIngresadosFaltantes();   
        $("#divBuscar *").prop('disabled',false);     
    </script>
    <?php

}
}catch (Exception $e) {
	throw $e;	
}

    ?>


<script>
/*
function limpiarCajas(){
    $("#txtNombreP").val('');
    $("#txtTelefonoP").val('');
    $("#txtCalleP").val('');
    $("#txtNumeroP").val('');
    $("#txtColoniaP").val('');
    $("#txtMunicipioP").val('Irapuato, Gto.');
    $("#txtHistorialP").val('Nuevo Cliente');
    $("#txtPrecioVenta").val('');
    $("#txtComentariosP").val('');

    $("#txtNombreAvalP").val('');
    $("#txtTelefonoAvalP").val('');
    $("#txtCalleAvalP").val('');
    $("#txtNumeroAvalP").val('');
    $("#txtColoniaAvalP").val('');
    $("#txtMunicipioAvalP").val('Irapuato, Gto.');

    $("#txtCuentaP").val('<?php echo $strCuenta3; ?>');
    $("#txtCantidadP").val('');
    $("#txtPagosP").val('')
};
*/
</script>