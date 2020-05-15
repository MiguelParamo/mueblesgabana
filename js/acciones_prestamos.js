 $(document).ready(function(){
  $(document).on('click', '.btnEdoCuentaP', function () {
      $('#modalPrestamos').modal({backdrop: 'static', keyboard: false});
      $('#modalPrestamos').modal("show");
  });
});


function capturaDatosPrestamo(){   
    var url = "registrar_prestamo.php";
    $.post(url, 
        {nombre:$("#txtNombreP").val(),
            telefono:$("#txtTelefonoP").val(),
            calle:$("#txtCalleP").val(),
            numero:$("#txtNumeroP").val(),
            colonia:$("#txtColoniaP").val(),
            municipio:$("#txtMunicipioP").val(),
            historial:$("#txtHistorialP").val(),
        comentarios:$("#txtComentariosP").val(),
        nombreAval:$("#txtNombreAvalP").val(),
        telefonoAval:$("#txtTelefonoAvalP").val(),
        calleAval:$("#txtCalleAvalP").val(),
        numeroAval:$("#txtNumeroAvalP").val(),
        coloniaAval:$("#txtColoniaAvalP").val(),
        municipioAval:$("#txtMunicipioAvalP").val(),
        cuenta:$("#txtCuentaP").val(),
        promotor:$("#cmbPromotorP").val(),
        cantidad:$("#txtCantidadP").val(),
        pagos:$("#txtPagosP").val(),
        fecha:$("#txtFechaP").val()},
          function(data) {
                $("#notificacion").html(data);
    });
}

function consultarDatosPrestamo(){   
    var url = "consultar_prestamo.php";
    $.post(url, 
        {nombreCuenta:$("#txtNombreCuentaP").val()},
          function(data) {
                $("#notificacion").html(data);
    });
}

function consultarRecibosFaltantesPrestamo(){   
    var url = "recibos_faltantes_promotor.php";
    $.post(url, 
        {nombrePromotor:$("#cmbPromotorCapturaP option:selected").text()},
          function(data) {
                $("#notificacion").html(data);
    });
}

function llenarReciboPrestamo(){   
    var url = "consultar_prestamo_captura.php";
    $.post(url, 
        {nombrePromotor:$("#cmbPromotorCapturaP option:selected").text(),
        codigoBarras:$("#txtCodigoBarrasP").val()},
          function(data) {
                $("#notificacion").html(data);
    });
}

function calcularSaldoActual(){   
   var saldoAnterior = 0;

   var saldoAnteriorTemp = document.getElementById("tdSaldoAnteriorP").value;
   if(true)
   {
    saldoAnterior = document.getElementById("tdSaldoAnteriorP").value;
   }
   
   var pago = 0;
   var pagoTemp = document.getElementById("txtImportePagadoP").value;
   if(true)
   {
    pago = document.getElementById("txtImportePagadoP").value;
   }

   var saldoActual = saldoAnterior - pago;
   if(saldoActual >= 0)
   {
        $("#tdSaldoActualP").val(saldoActual);
   }
   else
   {
        Swal.fire({
            title: 'Cantidad Incorrecta',
            text: 'La cantidad que ha ingresado está desfasada. Compruebe la cifra y vuelva a intentarlo',
            type: 'error',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            animation: true
            }).then(function() {
                $("#txtImportePagadoP").val('');
                calcularSaldoActual();
        }); 
   }
}

function capturarPagoPrestamo(){   
    var url = "capturar_pago_prestamo.php";
    $.post(url, 
        {importePagado:$("#txtImportePagadoP").val(),
            recibosFaltantes:$("#txtRecibosFaltantesP").val(),
            recibosIngresados:$("#txtRecibosIngresadosP").val(),
            promotor:$("#cmbPromotorCapturaP").val(), //
            saldo:$("#tdSaldoActualP").val(), 
            recibo:$("#tdReciboP").val(), 
            abonos:$("#tdImporteP").val(),
            prestamo:$("#tdPrestamoP").val(),
            importePagosVencidos:$("#tdImportePagosVencidosP").val(), 
            numeroCuenta:$("#txtCodigoBarrasP").val()},
          function(data) {
                $("#notificacion").html(data);
    });
}

function login(){   
    var url = "logeo.php";
    $.post(url, 
        {nombreUsuario:$("#txtUsername").val(),
            contrasena:$("#txtPassword").val()},
          function(data) {
                $("#notificacion").html(data);
    });
}