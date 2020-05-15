<?php
    error_reporting(E_ALL);
    date_default_timezone_set('America/Mexico_City');
?>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estiloProductos.css">
        <link rel="stylesheet" href="css/estiloTabla.css">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <title>Gabana Muebles</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    </head>
    <?php
        include("conexion.php");
    ?>

<?php
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
  ?>

    <body>
<div id="notificacion">

</div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="25" height="25" class="d-inline-block align-top" alt="">
    Gabana Muebles
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Productos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.html">Contacto</a>
                  </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtrar
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Salas</a>
                    <a class="dropdown-item" href="#">Comedores</a>
                    <a class="dropdown-item" href="#">Recamaras</a>
                    <a class="dropdown-item" href="#">Cocina</a>
                    <a class="dropdown-item" href="#">Oficina</a>
                    <a class="dropdown-item" href="#">Jard&iacute;n</a>
                  </div>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </div>
          </nav>
<br>
          <!-- CONTENIDO DE LA PÁGINA -->
<br><br>
          <p class="d-flex justify-content-center">
              <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapsePrestamos" aria-expanded="false" aria-controls="collapsePrestamos" id="btnPrestamos">
                  Pr&eacute;stamos
              </button>&nbsp;&nbsp;
              <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseMuebleria" aria-expanded="false" aria-controls="collapseMuebleria" id="btnMuebleria">
                  Muebler&iacute;a
                </button>&nbsp;&nbsp;<button class="btn btn-warning" type="button" data-target="#collapseMuebleria" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                  </button>&nbsp;&nbsp;  
                <button class="btn btn-warning" type="button" data-target="#collapseMuebleria" aria-expanded="false">
                <a href="login.html" style="color:black;"> <i class="fa fa-sign-out"></i></a>
                  </button>      
            </p>
            <div class="collapse" id="collapsePrestamos">
              <div class="card card-body">
                  <div class="d-flex justify-content-center">
                      <p style="font-size: 19px;"><b><i class="fa fa-money"></i> &Aacute;rea de Pr&eacute;stamos</b></p>
                    </div>
                  <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-nuevop-tab" data-toggle="tab" href="#nav-nuevop" role="tab" aria-controls="nav-nuevop" aria-selected="true">Nuevo</a>
                        <a class="nav-item nav-link" id="nav-consultap-tab" data-toggle="tab" href="#nav-consultap" role="tab" aria-controls="nav-consultap" aria-selected="false">Consulta</a>
                        <a class="nav-item nav-link" id="nav-pagop-tab" data-toggle="tab" href="#nav-pagop" role="tab" aria-controls="nav-pagop" aria-selected="false">Pago</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-nuevop" role="tabpanel" aria-labelledby="nav-nuevop-tab">
                          <br> 
                            <!--DATOS DEL CLIENTE-->
                            <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Cliente</span> </div>
                          <div class="row">
                              <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Nombre</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" required id="txtNombreP" autocomplete="off">
                                      <div class="invalid-feedback">
                                          Please choose a username.
                                        </div>
                                    </div> 
                              </div>
                              <div class="col-md-4" >     
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">Tel&eacute;fono</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon4" required id="txtTelefonoP" autocomplete="off">
                                      <div class="invalid-feedback">
                                          Please choose a username.
                                        </div>
                                    </div> 
                              </div>
                              <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">Calle</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon4" required id="txtCalleP" autocomplete="off">
                                      <div class="invalid-feedback">
                                          Please choose a username.
                                        </div>
                                    </div> 
                            </div>
                            </div>
  
                            <div class="row">
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon5">N&uacute;mero</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon5" required id="txtNumeroP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                                </div>
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon6">Colonia</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon6" required id="txtColoniaP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                                </div>
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon7">Municipio, Estado</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon7" value="Irapuato, Gto." required id="txtMunicipioP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                              </div>
                              </div>
  
                              <div class="row">
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon8">Historial</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon8" value="Nuevo Cliente" required id="txtHistorialP" autocomplete="off">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-8" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon9">Comentarios</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon9" required id="txtComentariosP" autocomplete="off">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                </div>
                                </div>
                              </div>
  
                              <!--DATOS DEL AVAL-->
                              <br>
                              <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                  <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Aval</span> </div>
                            <div class="row">
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon10">Nombre</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon10" required id="txtNombreAvalP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                                </div>
                                <div class="col-md-4" >     
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon11">Tel&eacute;fono</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon11" required id="txtTelefonoAvalP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                                </div>
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon12">Calle</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon12" required id="txtCalleAvalP" autocomplete="off">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                              </div>
                              </div>
    
                              <div class="row">
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon13">N&uacute;mero</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon13" required id="txtNumeroAvalP" autocomplete="off">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon14">Colonia</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon14" required id="txtColoniaAvalP" autocomplete="off">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon15">Municipio, Estado</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon15" value="Irapuato, Gto." required id="txtMunicipioAvalP" autocomplete="off">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                </div>
                                </div>
                                </div>
  
                                 <!--DATOS DEL PRÉSTAMO-->
                              <br>
                              <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                  <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Pr&eacute;stamo</span> </div>
                            <div class="row">
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon16">No. Cuenta</span>
                                        </div>
                                        <?php 
                                        $query = "Select max(Numero_Cuenta) + 1 from Detalles_Prestamo";
                                        $resultado = $conexion->query($query);
                                        while($row=$resultado->fetch_assoc())
                                            {
                                                $strCuenta = $row['max(Numero_Cuenta) + 1'];
                                            }
                                            if(!is_null($strCuenta) || !empty($strCuenta))
                                            {
                                                $strCuenta = concatenarCuenta($strCuenta);
                                            }
                                            else{
                                                $strCuenta = concatenarCuenta('1');
                                            }
                                        ?>
                                        <input type="text" class="form-control" aria-describedby="basic-addon16" value="<?php echo $strCuenta; ?>" readonly id="txtCuentaP">
                                      </div> 
                                </div>
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon3">Promotor</span>
                                        </div>
                                        <select id="cmbPromotorP" class="form-control" aria-describedby="basic-addon3">
                                            <?php
                                            $query = "SELECT id_Promotor,Nombre FROM Promotor WHERE Estatus = 1";
                                            $resultado = $conexion->query($query);
                                            
                                            while($row=$resultado->fetch_assoc())
                                            {
                                            ?>
                                            <option value="<?php echo $row['id_Promotor']; ?>"><?php echo $row['Nombre']; ?></option>
                                            <?php
                                            }
                                             ?>
                                        </select>
                                      </div> 
                                </div>
                                <div class="col-md-4" >                    
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon18">Cantidad</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon18" required id="txtCantidadP">
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                          </div>
                                      </div> 
                              </div>
                              </div>
    
                              <div class="row">
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon19">Pagos Sem.</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon19" required id="txtPagosP">
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon20">Fecha</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon20" value="<?php echo date('d-m-Y'); ?>" readonly id="txtFechaP">
                                        </div> 
                                  </div>
                                  <div class="col-md-4 text-center">              
                                      <button class="btn btn-warning" onclick="capturaDatosPrestamo()">Guardar</button>
                                  </div>
                                </div>
                                </div><br>
                      </div>
                      
                      <div class="tab-pane fade" id="nav-consultap" role="tabpanel" aria-labelledby="nav-consultap-tab">
                          <br>  
                          <div class="row">
                              <div class="col-lg-4 col-md-3" >      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12">                    
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" placeholder="Nombre / Num. Cuenta" aria-describedby="button-addon2" id="txtNombreCuentaP" autocomplete="off">
                                  <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="button-addon2" onclick="consultarDatosPrestamo()">Buscar</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-3" >  
                              </div>
                          </div>
  
                          <div class="consultaClientes"></div>
                          
                          <form class="needs-validation" novalidate>
                              <!--DATOS DEL CLIENTE-->
                              <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                  <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Cliente</span> </div>
                            <div class="row">
                                <div class="col-md-4" >                    
                                <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Nombre</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtNombrePC">
                                    </div> 
                                </div>
                                <div class="col-md-4" >                    
                                <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Direcci&oacute;n</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtDireccionPC">
                                    </div> 
                                </div>
                                <div class="col-md-4" >                    
                                <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Tel&eacute;fono</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtTelefonoPC">
                                    </div> 
                              </div>
                              </div>
    
                                <div class="row">
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Historial</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtHistorialPC">
                                    </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Comentarios</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtComentariosPC">
                                    </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Estatus Jur&iacute;dico</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtEstatusPC">
                                    </div> 
                                </div>
                                  </div>
                                </div>
    
                                <!--DATOS DEL AVAL-->
                                <br>
                                <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Aval</span> </div>
                              <div class="row">
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Nombre</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtNombreAvalPC">
                                    </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Direcci&oacute;n</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtDireccionAvalPC">
                                    </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Tel&eacute;fono</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtTelefonoAvalPC">
                                    </div> 
                                </div>
                                </div>
                                  </div>
    
                                   <!--DATOS DEL PRÉSTAMO-->
                                <br>
                                <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Pr&eacute;stamo</span> </div>
                              <div class="row">
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">No. Cuenta</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtCuentaPC">
                                    </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Promotor</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtPromotorPC">
                                    </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Pr&eacute;stamo</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtPrestamoPC">
                                    </div> 
                                </div>
                                </div>
  
                                <div class="row">
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Pagos Semanales</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtPagosPC">
                                    </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Importe Atrasado</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtImporteAtrasadoPC">
                                    </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Saldo</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtSaldoPC">
                                    </div> 
                                  </div>
                                  </div>
      
                                <div class="row">
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">No. Semana</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtSemanaPC">
                                    </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Fecha</span>
                                      </div>
                                      <input type="text" class="form-control" aria-describedby="basic-addon3" readonly id="txtFechaPC">
                                    </div> 
                                    </div>
                                    <div class="col-md-4 text-center">            
                                        <button class="btn btn-warning btnEdoCuentaP" data-toggle="modal" data-target=".bd-example-modal-xl" type="button" id="btnEdoCuentaP">Edo. Cuenta</button>
                                        <button class="btn btn-warning" id="btnModificarP">Modific.</button>
                                    </div>
                                  </div>
                                  </div>
                            </form>
                      </div>

                      <div class="tab-pane fade" id="nav-pagop" role="tabpanel" aria-labelledby="nav-pagop-tab">
                          <br>
                          <div class="row">
                              <div class="col-lg-4 col-md-6 col-sm-12" >  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon3">Promotor</span>
                                    </div>
                                    <select id="cmbPromotorCapturaP" class="form-control" aria-describedby="basic-addon3" onchange="consultarRecibosFaltantesPrestamo()" >
                                    <?php
                                            $query = "SELECT id_Promotor,Nombre FROM Promotor WHERE Estatus = 1";
                                            $resultado = $conexion->query($query);
                                            
                                            while($row=$resultado->fetch_assoc())
                                            {
                                            ?>
                                        <option value="<?php echo $row['id_Promotor']; ?>"><?php echo $row['Nombre']; ?></option>
                                        <?php
                                            }
                                        ?>
                                        
                                    </select>
                                  </div>       
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12">                    
                                <div class="input-group mb-3" id="divBuscar">
                                  <input type="number" class="form-control" placeholder="N&uacute;mero de Cuenta" aria-describedby="btnBuscarPago" id="txtCodigoBarrasP" autocomplete="off">
                                  <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="btnBuscarPago" onclick="llenarReciboPrestamo()">Buscar</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-3" >  
                              </div>
                          </div>
  
                          <div class="consultaClientes2"></div>

                          <div style="border: 1px solid #fcb26e; padding-top:15px; padding-left: 10px; padding-right: 10px;" class="item-box-blog-image">
                            <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Pago</span> </div>

                            <div class="row">
                              <div class="col-lg-4 col-md-3" >      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12">                    
                                <div class="input-group mb-3" id="divGuardarPago">
                                  <input type="number" class="form-control" placeholder="Importe pagado a este recibo" aria-describedby="button-addon2" id="txtImportePagadoP" oninput="calcularSaldoActual()">
                                  <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="button-addon2" onclick="capturarPagoPrestamo()">Guardar</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4 col-md-3" >  
                              </div>
                          </div>

                          <div class="row" style="margin-bottom: 13px;">
                          <div class="col-md-5 col-sm-6 col-12">
                            <b><label>Nombre</label></b>
                            <input type="text" class="form-control" id="tdNombreP" readonly>
                          </div>
                          <div class="col-md-2 col-sm-6 col-6">
                            <b><label>Recibo</label></b>
                            <input type="text" class="form-control" id="tdReciboP" readonly>
                          </div>
                          <div class="col-md-2 col-sm-6 col-6">
                            <b><label>Importe</label></b>
                            <input type="text" class="form-control" id="tdImporteP" readonly>
                          </div>
                          <div class="col-md-3 col-sm-6 col-6">
                            <b><label>Saldo Actual</label></b>
                            <input type="text" class="form-control" id="tdSaldoActualP" readonly>
                          </div>
                             
                          </div>

                          </div>

                          <br>

                          <div style="border: 1px solid #fcb26e; padding-top:15px; padding-left: 10px; padding-right: 10px;" class="item-box-blog-image">
                              <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Detalles</span> </div>
  
                            <div class="row" style="margin-bottom: 0px;">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>No. Cuenta</label></b>
                                <input type="text" class="form-control" id="tdCuentaP" readonly>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>Pr&eacute;stamo</label></b>
                                <input type="text" class="form-control" id="tdPrestamoP" readonly>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>Fecha Pr&eacute;stamo</label></b>
                                <input type="text" class="form-control" id="tdFechaP" readonly>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>Pagos Vencidos</label></b>
                                <input type="text" class="form-control" id="tdPagosVencidosP" readonly>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>Imp. Pag. Venc.</label></b>
                                <input type="text" class="form-control" id="tdImportePagosVencidosP" readonly>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <b><label>Saldo Anterior</label></b>
                                <input type="text" class="form-control" id="tdSaldoAnteriorP" readonly>
                              </div>
                            </div>
  
                            </div>

                            <br>

                          <div style="border: 1px solid #fcb26e; padding-top:15px; padding-left: 10px; padding-right: 10px;" class="item-box-blog-image">
                              <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Recibos</span> </div>
  
                            <div class="row" style="margin-bottom: 13px;">
                                <div class="col-lg-4 col-md-5 col-sm-4 col-12" >  
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="id1">Faltantes</span>
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="id1" readonly id="txtRecibosFaltantesP">
                                      </div>     
                                  </div>
                                  <div class="col-lg-4 col-md-5 col-sm-5 col-12">                    
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="id2">Ingresados</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="id2" readonly id="txtRecibosIngresadosP">
                                        </div>  
                                  </div>
                                  <div class="col-lg-4 col-md-2 col-sm-3 col-12 text-center">                    
                                    <button class="btn btn-warning" id="">Faltantes</button>
                                  </div>
                            </div>
  
                            </div>
                            <br>

                    </div>
              </div>
            </div>  
            </div> 

            <div class="collapse" id="collapseMuebleria">
                <div class="card card-body">
                    <div class="d-flex justify-content-center">
                        <p style="font-size: 19px;"><b><i class="fa fa-television"></i> &Aacute;rea de Muebler&iacute;a</b></p>
                      </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab2" role="tablist">
                          <a class="nav-item nav-link active" id="nav-nuevom-tab" data-toggle="tab" href="#nav-nuevom" role="tab" aria-controls="nav-nuevom" aria-selected="true">Nuevo</a>
                          <a class="nav-item nav-link" id="nav-consultam-tab" data-toggle="tab" href="#nav-consultam" role="tab" aria-controls="nav-consultam" aria-selected="false">Consulta</a>
                          <a class="nav-item nav-link" id="nav-pagom-tab" data-toggle="tab" href="#nav-pagom" role="tab" aria-controls="nav-pagom" aria-selected="false">Pago</a>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent2">
                        <div class="tab-pane fade show active" id="nav-nuevom" role="tabpanel" aria-labelledby="nav-nuevom-tab">
                          <br> 
                          <form class="needs-validation" novalidate>
                                <!--DATOS DEL CLIENTE-->
                                <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                    <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Cliente</span> </div>
                              <div class="row">
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">Nombre</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon3" required>
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-4" >     
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon4">Tel&eacute;fono</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon4" required>
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                  </div>
                                  <div class="col-md-4" >                    
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon4">Calle</span>
                                          </div>
                                          <input type="text" class="form-control" aria-describedby="basic-addon4" required>
                                          <div class="invalid-feedback">
                                              Please choose a username.
                                            </div>
                                        </div> 
                                </div>
                                </div>
      
                                <div class="row">
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon5">N&uacute;mero</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon5" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon6">Colonia</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon6" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon7">Municipio, Estado</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon7" value="Irapuato, Gto." required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                  </div>
                                  </div>
      
                                  <div class="row">
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon8">Historial</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon8" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                      </div>
                                      <div class="col-md-8" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon9">Comentarios</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon9" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                    </div>
                                    </div>
                                  </div>
      
                                  <!--DATOS DEL AVAL-->
                                  <br>
                                  <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                      <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Aval</span> </div>
                                <div class="row">
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon10">Nombre</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon10" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >     
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon11">Tel&eacute;fono</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon11" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon12">Calle</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon12" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                  </div>
                                  </div>
        
                                  <div class="row">
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon13">N&uacute;mero</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon13" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                      </div>
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon14">Colonia</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon14" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                      </div>
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon15">Municipio, Estado</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon15" value="Irapuato, Gto." required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                    </div>
                                    </div>
                                    </div>
      
                                     <!--DATOS DEL PRÉSTAMO-->
                                  <br>
                                  <div style="border: 1px solid #fcb26e; padding:15px;" class="item-box-blog-image">
                                      <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">Venta</span> </div>
                                <div class="row">
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon16">No. Cuenta</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon16" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon16">Art&iacute;culo</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon16" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                    </div>
                                    <div class="col-md-4" >                    
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon18">Precio</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon18" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                          </div> 
                                  </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon16">Pagos Sem.</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon16" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div> 
                                      </div>
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Vendedor</span>
                                              </div>
                                              <select id="basic-url" class="form-control" aria-describedby="basic-addon3">
                                                  <option value=""></option>
                                                  <option value="Administrador">Administrador</option>
                                                  <option value="Servicio">Promotor 1</option>                                                
                                                  <option value="Técnico - Hardware">Promotor 2</option> 
                                                  <option value="Técnico - Software">Promotor 3</option>
                                                  <option value="C. Mayoreo">Promotor 4</option> 
                                              </select>
                                            </div> 
                                      </div>
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">D&iacute;a Pago</span>
                                              </div>
                                              <select id="basic-url" class="form-control" aria-describedby="basic-addon3">
                                                  <option value=""></option>
                                                  <option value="Administrador">Domingo</option>
                                                  <option value="Servicio">Lunes</option>                                                
                                                  <option value="Técnico - Hardware">Martes</option> 
                                                  <option value="Técnico - Software">Mi&eacute;rcoles</option>
                                                  <option value="C. Mayoreo">Jueves</option> 
                                                  <option value="Administrador">Viernes</option>
                                                  <option value="Administrador">S&aacute;bado</option>
                                              </select>
                                            </div> 
                                    </div>
                                    </div>
        
                                  <div class="row">
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Zona</span>
                                              </div>
                                              <select id="basic-url" class="form-control" aria-describedby="basic-addon3">
                                                  <option value=""></option>
                                                  <option value="Servicio">1</option>                                                
                                                  <option value="Técnico - Hardware">2</option> 
                                                  <option value="Técnico - Software">3</option>
                                                  <option value="C. Mayoreo">4</option> 
                                                  <option value="Administrador">5</option>
                                                  <option value="Administrador">6</option>
                                                  <option value="Administrador">7</option>
                                                  <option value="Administrador">8</option>
                                                  <option value="Administrador">9</option>
                                                  <option value="Administrador">10</option>
                                              </select>
                                            </div>  
                                      </div>
                                      <div class="col-md-4" >                    
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon16">Pagos Sem.</span>
                                              </div>
                                              <input type="text" class="form-control" aria-describedby="basic-addon16" required>
                                              <div class="invalid-feedback">
                                                  Please choose a username.
                                                </div>
                                            </div>
                                      </div>
                                      <div class="col-md-4" >              
                                          <button class="btn btn-warning" type="submit">Guardar</button>
                                      </div>
                                    </div>
                                    </div>
                              </form>
                        </div>
                        <div class="tab-pane fade" id="nav-consultam" role="tabpanel" aria-labelledby="nav-consultam-tab">dos m</div>
                        <div class="tab-pane fade" id="nav-pagom" role="tabpanel" aria-labelledby="nav-pagom-tab">tres m</div>
                      </div>
                </div>
              </div>

