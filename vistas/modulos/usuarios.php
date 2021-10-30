<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Personal
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      
      <li class="active">Administrar personal/usuarios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1))">
          
          Agregar Personal / Usuarios

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Usuario</th>
           <th>Documento</th>
           <th>Identificación</th>
           <th>Telefono</th>
           <th>Cumpleaños</th>
           <th>Contrato</th>
           <th>Ingreso</th>
           <th>Foto</th>
           <th>Perfil</th>
           <th>Estado</th>
           <th>Último Acceso</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>
                  <td>'.$value["tipodoc"].'</td>
                  <td>'.$value["numident"].'</td>
                  <td>'.$value["telefono"].'</td>
                  <td>'.$value["fechanac"].'</td>
                  <td>'.$value["contrato"].'</td>
                  <td>'.$value["fecingreso"].'</td>

                  ';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/default.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["perfil"].'</td>';
                  

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar personal/usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombres y Apellidos" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL NICK USUARIO -->

            <div class="form-group row">

             <div class="col-xs-6">
  
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Nombre de Acceso" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO DOCUMENTO -->

            <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span> 

                <select class="form-control input-lg" name="nuevoTipodoc">
                  
                  <option value="">Tipo de Documento</option>

                  <option value="NIT">NIT</option>

                  <option value="C.C.">C.C.</option>

                  <option value="RUT">RUT</option>

                  <option value="NUIP">NUIP</option>

                  <option value="C.E">C.E.</option>

                </select>

              </div>

            </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIFICACION -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-list-alt"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoNumident" placeholder="Número Documento" id="nuevoNumident" required>

              </div>

            </div>

             <!-- ENTRADA PARA EL NUMERO DE TELEFONO -->

            <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999)-999-9999'" data-mask required>

              </div>

            </div>

          </div>

          <!-- ENTRADA PARA EL NUMERO DE CUMPLEAÑOS -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group date dp-date">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
              
                <input type="text" class="form-control input-lg" name="nuevoFechanac" placeholder="Cumpleaños" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>


             <!-- ENTRADA PARA EL TIPO DE CONTRATO -->

           <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-tags"></i></span> 

                <select class="form-control input-lg" name="nuevoContrato">
                  
                  <option value="">Tipo de Contrato</option>

                  <option value="Laboral">Laboral</option>

                  <option value="O.P.S.">O.P.S.</option>

                  <option value="Horas">Horas</option>
                
                </select>

              </div>

             </div>

            </div>

             <!-- ENTRADA PARA EL FECHA DE INGRESO -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group date dp-date">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
              
                <input type="text" class="form-control input-lg" name="nuevoFecingreso" placeholder="Fecha Ingreso" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="col-xs-6">

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

           </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="col-xs-6">
              
               <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar Perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            </div>

             </div>

            
            <!-- ENTRADA PARA SUBIR FOTO -->
            

            <div class="form-group">
              
              <div class="input-group">
                       
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/default.png" class="img-thumbnail previsualizar" width="100px">

            </div>

             </div>

             </div>
    
            </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" readonly>

              </div>

            </div>

         <!-- ENTRADA PARA EL NICK USUARIO -->

            <div class="form-group row">

             <div class="col-xs-6">
  
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO DOCUMENTO -->

            <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarTipodoc">
                  
                  <option value="" id="editarTipodoc">Tipo de Documento</option>

                  <option value="NIT">NIT</option>

                  <option value="C.C.">C.C.</option>

                  <option value="RUT">RUT</option>

                  <option value="NUIP">NUIP</option>

                  <option value="C.E.">C.E.</option>

                </select>

              </div>

            </div>

            </div>

            <!-- ENTRADA PARA EL NUMERO DE IDENTIFICACION -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" class="form-control input-lg" name="editarNumident" id="editarNumident" placeholder="Nuevo Documento" readonly>

              </div>

            </div>

             <!-- ENTRADA PARA EL NUMERO DE TELEFONO -->

            <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <input type="text" class="form-control input-lg" id="editarTelefono" name="editarTelefono" id="editarTelefono" placeholder="Nuevo Telefono" data-inputmask="'mask':'999-999-9999'" data-mask required>
             
              </div>

            </div>

          </div>

          <!-- ENTRADA PARA EL NUMERO DE CUMPLEAÑOS -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group date dp-date">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
               
                <input type="text" class="form-control input-lg" name="editarFechanac" id="editarFechanac" placeholder="Cumpleaños" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

             <!-- ENTRADA PARA EL TIPO DE CONTRATO -->

           <div class="col-xs-6">
                          
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarContrato">
                  
                  <option value="" id="editarContrato">Tipo de Contrato</option>

                  <option value="Laboral">Laboral</option>

                  <option value="O.P.S.">O.P.S.</option>

                  <option value="Horas">Horas</option>
                
                </select>

              </div>

             </div>

            </div>

             <!-- ENTRADA PARA FECHA DE INGRESO -->
          <div class="form-group row">

            <div class="col-xs-6">
                        
              <div class="input-group date dp-date">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                
                <input type="text" class="form-control input-lg" name="editarFecingreso" id="editarFecingreso" placeholder="Fecha Ingreso" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask readonly>

              </div>

            </div>

              <!-- ENTRADA PARA LA CONTRASEÑA -->
        
             <div class="col-xs-6">

             <div class="form-group">
            
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

             </div>

            </div>

          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            

            <div class="form-group">

              <div class="col-xs-6">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPerfil">
                  
                  <option value="" id="editarPerfil">Selecionar Perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>
    
            </div>

             </div>

      
            <!-- ENTRADA PARA FOTO -->


             <div class="form-group">

              <div class="input-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

           </div>

          </div>
           
         </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" >Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


