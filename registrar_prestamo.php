<?php
error_reporting(E_ALL);
//error_reporting(0);//No muestra ningun mensaje de errores


date_default_timezone_set('America/Mexico_City');


$strNombre = $_POST['nombre'];
$strTelefono = $_POST['telefono'];
    if($strTelefono=="")
    {
        $strTelefono=0;
    }
$strCalle = $_POST['calle'];
$strNumero = $_POST['numero'];
$strColonia = $_POST['colonia'];
$strMunicipio = $_POST['municipio'];
$strHistorial = $_POST['historial'];
$strComentarios = $_POST['comentarios'];
    if($strComentarios=="")
    {
        $strComentarios="B";
    }

$strNombreAval = $_POST['nombreAval'];
$strTelefonoAval = $_POST['telefonoAval'];
$strCalleAval = $_POST['calleAval'];
$strNumeroAval = $_POST['numeroAval'];
$strColoniaAval = $_POST['coloniaAval'];
$strMunicipioAval = $_POST['municipioAval'];

$strCuenta = $_POST['cuenta'];
$strPromotor = $_POST['promotor'];
$strCantidad = $_POST['cantidad'];
$strPagos = $_POST['pagos'];
$strFecha = $_POST['fecha'];

$strFecha = strtotime($strFecha);
$strFecha =date('Y-m-d',$strFecha);

$codigoBarras = date("Y").date("m").date("d").$strCuenta;

function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 

if(startsWith($strCuenta,"0"))
{
    $strCuenta=substr($strCuenta, 1);
}

$servidor = "localhost";
$basedatos = "crese";
$usuario = "root";
$contrasena = "Admin123";