<div class="footer fixed-bottom">
    <div class="textoFooter">
        Desarrollado por <b>Teracrom</b> 2019
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="modalPrestamos">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">Estado de Cuenta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                
            <div id="wrapper">


                                  <table id="tablaEstadoCuenta" class="table">
                                    <thead>
                                    <tr>
                                       <th width="10%">No.</th>
                                       <th width="20%">Fecha</th>
                                       <th width="10%">Recibo</th>
                                       <th width="25%">Concepto</th>
                                       <th width="15%">Abono</th>
                                       <th width="20%">Saldo</th>
                                    </tr>
                                   </thead> 
                                   <tbody>
                                    <tr>
                                      <td>
                                        01
                                      </td>
                                      <td>
                                        03-05-2019
                                      </td>
                                      <td>
                                        0899
                                      </td>
                                      <td>
                                      Pago a Cobrador
                                      </td>
                                      <td>
                                      $600
                                      </td>
                                      <td>
                                      $5000
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        02
                                      </td>
                                      <td>
                                        23-05-2019
                                      </td>
                                      <td>
                                        0900
                                      </td>
                                      <td>
                                      Pago a Cobrador
                                      </td>
                                      <td>
                                      $600
                                      </td>
                                      <td>
                                      $4400
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        03
                                      </td>
                                      <td>
                                        31-05-2019
                                      </td>
                                      <td>
                                        0901
                                      </td>
                                      <td>
                                      Pago a Cobrador
                                      </td>
                                      <td>
                                      $600
                                      </td>
                                      <td>
                                      $3800
                                      </td>
                                    </tr>
                                   </tbody>
                                
                                  </table> 
                                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              </div>
      </div>
    </div>
  </div>


        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/popper.min.js" type="text/javascript"></script>
        <script src="js/stacktable.js" type="text/javascript"></script>
        <script src="js/acciones_prestamos.js" type="text/javascript"></script>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();

            $(document).ready(function(){
//cmbPromotorCapturaP
document.getElementById("cmbPromotorCapturaP").selectedIndex = "-1";

              document.getElementById('btnEdoCuentaP').disabled=true;
              document.getElementById('btnModificarP').disabled=true;

              $("#divBuscar *").prop('disabled',true);
              $("#divGuardarPago *").prop('disabled',true);

  $("#btnPrestamos").click(function(){
    $("#collapseMuebleria").collapse('hide');
  });

  $("#btnMuebleria").click(function(){
    $("#collapsePrestamos").collapse('hide');
  });

});

            </script>

<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js"><\/script>')</script>



<script>
  $('#tablaPagoP').cardtable();
  $('#card-table2').cardtable();
  $('#tablaEstadoCuenta').cardtable();
</script>

    </body>
</html>