<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores
date_default_timezone_set('America/Mexico_City');


$ingresados=$_POST['recibosIngresados'];
$faltantes=$_POST['recibosFaltantes'];
$fkPromotor = $_POST['promotor'];
$strnumeroCuenta = $_POST['numeroCuenta'];
$strSaldo = $_POST['saldo'];
$strRecibo = $_POST['recibo'];
$fecha = date("Y-m-d");

$importe = $_POST['importePagado'];
$strAbonos = $_POST['abonos'];
$strPrestamo = $_POST['prestamo'];
$strImportePagosVencidos = $_POST['importePagosVencidos'];

$servidor = "localhost";
$basedatos = "crese";
$usuario = "root";
$contrasena = "Admin123";

try {
    $conexionMysql = new mysqli($servidor,$usuario,$contrasena,$basedatos);
    if ($conexionMysql->connect_errno) {
		echo "Fallo la conexion con MySQL: (".$conexionMysql->connect_errno.")" . $conexionMysql->connect_errno;
	} else {

    /////////////// OBTENER EL fk del id prestamo
    $obtenerNumSemana = utf8_decode("select Numero_Semana FROM detalles_prestamo WHERE Numero_Cuenta = '".$strnumeroCuenta."'");
    $resultado = $conexionMysql->query($obtenerNumSemana);
    $row=$resultado->fetch_assoc();
    $NumeroSemana = $row['Numero_Semana'];
    $NumeroSemana = $NumeroSemana+1;

        /////////////// OBTENER EL fk del id prestamo
    $obtenerIdDP = utf8_decode("select Id_Detalles_Prestamo FROM detalles_prestamo WHERE Numero_Cuenta = '".$strnumeroCuenta."'");
    $resultado = $conexionMysql->query($obtenerIdDP);
    $row=$resultado->fetch_assoc();
    $fkDetallesPrestamo = $row['Id_Detalles_Prestamo'];

    try
    {
        if($importe > $strAbonos && $strImportePagosVencidos >0)
        {
             $reducir = $importe - $strAbonos;
             $aumentar =0;
             $datos = array("Monto_Recibido1" => $importe, "Saldo1" => $strSaldo, "Numero_Recibo1" => $strRecibo, "Fecha_Pago1" => $fecha, "Numero_Semana1" => $NumeroSemana, "Estatus1" => "1", "fk_Id_Promotor1" => $fkPromotor, "fk_Id_Detalles_Prestamo1" => $fkDetallesPrestamo, "ReducirAtraso" => $reducir, "AumentarAtraso" => $aumentar);
             $statement = $conexionMysql->prepare("CALL RegistroPagos(?,?,?,?,?,?,?,?,?,?)");
             $statement->bind_param("iiisiiiidd",$datos["Monto_Recibido1"],$datos["Saldo1"],$datos["Numero_Recibo1"],$datos["Fecha_Pago1"],$datos["Numero_Semana1"],$datos["Estatus1"],$datos["fk_Id_Promotor1"],$datos["fk_Id_Detalles_Prestamo1"],$datos["ReducirAtraso"],$datos["AumentarAtraso"]);
             $statement->execute();
             $statement->close();
             $ingresados=$ingresados+1;
            $faltantes=$faltantes-1;
        }

        elseif($importe < $strAbonos)
        {
             $aumentar = $strAbonos - $importe;
             $reducir =0;
             $datos = array("Monto_Recibido1" => $importe, "Saldo1" => $strSaldo, "Numero_Recibo1" => $strRecibo, "Fecha_Pago1" => $fecha, "Numero_Semana1" => $NumeroSemana, "Estatus1" => "1", "fk_Id_Promotor1" => $fkPromotor, "fk_Id_Detalles_Prestamo1" => $fkDetallesPrestamo, "ReducirAtraso" => $reducir, "AumentarAtraso" => $aumentar);
             $statement = $conexionMysql->prepare("CALL RegistroPagos(?,?,?,?,?,?,?,?,?,?)");
             $statement->bind_param("iiisiiiidd",$datos["Monto_Recibido1"],$datos["Saldo1"],$datos["Numero_Recibo1"],$datos["Fecha_Pago1"],$datos["Numero_Semana1"],$datos["Estatus1"],$datos["fk_Id_Promotor1"],$datos["fk_Id_Detalles_Prestamo1"],$datos["ReducirAtraso"],$datos["AumentarAtraso"]);
             $statement->execute();
             $statement->close();
             $ingresados=$ingresados+1;
            $faltantes=$faltantes-1;
        }

        elseif($strSaldo == $strImportePagosVencidos)
        {
             $aumentar = 0;
             $reducir =0;
             $datos = array("Monto_Recibido1" => $importe, "Saldo1" => $strSaldo, "Numero_Recibo1" => $strRecibo, "Fecha_Pago1" => $fecha, "Numero_Semana1" => $NumeroSemana, "Estatus1" => "1", "fk_Id_Promotor1" => $fkPromotor, "fk_Id_Detalles_Prestamo1" => $fkDetallesPrestamo, "ReducirAtraso" => $reducir, "AumentarAtraso" => $aumentar);
             $statement = $conexionMysql->prepare("CALL RegistroPagos(?,?,?,?,?,?,?,?,?,?)");
             $statement->bind_param("iiisiiiidd",$datos["Monto_Recibido1"],$datos["Saldo1"],$datos["Numero_Recibo1"],$datos["Fecha_Pago1"],$datos["Numero_Semana1"],$datos["Estatus1"],$datos["fk_Id_Promotor1"],$datos["fk_Id_Detalles_Prestamo1"],$datos["ReducirAtraso"],$datos["AumentarAtraso"]);
             $statement->execute();
             $statement->close();
             $ingresados=$ingresados+1;
            $faltantes=$faltantes-1;
        }

        else
        {
             $aumentar = 0;
             $reducir =0;
             $datos = array("Monto_Recibido1" => $importe, "Saldo1" => $strSaldo, "Numero_Recibo1" => $strRecibo, "Fecha_Pago1" => $fecha, "Numero_Semana1" => $NumeroSemana, "Estatus1" => "1", "fk_Id_Promotor1" => $fkPromotor, "fk_Id_Detalles_Prestamo1" => $fkDetallesPrestamo, "ReducirAtraso" => $reducir, "AumentarAtraso" => $aumentar);
             $statement = $conexionMysql->prepare("CALL RegistroPagos(?,?,?,?,?,?,?,?,?,?)");
             $statement->bind_param("iiisiiiidd",$datos["Monto_Recibido1"],$datos["Saldo1"],$datos["Numero_Recibo1"],$datos["Fecha_Pago1"],$datos["Numero_Semana1"],$datos["Estatus1"],$datos["fk_Id_Promotor1"],$datos["fk_Id_Detalles_Prestamo1"],$datos["ReducirAtraso"],$datos["AumentarAtraso"]);
             $statement->execute();
             $statement->close();
             $ingresados=$ingresados+1;
            $faltantes=$faltantes-1;
        }

        ?>
        <script>
            Swal.fire({
                title: 'Pago registrado',
                text: 'El pago ha sido registrado correctamente',
                type: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                animation: true
                }).then(function() {
                    limpiarCajasPC3();
                    $("#txtRecibosIngresadosP").val("<?php echo $ingresados; ?>");
                    $("#txtRecibosFaltantesP").val("<?php echo $faltantes; ?>");
                    $("#divGuardarPago *").prop('disabled',true);
            });    
        </script>
        <?php

    }

    catch(Exception $e)
    {
        ?>
        <script>
            Swal.fire({
                title: 'Algo salió mal',
                text: 'Ocurrió un error al intentar registrar el pago. Intente nuevamente',
                type: 'error',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                animation: true
                }).then(function() {
                    limpiarCajasPC2();

            });    
        </script>
        <?php
        throw $e;
    }
    

}
}catch (Exception $e) {
	throw $e;	
}

    ?>


<script>

function limpiarCajasPC3(){
    $("#tdNombreP").val("");
    $("#tdReciboP").val("");
    $("#tdImporteP").val("");
    $("#tdSaldoActualP").val("");

    $("#tdCuentaP").val("");
    $("#tdPrestamoP").val("");
    $("#tdFechaP").val("");
    $("#tdPagosVencidosP").val("");
    $("#tdImportePagosVencidosP").val("");
    $("#tdSaldoAnteriorP").val("")

    $("#txtCodigoBarrasP").val('');
    $("#txtImportePagadoP").val('');
   
};

</script>