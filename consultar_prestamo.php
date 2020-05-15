<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores


date_default_timezone_set('America/Mexico_City');

function concatenarCuenta($strCuenta){
    if(strlen($strCuenta) == 1)
    {
        return $strCuenta = "000".$strCuenta;
    }
    elseif(strlen($strCuenta) == 2){
        return $strCuenta = "00".$strCuenta;
    }
    elseif (strlen($strCuenta) == 3)
    {
        return $strCuenta = "0".$strCuenta;
    }
    else
    {
        return $strCuenta;
    }
  }

$strNombreCuenta = $_POST['nombreCuenta'];

$servidor = "localhost";
$basedatos = "crese";
$usuario = "root";
$contrasena = "Admin123";

try {
    $conexionMysql = new mysqli($servidor,$usuario,$contrasena,$basedatos);
    if ($conexionMysql->connect_errno) {
		echo "Fallo la conexion con MySQL: (".$conexionMysql->connect_errno.")" . $conexionMysql->connect_errno;
    } 
    else {

        if(is_numeric($strNombreCuenta))
        {
            if(strlen($strNombreCuenta) == 4)
            {

///////////// OBTENER FK_ID_CLIENTE_PRESTAMO
$obtenerFkClientePrestamo = utf8_decode("select fk_Id_Cliente_Prestamo from Detalles_Prestamo where Numero_Cuenta='".$strNombreCuenta."'");
$resultadoID = $conexionMysql->query($obtenerFkClientePrestamo);
$row=$resultadoID->fetch_assoc();
$FK_IdClientePrestamo = $row['fk_Id_Cliente_Prestamo'];


if($FK_IdClientePrestamo!="")
{
///////////// OBTENER DATOS DEL CLIENTE
$obtenerDatosCliente = utf8_decode("select cp.Nombre, dr.Calle, dr.Numero, dr.Colonia, dr.Municipio, cp.Telefono, cp.Historial, cp.Comentario, cp.Estatus from cliente_prestamo as cp inner join direccion as dr on cp.fk_Id_Direccion = dr.Id_Direccion where cp.Id_Cliente_Prestamo='".$FK_IdClientePrestamo."'");
$resultadoID = $conexionMysql->query($obtenerDatosCliente);
$row=$resultadoID->fetch_assoc();
$NombreCliente = $row['Nombre'];
$DireccionCliente = $row['Calle']." #".$row['Numero'].", Col. ".$row['Colonia'].", ".$row['Municipio'];
$TelefonoCliente = $row['Telefono'];
$HistorialCliente = $row['Historial'];
$ComentarioCliente = $row['Comentario'];
$Estatus = $row['Estatus'];
if($Estatus=="1")
{
    $EstatusCliente="Demandado";
}
else
{
    $EstatusCliente="";
}

///////////// OBTENER DATOS DEL AVAL
$obtenerDatosAval= utf8_decode("select ap.Nombre, dr.Calle, dr.Numero, dr.Colonia, dr.Municipio, ap.Telefono from aval_prestamo as ap inner join direccion as dr on ap.fk_Id_Direccion = dr.Id_Direccion where ap.fk_Id_Cliente_Prestamo='".$FK_IdClientePrestamo."'");
$resultadoID = $conexionMysql->query($obtenerDatosAval);
$row=$resultadoID->fetch_assoc();
$NombreAval = $row['Nombre'];
$DireccionAval = $row['Calle']." #".$row['Numero'].", Col. ".$row['Colonia'].", ".$row['Municipio'];
$TelefonoAval = $row['Telefono'];

///////////// OBTENER DETALLES DEL PRESTAMO
$obtenerDatosCliente = utf8_decode("select dp.Numero_Cuenta, pr.Nombre, dp.Cantidad_Prestada, dp.Abonos, dp.Importe_Atrazado, dp.Saldo, dp.Numero_Semana, dp.Fecha_Solicitud from detalles_prestamo as dp inner join promotor as pr on dp.fk_Id_Promotor = pr.Id_Promotor where dp.fk_Id_Cliente_Prestamo='".$FK_IdClientePrestamo."'");
$resultadoID = $conexionMysql->query($obtenerDatosCliente);
$row=$resultadoID->fetch_assoc();
$NumeroCuenta = $row['Numero_Cuenta'];
$Promotor = $row['Nombre'];
$Prestamo = $row['Cantidad_Prestada'];
$Pagos = $row['Abonos'];
$ImporteAtrasado = $row['Importe_Atrazado'];
$Saldo = $row['Saldo'];
$NoSemana = $row['Numero_Semana'];
$Fecha = $row['Fecha_Solicitud'];

$Fecha = strtotime($Fecha);
$Fecha =date('d-m-Y',$Fecha);

$NumeroCuenta=concatenarCuenta($NumeroCuenta);

?>
<script>
    function datosCliente(){
$("#txtNombrePC").val('<?php echo $NombreCliente; ?>');
$("#txtDireccionPC").val('<?php echo $DireccionCliente; ?>');
$("#txtTelefonoPC").val('<?php echo $TelefonoCliente; ?>');
$("#txtHistorialPC").val('<?php echo $HistorialCliente; ?>');
$("#txtComentariosPC").val('<?php echo $ComentarioCliente; ?>');
$("#txtEstatusPC").val('<?php echo $EstatusCliente; ?>')
};

function datosAval(){
$("#txtNombreAvalPC").val('<?php echo $NombreAval; ?>');
$("#txtDireccionAvalPC").val('<?php echo $DireccionAval; ?>');
$("#txtTelefonoAvalPC").val('<?php echo $TelefonoAval; ?>')
};

function datosPrestamo(){
$("#txtCuentaPC").val('<?php echo $NumeroCuenta; ?>');
$("#txtPromotorPC").val('<?php echo $Promotor; ?>');
$("#txtPrestamoPC").val('<?php echo $Prestamo; ?>');
$("#txtPagosPC").val('<?php echo $Pagos; ?>');
$("#txtImporteAtrasadoPC").val('<?php echo $ImporteAtrasado; ?>');
$("#txtSaldoPC").val('<?php echo $Saldo; ?>');
$("#txtSemanaPC").val('<?php echo $NoSemana; ?>');
$("#txtFechaPC").val('<?php echo $Fecha; ?>')
};

    datosCliente();
    datosAval();
    datosPrestamo();
    document.getElementById('btnEdoCuentaP').disabled=false;
    document.getElementById('btnModificarP').disabled=false;
</script>
<?php
}
else
{
    ?>
    <script>
Swal.fire({
title: 'Cuenta no Encontrada',
text: 'La cuenta no fue encontrada. Compruebe la escritura y vuelva a intentarlo.',
type: 'error',
confirmButtonText: 'OK',
allowOutsideClick: false,
animation: true
}).then(function() {
            limpiarCajasPC();
        });
</script>
    <?php
}
    }
            else{
                ?>
                <script>
            Swal.fire({
        title: 'Formato incorrecto',
        text: 'El número de cuenta debe estar conformado por 4 dígitos. Verifique la longitud.',
        type: 'error',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        animation: true
      }).then(function() {
            limpiarCajasPC();
        });
      </script>
                <?php
            }
        }

    }
}
catch(Exception $e)
{
throw $e;
}
?>

<script>
function limpiarCajasPC(){
    $("#txtNombrePC").val('');
    $("#txtDireccionPC").val('');
    $("#txtTelefonoPC").val('');
    $("#txtHistorialPC").val('');
    $("#txtComentariosPC").val('');
    $("#txtEstatusPC").val('');

    $("#txtNombreAvalPC").val('');
    $("#txtDireccionAvalPC").val('');
    $("#txtTelefonoAvalPC").val('');

    $("#txtCuentaPC").val('');
$("#txtPromotorPC").val('');
$("#txtPrestamoPC").val('');
$("#txtPagosPC").val('');
$("#txtImporteAtrasadoPC").val('');
$("#txtSaldoPC").val('');
$("#txtSemanaPC").val('');
$("#txtFechaPC").val('');

document.getElementById('btnEdoCuentaP').disabled=true;
document.getElementById('btnModificarP').disabled=true
};
</script>