try {
    $conexionMysql = new mysqli($servidor,$usuario,$contrasena,$basedatos);
    if ($conexionMysql->connect_errno) {
		echo "Fallo la conexion con MySQL: (".$conexionMysql->connect_errno.")" . $conexionMysql->connect_errno;
	} else {

    /////////////// INSERTAR EN DIRECCIÓN CLIENTE
    $query=utf8_decode("insert into direccion(Calle,Colonia,Numero,Municipio,Estado) 
    values('".$strCalle."','".$strColonia."','".$strNumero."','".$strMunicipio."','')");
    
    $resultadoOperacion1 = $conexionMysql->query($query);

    ///////////// OBTENER ID DIRECCIÓN CLIENTE
    $obtenerUltimoIdDireccionCliente = utf8_decode("select id_Direccion from direccion order by id_Direccion desc limit 1");
    $resultadoID = $conexionMysql->query($obtenerUltimoIdDireccionCliente);
    $row=$resultadoID->fetch_assoc();
    $FK_Direccion = $row['id_Direccion'];

    /////////////// INSERTAR EN CLIENTE_PRESTAMO
    $query=utf8_decode("insert into cliente_prestamo(Nombre,Telefono,Ingresos,Lugar_Trabajo,Comentario,Historial,Estatus,fk_Id_Direccion) 
    values('".$strNombre."','".$strTelefono."','A','A','".$strComentarios."','Nuevo Cliente',1,'".$FK_Direccion."')");
    
    $resultadoOperacion2 = $conexionMysql->query($query);

    ///////////// OBTENER ID CLIENTE_PRESTAMO
    $obtenerUltimoIdClientePrestamo = utf8_decode("select id_Cliente_Prestamo from cliente_prestamo order by id_Cliente_Prestamo desc limit 1");
    $resultadoID = $conexionMysql->query($obtenerUltimoIdClientePrestamo);
    $row=$resultadoID->fetch_assoc();
    $FK_IdClientePrestamo = $row['id_Cliente_Prestamo'];

    /////////////// INSERTAR EN DIRECCIÓN AVAL
    $query=utf8_decode("insert into direccion(Calle,Colonia,Numero,Municipio,Estado) 
    values('".$strCalleAval."','".$strColoniaAval."','".$strNumeroAval."','".$strMunicipioAval."','')");
    
    $resultadoOperacion1 = $conexionMysql->query($query);

    ///////////// OBTENER ID DIRECCIÓN AVAL
    $obtenerUltimoIdDireccionCliente = utf8_decode("select id_Direccion from direccion order by id_Direccion desc limit 1");
    $resultadoID = $conexionMysql->query($obtenerUltimoIdDireccionCliente);
    $row=$resultadoID->fetch_assoc();
    $FK_DireccionAval = $row['id_Direccion'];

    /////////////// INSERTAR EN AVAL_PRESTAMO
    $query=utf8_decode("insert into aval_prestamo(Nombre,Telefono,Estatus,fk_Id_Direccion,fk_Id_Cliente_Prestamo) 
    values('".$strNombreAval."','".$strTelefonoAval."',1,'".$FK_DireccionAval."','".$FK_IdClientePrestamo."')");
    
    $resultadoOperacion3 = $conexionMysql->query($query);

    ///////////// OBTENER ID AVAL_PRESTAMO
    $obtenerUltimoIdAvalPrestamo = utf8_decode("select id_Aval_Prestamo from aval_prestamo order by id_Aval_Prestamo desc limit 1");
    $resultadoID = $conexionMysql->query($obtenerUltimoIdAvalPrestamo);
    $row=$resultadoID->fetch_assoc();
    $FK_IdAvalPrestamo = $row['id_Aval_Prestamo'];

    /////////////// INSERTAR EN DETALLES_PRESTAMO
    $query=utf8_decode("insert into detalles_prestamo(Numero_Cuenta,Codigo_Barras,Fecha_Solicitud,Cantidad_Prestada,Saldo,Abonos,Necesidad_Prestamo,Estatus,SemanasEfectivas,SemanasRetraso,Numero_Semana,Importe_Atrazado,Estatus_Juridico,fk_Id_Aval_Prestamo,fk_Id_Cliente_Prestamo,fk_Id_Promotor) 
    values('".$strCuenta."','".$codigoBarras."','".$strFecha."','".$strCantidad."','".$strCantidad."','".$strPagos."','','1','0','0','0','0','0','".$FK_IdAvalPrestamo."','".$FK_IdClientePrestamo."','".$strPromotor."')");
    
    $resultadoOperacion4 = $conexionMysql->query($query);

/*
    $insertarDireccion = utf8_decode("insert into direccion(Calle,Colonia,Numero,Municipio,Estado) values(?,?,?,?,?)");
    $resultadoOperacion1=$con->prepare($insertarDireccion);
    $resultadoOperacion1->execute(array($strCalle,$strColonia,$strNumero,$strMunicipio,$strEstado)); 
    insert into cliente_prestamo(Nombre,Telefono,Estatus,fk_Id_Direccion,fk_Id_Cliente_Prestamo) values('hjkh','jkhjk',1,'1002','490')

    */

    if($resultadoOperacion1 && $resultadoOperacion2 && $resultadoOperacion3 && $resultadoOperacion4){
            
        ?>
        <script>
            Swal.fire({
        title: 'Préstamo registrado',
        text: 'El nuevo préstamo ha sido registrado con éxito',
       /* imageUrl: 'img/notFound.png',
        imageWidth: 130,
        imageHeight: 130,
        imageAlt: 'Custom image', */
        type: 'success',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        animation: true
      }).then(function() {
            limpiarCajas();
        });
      </script>
        <?php
        
    } else{
        echo $query;
        ?>
            <script>
            Swal.fire({
        title: 'Préstamo NO registrado',
        text: 'El nuevo préstamo NO ha sido registrado',
       /* imageUrl: 'img/notFound.png',
        imageWidth: 130,
        imageHeight: 130,
        imageAlt: 'Custom image', */
        type: 'error',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        animation: true
      });
      </script>
        <?php    
    }
}
}catch (Exception $e) {
	throw $e;	
}

    ?>

<?php  
function concatenarCuenta($strCuenta2){
    if(strlen($strCuenta2) == 1)
    {
        return $strCuenta2 = "000".$strCuenta2;
    }
    elseif(strlen($strCuenta2) == 2){
        return $strCuenta2 = "00".$strCuenta2;
    }
    elseif (strlen($strCuenta2) == 3)
    {
        return $strCuenta2 = "0".$strCuenta2;
    }
    else
    {
        return $strCuenta2;
    }
  }


   $query = "Select max(Numero_Cuenta) + 1 from Detalles_Prestamo";
   $resultado = $conexionMysql->query($query);
   while($row=$resultado->fetch_assoc())
       {
           $strCuenta3 = $row['max(Numero_Cuenta) + 1'];
       }
       if(!is_null($strCuenta3) || !empty($strCuenta3))
       {
           $strCuenta3 = concatenarCuenta($strCuenta3);
       }
       else{
           $strCuenta3 = concatenarCuenta('1');
       }
?>

<script>
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
</script>