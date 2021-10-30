<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Examenes Fisicos del Paciente
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes / Pacientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombres</th>
           <th>Apellidos</th>
           <th>Documento ID</th>
           <th>Género</th>
           <th>Exámenes Fisicos</th>
           <th>Acciones</th>
                      

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
          
          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["apellidos"].'</td>

                    <td>'.$value["documento"].'</td>

                    <td>'.$value["genero"].'</td>

                                      
                    <td align="center">

                      <div class="btn-group">
                          
                        <button class="btn btn-info" data-toggle="modal" data-target="#modalagregarExamenesFisicos"><i class="fa fa-stethoscope"></i></button>';

                       echo '</div></td>

                    <td align="center">

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarAntecedentes" data-toggle="modal" data-target="#modalEditarAntecedentes" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';
                      
                        echo '<button class="btn btn-primary btnPdfAntecedentes" idCliente="'.$value["id"].'"><i class="fa fa-file-pdf-o"></i></button>';

              };

          ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================================================================================================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente/pacientes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NOMBRES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar Nombres" required>

              </div>

            </div>

                 <!-- ENTRADA PARA EL APELLIDOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellidos" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

                  <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
               <div class="input-group date dp-date">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>
        
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>

<!--==================================================================================================================================================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                
                <input type="hidden" id="idCliente" name="idCliente">
              
              </div>

            </div>


             <!-- ENTRADA PARA APELLIDOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarApellidos" id="editarApellidos" required>
                
              </div>

            </div>


            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>


             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
               <div class="input-group date dp-date">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>
    </div>

  </div>

</div>

<!--==================================================================================================================================================================
MODAL ANTECEDENTES
======================================-->

