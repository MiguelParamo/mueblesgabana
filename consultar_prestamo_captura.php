<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores


date_default_timezone_set('America/Mexico_City');

$strNombrePromotor = $_POST['nombrePromotor'];
$strCodigoBarras = $_POST['codigoBarras'];



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

            if(strlen($strCodigoBarras) == 4)
            {

                $obtenerDato = utf8_decode("select Numero_Cuenta from Detalles_Prestamo where Numero_Cuenta = '".$strCodigoBarras."'");
                $resultado = $conexionMysql->query($obtenerDato);
                $row=$resultado->fetch_assoc();
                $existeCuenta = $row['Numero_Cuenta'];

                if($existeCuenta!=null)
                {

                    $obtenerDato = utf8_decode("select Codigo_Barras FROM ExisteCuenta WHERE Numero_Cuenta = '".$strCodigoBarras."'");
                    $resultado = $conexionMysql->query($obtenerDato);
                    $row=$resultado->fetch_assoc();
                    $existeCuentaActiva = $row['Codigo_Barras'];

                    if($existeCuentaActiva != null)
                    {

                        $obtenerDato = utf8_decode("select count(Codigo_Barras) from Recibos where codigo_barras = '".$existeCuentaActiva."'");
                        $resultado = $conexionMysql->query($obtenerDato);
                        $row=$resultado->fetch_assoc();
                        $existe = $row['count(Codigo_Barras)'];

                        if($existe > 0)
                        {

                            $obtenerDato = utf8_decode("select count(Numero_Cuenta) FROM TotalPromotoresPagos WHERE Numero_Cuenta = '".$strCodigoBarras."' AND Nombre ='".$strNombrePromotor."'");
                            $resultado = $conexionMysql->query($obtenerDato);
                            $row=$resultado->fetch_assoc();
                            $perteneceCuentaPromotor = $row['count(Numero_Cuenta)'];

                            if($perteneceCuentaPromotor=="1")
                            {

                                //"SELECT * FROM LlenarPagos WHERE Codigo_Barras = //$existeCuentaActiva
                                $obtenerDato = utf8_decode("select * FROM LlenarPagos WHERE Codigo_Barras = '".$existeCuentaActiva."'");
                                $resultado = $conexionMysql->query($obtenerDato);
                                $row=$resultado->fetch_assoc();
                                $Nombre = $row['Nombre'];
                                $Recibo = $row['Numero_Recibo'];
                                $Importe = $row['Abonos'];

                                $Prestamo = $row['Cantidad_Prestada'];
                                $FechaPrestamo = $row['Fecha_Solicitud'];
                                $PagosVencidos = $row['SemanasRetraso'];
                                $ImportePagosVencidos = $row['Importe_Atrazado'];
                                $SaldoAnterior = $row['Saldo'];

                                $FechaPrestamo = strtotime($FechaPrestamo);
                                $FechaPrestamo =date('d-m-Y',$FechaPrestamo);

                                ?>
                                <script>  
                                    function llenarDatosPago(){
                                        //
                                        $("#txtImportePagadoP").val("<?php echo $Importe; ?>");

                                        $("#tdNombreP").val("<?php echo $Nombre; ?>");
                                        $("#tdReciboP").val("<?php echo $Recibo; ?>");
                                        $("#tdImporteP").val("<?php echo $Importe; ?>");
                                        $("#tdSaldoActualP").val("<?php echo $SaldoAnterior - $Importe; ?>");

                                        $("#tdCuentaP").val("<?php echo $strCodigoBarras; ?>");
                                        $("#tdPrestamoP").val("<?php echo $Prestamo; ?>");
                                        $("#tdFechaP").val("<?php echo $FechaPrestamo; ?>");
                                        $("#tdPagosVencidosP").val("<?php echo $PagosVencidos; ?>");
                                        $("#tdImportePagosVencidosP").val("<?php echo $ImportePagosVencidos; ?>");
                                        $("#tdSaldoAnteriorP").val("<?php echo $SaldoAnterior; ?>")
                                    };

                                        llenarDatosPago();
                                    $("#divGuardarPago *").prop('disabled',false);
                                </script>
                                <?php
                            }
                            else
                            {
                                ?>
                                <script>
                                Swal.fire({
                                title: 'La cuenta no pertenece al promotor',
                                text: 'Esta cuenta no le pertenece al promotor seleccionado. Por el momento no se puede registrar el pago. Seleccione al promotor que le corresponde dicha cuenta o intente más tarde',
                                type: 'error',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false,
                                animation: true
                                }).then(function() {
                                    limpiarCajasPC2();
                                });
                                </script>
                                <?php
                            }

                        }
                        else
                        {
                            ?>
                            <script>
                            Swal.fire({
                            title: 'Cuenta registrada',
                            text: 'La cuenta ingresada ya fue registrada en el sistema, intente con otra',
                            type: 'error',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                            animation: true
                            }).then(function() {
                                limpiarCajasPC2();
                            });
                            </script>
                            <?php
                        }

                    }
                    else
                    {
                        ?>
                        <script>
                        Swal.fire({
                        title: 'Cuenta dada de baja',
                        text: 'Lo sentimos, esta cuenta ya está dada de baja en el sistema, intente con otra',
                        type: 'error',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        animation: true
                        }).then(function() {
                            limpiarCajasPC2();
                        });
                        </script>
                        <?php
                    }

                }
                else
                {
                    ?>
                    <script>
                    Swal.fire({
                    title: 'No hay recibos',
                    text: 'Esta cuenta no tiene recibos por cobrar',
                    type: 'error',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    animation: true
                    }).then(function() {
                        limpiarCajasPC2();
                    });
                    </script>
                    <?php
                }
            }
            else
            {
                ?>
                <script>
                Swal.fire({
                title: 'Formato Incorrecto',
                text: 'El número de cuenta debe estar conformado por 4 dígitos. Verifique la longitud',
                type: 'error',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                animation: true
                }).then(function() {
                    limpiarCajasPC2();
                });
                </script>
                <?php
            }


    }
}
catch(Exception $e)
{
throw $e;
}
?>

<script>
function limpiarCajasPC2(){
    $("#txtCodigoBarrasP").val('');
    
    $("#tdNombreP").html("");
    $("#tdReciboP").html("");
    $("#tdImporteP").html("");
    $("#tdSaldoActualP").html("");

    $("#tdCuentaP").html("");
    $("#tdPrestamoP").html("");
    $("#tdFechaP").html("");
    $("#tdPagosVencidosP").html("");
    $("#tdImportePagosVencidosP").html("");
    $("#tdSaldoAnteriorP").html("")

//document.getElementById('btnEdoCuentaP').disabled=true;
//document.getElementById('btnModificarP').disabled=true
};
</script>