<div id="modalagregarAntecenetes" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 80%;">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Antecedentes del cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NOMBRES -->

            <div class="col-xs-12">
             
              <table class="table table-bordered table-striped dt-responsive tablas">

                <h4 align="center"><b>Datos del Paciente</b></h4>

              <tr><td><b>Nombres</b></td>

                  <td><input type="text" class="form-control input-sm" name="editarCliente" id="editarCliente" readonly>

                      <input type="hidden" id="idCliente" name="idCliente"></td>

             <!-- ENTRADA PARA EL APELLIDOS -->

                  <td><b>Apellidos</b></td>

                  <td><input type="text" class="form-control input-sm" name="editarApellidos" id="editarApellidos" readonly></td>
                  
             <!-- ENTRADA PARA LA IDENTIFICACION -->

                  <td><b>Identificación</b></td>

                  <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" readonly></td></tr>

             <!-- DATOS DE LA CONSULTA -->

              <tr><td><b>Genero</b></td>

                  <td><select class="form-control input-xs inline" name="nuevoMotivoConsulta">

                          <option value="">Seleccione el género</option>

                          <option value="masculino">Masculino</option>

                          <option value="femenino">Femenino</option>

                          <option value="otrogenero">Otro</option>

                      </select></td>

                    <td><b>Motivo de la Consulta</b></td>
                    
                    <td><select class="form-control input-xs inline" name="nuevoMotivoConsulta">
                  
                          <option value="">Seleccione el motivo</option>

                          <option value="option1">Tratamiento Estético</option>

                          <option value="option2">Reduccion de Cintura</option>

                          <option value="option3">Otros</option>

                        </select></td>

                    <td><b>Fecha de Consulta</b></td>

                    <td><input type="date" name="nuevoFechaConsulta" id="nuevoFechaConsulta" style="width: 100%" required></td></tr>

              </table>

            </div>
           
       <!--=====================================
        MENU PESTAÑAS ANTECEDENTES
        ========================================-->
          
      <div class="tab-content">

          <!-- ENTRADA PARA ANTECEDENTES FAMILIARES -->

              <div class="col-xs-12">
             
                <div class="form-check form-check-inline">

                <h4 align="center"><b>Antecedentes del Paciente</b></h4>

                <b>Familiares</b>

                <table class="table table-bordered table-striped dt-responsive tablas">
              
                <tr><td><input class="form-check-input" type="checkbox" id="nuevoObesidad" value="obesidad"> Obesidad</td>

                <td><input class="form-check-input" type="checkbox" id="nuevoPsicologicos" value="psicologicos"> Psicologicos</td>
                
                <td><input class="form-check-input" type="checkbox" id="nuevoDiabetes" value="diabetes"> Diabetes</td></tr>
                
                <tr><td><input class="form-check-input" type="checkbox" id="nuevoEdemas" value="edemas"> Edemas</td>

                <td><input class="form-check-input" type="checkbox" id="nuevoHiperpigmentaciones" value="hiperpigmentaciones"> Hipotiroidismo</td>
          
                <td><input class="form-check-input" type="checkbox" id="nuevoHipotiroidismo" value="hipotiroidismo"> Hiperpigmentaciones</td></tr>

                <tr><td><input class="form-check-imput" type="checkbox" id="nuevoCancer"> Cancer</td>

                <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Tipo de Cancer</option>

                      <option value="Gastricos">Gastricos</option>

                      <option value="Neuronales">Neuronales</option>

                      <option value="Uterino">Uterino</option>

                      <option value="Mama">Mama</option>

                      <option value="Leucemias">Leucemias</option>

                      <option value="GenUrinario">Genito Urinario</option>

                      <option value="Respiratorios">Respiratorios</option>

                      <option value="Melanoma">Melanoma</option>

                    </select>

                    <br>
                               
                    <select class="form-control input-xs" name="nuevoTipoCancer">
                        
                        <option value="">Quien lo padece?</option>

                        <option value="Gastricos">Padre</option>

                        <option value="Melanoma">Madre</option>

                        <option value="Neuronales">Tios</option>

                        <option value="Uterino">Abuelos</option>

                        <option value="Mama">Hijos</option>

                        <option value="Leucemias">Primos</option>

                        <option value="GenUrinario">Hermano(a)</option>

                        <option value="Respiratorios">Sobrinos</option>

                    </select></td>

                <td>

                   <textarea class="form-control" aria-label="textareaBiocosmetico" placeholder="Otros Antecedentes Familiares" style="resize: vertical; height: 88px;"></textarea>

                  </td></tr>

                </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE HABITOS-->          
           
            <div class="col-xs-12">

            <b>Habitos</b>

            <table class="table table-bordered table-striped dt-responsive tablas">

              <tr><td><input type="hidden">Evacuación Intestinal</input></td>

                  <td><select class="form-control input-xs" name="nuevoEvacIntestinal">

                          <option value="">Elija una opción</option>

                          <option value="BienEvaIntestinal">Bien</option>

                          <option value="RegularEvaIntestinal">Regular</option>

                          <option value="MalEvaIntestinal">Mal</option>

                      </select></td>

                  <td><input type="hidden" name="evaurinaria">Evacuación Urinaria</input></td>

                  <td><select class="form-control input-xs" name="nuevoEvaUrinaria">
                      
                          <option value="">Elija una opción</option>

                          <option value="BienEvacUrinaria">Bien</option>

                          <option value="RegularEvacUrinaria">Regular</option>

                          <option value="MalEvacUrinaria">Mal</option>

                      </select></td>

                  <td align="center"><input type="hidden">Actividad Fisica:

                  <input class="form-check-input inline" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                
                  <input type="hidden"> Ejercicio</label>
                
                  <input class="form-check-input inline" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                
                  <input type="hidden"> Sedentarismo</label>
                
                  </td>

                </tr>

              </div>

            </table>

          </div>

        </div> 

        <!-- ENTRADA PARA ANTECEDENTES DE GINECOLOGICOS-->          

        <div class="col-xs-12">

          <div class="form-check form-check-inline">

            <b>Ginecologicos</b>

              <table class="table table-bordered table-striped dt-responsive tablas">

                <tr><td><input type="hidden">Menarquia <input type="number" min="0" name="nuevoMenarquia" placeholder="" id="nuevoMenarquia" style="width: 50px" required> Años</td>

                    <td><input type="hidden">Ciclos

                        <input type="number" min="0" name="nuevoAnos" placeholder="" id="nuevoAnos" style="width: 50px" required>

                        <input type="hidden">X

                        <input type="number" min="0" name="nuevoCiclos" placeholder="" id="nuevoCiclos" style="width: 50px" required> días</td>

                    <td align="center"><input type="hidden">Fecha UM

                        <input type="date" min="0" name="nuevoFechaUM" id="nuevoFechaUM" required>

                        <input type="hidden">Duración

                        <input type="number" min="0" name="nuevoDuracion" placeholder="" id="nuevoDuracion" style="width: 50px" required> días</td></tr>

                <tr><td><input type="hidden">Embarazos

                        <input type="number" min="0" name="nuevoCiclos" placeholder="Gx" id="nuevoGx" style="width: 50px" required>  

                        <input type="hidden">Partos

                        <input type="number" min="0" name="nuevoCiclos" placeholder="" id="nuevoPartos" style="width: 50px" required>

                        <input type="hidden">Abortos

                        <input type="number" min="0" name="nuevoCiclos" placeholder="" id="nuevoGx" style="width: 50px" required></td>

                    <td colspan="2"><input type="hidden">Tipo de Parto:

                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        
                        <input type="hidden"> Natural</label>
                        
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        
                        <input type="hidden"> Cesárea</label></td></tr>

              </table>

            </div>

          </div>

          <!-- ENTRADA PARA ANTECEDENTES DE CARDIO-CIRCULATORIOS-->          

          <div class="col-xs-12">

            <div class="form-check form-check-inline">

              <b>Cardio Circulatorios</b>

                <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                  <tr><td><input class="form-check-input" type="checkbox" id="nuevoInfarto" value="infarto"> Infarto</td>

                      <td><input class="form-check-input" type="checkbox" id="nuevoTaquicardia" value="taquicardia"> Taquicardia</td>

                      <td><input class="form-check-input" type="checkbox" id="nuevoArritmia" value="arritmias"> Arrimias</td>

                      <td><input class="form-check-input" type="checkbox" id="nuevoHemorroides" value="hemorroides"> Hemorroides</td></tr>

                  <tr><td><input class="form-check-input" type="checkbox" id="nuevoAnemia" value="anemia"> Anemia</td>

                      <td><input class="form-check-input" type="checkbox" id="nuevoEdemas2" value="edemas2"> Edemas</td>

                      <td colspan="2"><input class="form-check-input" type="checkbox" id="nuevoVarices" value="varices"> Varices</td></tr>

                </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE RESPIRATORIOS-->          
            
            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Respiratorios</b>

                <table class="table table-bordered table-striped dt-responsive"  style="table-layout: fixed;">

                  <tr><td><input class="form-check-input" type="checkbox" id="nuevoAsma" value="asma"> Asma</td>

                    <td><input class="form-check-input" type="checkbox" id="nuevoBronquitis" value="bronquitis"> Bronquitis</td>

                    <td><input class="form-check-input" type="checkbox" id="nuevoRinitis" value="rinitis"> Rinitis</td>

                    <td><input type="hidden">Cigarrillos <input type="number" min="0" id="nuevoCigarrillos" style="width: 50px" required></td></tr>
              
                </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE DIGESTIVOS--> 

            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Digestivos</b>

                  <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoGastritis" value="gastritis"> Gastritis</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoUlcera" value="bronquitis"> Ulcera</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoDiarrea" value="diarrea"> Diarrea</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoCalculosVesicula" value="calculosvesicula"> Hernias</td></tr>

                        <tr><td><input class="form-check-input" type="checkbox" id="nuevoHernias" value="hernias"> Estreñimiento</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoEstrenimiento" value="estrenimiento"> Calculos Vesiculares</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoHepatitis" value="hepatitis"> Hepatitis</td></tr>

                  </table>

                </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE GENITO URINARIO--> 
          
            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Genito Urinario</b>

                  <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoInfUrinarias" value="infurinarias"> Infecciones Urinarias?</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoMetrorragia" value="metrorragia"> Metrorragia</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoUlcerasCuello" value="ulcerascuello"> Ulceraciones Cuello Tratadas?</td></tr>

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoCalculosRenales" value="calculosrenales"> Calculos Renales</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoFlujoTratado" value="flujotratado"> Flujo Tratado?</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoHisterectomia" value="histerectomia"> Histerectomia</td></tr>

                  </table>

                </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE OSTEO MUSCULARES--> 

            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Osteo Musculares</b>

                  <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoParalisisFacial" value="paralisisfacial"> Paralisis Facial</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoTraumaFacial" value="traumafacial"> Trauma Facial</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoOsteoporosis" value="osteoporosis"> Osteoporosis</td></tr>

                  </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE ENDOCRINOLOGICOS--> 

            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Endrocrinologicos</b>
              
                  <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoDiabetes2" value="diabetes2"> Diabetes</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoHipotiroidismo2" value="hipotiroidismo2"> Hipotiroidismo</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoHipertiroidismo" value="hipertiroidismo"> Hipertiroidismo</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoHipoglicemia" value="hipoglicemia"> Hipoglicemia</td></tr>

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoHirsutismo" value="hirsutismo"> Hirsutismo</td>

                        <td><input type="hidden">Hipertricosis en:<input class="text" id="otraHipertricosis" placeholder="donde?"> </td>

                        <td colspan="2"><input type="hidden">Cambio de voz:<input class="text" id="otraHipertricosis" placeholder="?"></td></tr>

                  </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE ALERGICOS--> 
       
            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Alergicos</b>

                  <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                    <tr><td><input class="form-check-input" type="checkbox" id="nuevoAsma2" value="asma2"> Asma</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoDermatitis" value="dermatitis"> Dermatitis</td>

                        <td><input class="form-check-input" type="checkbox" id="nuevoVarices2" value="varices2"> Varices</td>

                        <td><input type="hidden">Alergia a:<input class="text" id="otraHipertricosis" placeholder="Alergias"></td></tr>

                  </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES DE QUIRURGICOS--> 

            <div class="col-xs-12">
            
               <b>Quirurgicos</b>

                 <table class="table table-bordered table-striped dt-responsive tablas">
                  
                  <tr><td><input type="hidden" style="padding-right:10px">Operado de:

                          <input class="text" id="nuevoOperadode" placeholder="operaciones" style="width:300px"></td>

                      <td><input type="hidden" style="padding-right:10px">Cirugias Plasticas: 

                          <input class="text" id="nuevoCirugiaPlastica" placeholder="Cirugias Plsticas" style="width:300px"></td></tr>

                  </table>

             </div>

            <!-- ENTRADA PARA ANTECEDENTES NUTRICIONALES--> 

            <div class="col-xs-12">

              <b>Nutricionales</b>

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <tr><td><input type="hidden" style="padding-right:10px">Habitos Nutricionales:
                       
                          <select class="form-control input-xs inline" name="nuevoHabitoNutricional" style="width: 240px;">
                            
                            <option value="">Habitos Nutricional</option>

                            <option value="Carnivoro">Carnivoro</option>

                            <option value="Vegetariano">Vegetariano</option>

                            <option value="Omnivoro">Omnivoro</option>

                          </select></td>

                      <td><input type="hidden" style="padding-right:10px">Tipos de Alimentos:

                            <select class="form-control input-xs inline" name="nuevoHabitoNutricional" style="width: 240px;">
                              
                              <option value="">Cúal apetece más?</option>

                              <option value="Carnivoro">Proteinico</option>

                              <option value="Vegetariano">Lipidico</option>

                              <option value="Omnivoro">Carbohidratos</option>

                            </select></td></tr>

                  <tr><td><input type="hidden" style="padding-right:10px">Número de Comidas al día:
  
                          <input type="number" min="0" id="nuevoNumComidas" placeholder="comidas/día"></td>

                      <td><input type="hidden" style="padding-right:10px">Liquidos litros al día:

                          <input type="number" min="0" id="nuevoNumComidas" placeholder="litros/día"></td></tr>

                </table>

            </div>
    
            <!-- ENTRADA PARA ANTECEDENTES BIOCOSMETOLOGICOS--> 
    
            <div class="col-xs-12">
              
              <div class="input-group-prepend">
              
                <b>Biocosmetologicos</b>
        
              </div>
              
                <textarea class="form-control" aria-label="textareaBiocosmetico" style="resize: vertical;" placeholder="Observaciones"></textarea>
          
            </div>
       
            <!-- ENTRADA PARA ANTECEDENTES TRATAMIENTOS ANTICONCEPTIVOS--> 

            <div class="col-xs-12">
              
              <div class="input-group-prepend">

                <br><b>Tratamientos Anticonceptivos</b>

              </div>
              
                <textarea class="form-control" aria-label="textareaAnticonceptivos" style="resize: vertical;" placeholder="Observaciones"></textarea>
          
            </div>

            <!-- ENTRADA PARA ANTECEDENTES OTROS--> 

            <div class="col-xs-12">
              
              <div class="input-group-prepend">

                <br><b>Otros Antecedentes</b>

              </div>
              
                <textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea>
          
            </div>

          </div>

        </div>
  
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-success">PDF ↓</button>

          <button type="submit" class="btn btn-warning">Editar</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

     <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>
    </div>

  </div>

</div>

<!--==========================================================================================================================================================
MODAL EXAMENES FISICOS / SECIONES
======================================-->

<div id="modalagregarExamenesFisicos" class="modal fade" role="dialog">
  
  <div class="modal-dialog" style="width: 80%;">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background: linear-gradient(145deg, rgba(165,51,148,1), rgba(251,107,69,1)); color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Exámenes Fisicos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NOMBRES -->

            <div class="col-xs-12">

              <table class="table table-bordered table-striped dt-responsive tablas">

                <h4 align="center"><b>Datos del Paciente</b></h4>

                <tr><td><b>Nombres</b></td>

                    <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" readonly>

                        <input type="hidden" id="idCliente" name="idCliente"></td>

                        <!-- ENTRADA PARA EL APELLIDOS -->

                    <td><b>Apellidos</b></td>

                    <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" readonly></td>
                  
                        <!-- ENTRADA PARA LA IDENTIFICACION -->

                    <td><b>Identificación</b></td>

                    <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" readonly></td>
             
                        <!-- DATOS DE LA CONSULTA -->

                    <td><b>Genero</b></td>

                    <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" readonly></td></tr>

                    <td><b>Raza</b></td>

                    <td><select class="form-control input-xs inline" name="nuevoMotivoConsulta">

                          <option value="">Seleccione la Raza</option>

                          <option value="masculino">Blanco</option>

                          <option value="femenino">Negro</option>

                          <option value="otrogenero">Mestizo</option>

                          <option value="otrogenero">Muggle</option>

                        </select></td>

                      <td><b>Talla</b></td>
                    
                      <td><input type="text" class="form-control input-sm" name="antecendeteCliente" id="editarCliente" placeholder="eje: 1.50" required></td>

                      <td colspan="2"><b>Fecha de Consulta</b></td>

                      <td colspan="2"><input type="date" name="nuevoFechaConsulta" id="nuevoFechaConsulta" style="width: 100%" required></td></tr>

                </table>

              </div>

              <!-- ENTRADA PARA ESTADO -->

              <div class="tab-content">
  
                <div class="col-xs-12">
             
                  <div class="form-check form-check-inline">

                    <h4 align="center"><b>Examen Fisico</b></h4>

                      <b>Estado</b>

                        <table class="table table-bordered table-striped dt-responsive tablas">
                      
                        <tr><td><input class="form-check-imput" type="hidden" id="nuevoCancer"> Estado General</td>

                            <td><select class="form-control input-xs" name="nuevoTipoCancer">
                              
                                  <option value="">Seleccione</option>

                                  <option value="Gastricos">Bien</option>

                                  <option value="Neuronales">Regular</option>

                                  <option value="Uterino">Mal</option>
                                  
                                </select></td>

                            <td><input class="form-check-imput" type="hidden" id="nuevoCancer"> Estado Nutricional</td>

                            <td><select class="form-control input-xs" name="nuevoTipoCancer">
                              
                                  <option value="">Seleccione</option>

                                  <option value="Gastricos">Bien</option>

                                  <option value="Neuronales">Regular</option>

                                  <option value="Uterino">Mal</option>
                                  
                                </select></td></tr>

                        <tr><td><input class="form-check-imput" type="hidden" id="nuevoCancer"> Estado Biocosmetologico</td>

                            <td><select class="form-control input-xs" name="nuevoTipoCancer">
                              
                                  <option value="">Seleccione</option>

                                  <option value="Gastricos">Bien</option>

                                  <option value="Neuronales">Regular</option>

                                  <option value="Uterino">Mal</option>
                                  
                                </select></td>

                            <td><input class="form-check-imput" type="hidden" id="nuevoCancer"> Estado de las Formas</td>

                            <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                                  <option value="">Seleccione</option>

                                  <option value="Gastricos">Bien</option>

                                  <option value="Neuronales">Regular</option>

                                  <option value="Uterino">Mal</option>
                      
                                </select></td>

                        </table>

                    </div>

                </div>

                <!-- ENTRADA PARA ANTECEDENTES LUGAR A TRATAR-->          
               
                <div class="col-xs-12">

                  <b>Localizacion de los problemas a tratar</b>

                    <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                      <tr><td><input class="form-check-input" type="checkbox" id="nuevoInfarto" value="infarto"> Nuca</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoTaquicardia" value="taquicardia"> Brazos</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoArritmia" value="arritmias"> Gluteos</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoHemorroides" value="hemorroides"> Caderas</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoHemorroides" value="hemorroides"> Muslos</td></tr>

                      <tr><td><input class="form-check-input" type="checkbox" id="nuevoAnemia" value="anemia"> Abdomen</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoEdemas2" value="edemas2"> Senos</td>

                          <td><input class="form-check-input" type="checkbox" id="nuevoVarices" value="varices"> Espalda</td>

                          <td colspan="2"><input type="hidden">Otros <input type="number" min="0" id="nuevoCigarrillos" placeholder="cantidad" required></td></tr>

                    </table>

              </div>

            </div> 

          <!-- ENTRADA PARA ANTECEDENTES DE EVALUACION-->          

     
            <div class="col-xs-12">

             <div class="form-check form-check-inline">

             <b>Evaluación</b>

              <table class="table table-bordered table-striped dt-responsive tablas">

                <tr><td style="width: 30%"><input type="hidden">Flacidez En:</td> 
                     
                <td><textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea></td>

                <tr><td><input type="hidden">Celulitis En:</td> 
                     
                <td><textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea></td>

                <tr><td><input type="hidden">Estrias En:</td> 
                     
                <td><textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea></td>

                <tr><td><input type="hidden">Cicatrices (Ubiquela, Describala, Evolucion y etiologia)</td> 
                     
                <td><textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea></td>

                </tr>

               </table>

             </div>

            </div>

            <!-- ENTRADA PARA MEDIDAS-->          

            <div class="col-xs-12">

              <div class="form-check form-check-inline">

                <b>Medidas</b>

                <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                <tr><th  style="width: 150px; text-align: center;">Ubicación</th>

                  <th colspan="4" style="text-align: center;">Sesion 1</th>

                  <th colspan="4" style="text-align: center;">Sesion 8</th>

                  <th colspan="4" style="text-align: center;">Sesion 15</th>                 

                </tr>

                <tr><td>Medida abdomen</td>

                  <td colspan="2" align="center"><b>A</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>B</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>A</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>B</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>A</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>B</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                </tr>

                <tr><td>Medida muslos</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                </tr>

                <tr><td>Medida brazos</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>I</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                  <td colspan="2" align="center"><b>D</b>

                  <input type="number" min="0" id="nuevoCigarrillos" style="width: 45px;" required> cm.</td>

                </tr>

                <tr><td>Medida cintura</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>
                  
                </tr>

                <tr><td>Medida gluteos</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> cm.</td>
                  
                </tr>

                <tr><td>Peso</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> Kg.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> Kg.</td>

                  <td colspan="4" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 55px" required> Kg.</td>
                  
                </tr>

                </table>

              </div>

            </div>

          <!-- ENTRADA PARA ADIPOMETRIA-->          
            
            <div class="col-xs-12">

              <div class="form-check form-check-inline">

              <b>Adipometro</b>

              <center>
              
                <tr><td><textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Medidas Adipometro"></textarea></td></tr>
              
              </center>

              </div>

            </div>

            <!-- ENTRADA PARA PLANES DE TRATAMIENTOS--> 
            
            <div class="col-xs-12">

              <div class="form-group">
                
                <div class="input-group">

                <br>
                         
                <div class="panel">Fotos del Cliente</div>

                <input type="file" class="nuevaFotoSesiones" name="nuevaFotoSesiones" multiple>

                <p class="help-block">Peso máximo por foto 5MB max 20MB</p>

                <table class="table table-bordered table-striped dt-responsive tablas" style="table-layout: fixed;">

                <tr align="center"><td><img src="vistas/img/usuarios/default/default_formas.png" class="img-thumbnail previsualizar" width="200px"></td>

                <td><img src="vistas/img/usuarios/default/default_formas.png" class="img-thumbnail previsualizar" width="200px"></td>
                
                <td><img src="vistas/img/usuarios/default/default_formas.png" class="img-thumbnail previsualizar" width="200px"></td>
                
                <td><img src="vistas/img/usuarios/default/default_formas.png" class="img-thumbnail previsualizar" width="200px"></tr>

                </table>

              </div>

             </div>

            </div>

          <!-- ENTRADA PARA PLANES DE TRATAMIENTOS--> 

            <div class="col-xs-12">

              <div class="form-check form-check-inline">
                <br>

                <b>Plan de Tratamiento</b>

                <table class="table table-bordered table-striped dt-responsive tablas">

                  <tr><th style="text-align: center;">Planes de Tratamiento</th>

                    <th style="text-align: center;">Cantidad</th>

                    <th style="text-align: center;">Productos</th>

                    <th style="text-align: center;">Cantidad</th>

                    <th style="text-align: center;">Terapias</th>

                    <th style="text-align: center;">Cantidad</th></tr>

                    <tr>

                    <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Masaje reductor</option>

                      <option value="Neuronales">Corrientes Rusas</option>

                      <option value="Uterino">Radio Frecuencias</option>
                      
                    </select></td>

                    <td style="width: 60px;" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                      <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Gel Reductora</option>

                      <option value="Neuronales">Oxigeno activo</option>

                      <option value="Uterino">Crema depiladora</option>
                      
                    </select></td>

                    <td style="width: 60px;" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                    <td>

                      <select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Paquete #1</option>

                      <option value="Neuronales">Paquete #2</option>

                      <option value="Uterino">Hidroplastia</option>
                      
                    </select></td>

                    <td style="width: 60px;" align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                  </tr>

                  <tr>

                    <td align="center"><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Masaje reductor</option>

                      <option value="Neuronales">Corrientes Rusas</option>

                      <option value="Uterino">Radio Frecuencias</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                      <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Gel Reductora</option>

                      <option value="Neuronales">Oxigeno activo</option>

                      <option value="Uterino">Crema depiladora</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                    <td>

                      <select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Paquete #1</option>

                      <option value="Neuronales">Paquete #2</option>

                      <option value="Uterino">Hidroplastia</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                  </tr>

                  <tr>

                    <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Masaje reductor</option>

                      <option value="Neuronales">Corrientes Rusas</option>

                      <option value="Uterino">Radio Frecuencias</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                      <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Gel Reductora</option>

                      <option value="Neuronales">Oxigeno activo</option>

                      <option value="Uterino">Crema depiladora</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                    <td>

                      <select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Paquete #1</option>

                      <option value="Neuronales">Paquete #2</option>

                      <option value="Uterino">Hidroplastia</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>


                  </tr>

                  <tr>

                    <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Masaje reductor</option>

                      <option value="Neuronales">Corrientes Rusas</option>

                      <option value="Uterino">Radio Frecuencias</option>
                      
                    </select></td>

                    <td align="center"> <input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                      <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Gel Reductora</option>

                      <option value="Neuronales">Oxigeno activo</option>

                      <option value="Uterino">Crema depiladora</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                    <td>

                      <select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Paquete #1</option>

                      <option value="Neuronales">Paquete #2</option>

                      <option value="Uterino">Hidroplastia</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>


                  </tr>

                  <tr>

                    <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Masaje reductor</option>

                      <option value="Neuronales">Corrientes Rusas</option>

                      <option value="Uterino">Radio Frecuencias</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                      <td><select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Gel Reductora</option>

                      <option value="Neuronales">Oxigeno activo</option>

                      <option value="Uterino">Crema depiladora</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                    <td>

                      <select class="form-control input-xs" name="nuevoTipoCancer">
                  
                      <option value="">Seleccione</option>

                      <option value="Gastricos">Paquete #1</option>

                      <option value="Neuronales">Paquete #2</option>

                      <option value="Uterino">Hidroplastia</option>
                      
                    </select></td>

                    <td align="center"><input type="number" min="0" id="nuevoCigarrillos" style="width: 50px; height: 33px" required></td>

                  </tr>

                </table>

              </div>

            </div>

            <!-- ENTRADA PARA ANTECEDENTES OTROS--> 

            <div class="col-xs-12">
             
                <div class="input-group-prepend">
              
                <b>Observaciones</b>

                </div>
              
                <textarea class="form-control" aria-label="textareaotros" style="resize: vertical;" placeholder="Observaciones"></textarea>
          
              </div> 

        </div>

    </div>
  
    <!--=====================================
    PIE DEL MODAL
    ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      <button type="submit" class="btn btn-success">PDF ↓</button>

      <button type="submit" class="btn btn-primary">Guardar cambios</button>

      </div>

  </form>

      
<!--=====================================
        Aqui va el controlador Examenes Fisicos
        
      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

      ======================================-->


    </div>

  </div>

</div>



<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


    </div>


  </div>

  </div>

  </div>



