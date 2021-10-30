<div id="back"></div>

<div class="login-box">
  
  <div class="login-box-body">

    <br>
    
    <div class="login-logo">

    <img src="vistas/img/plantilla/Biocorfa_PNG.png" class="img-responsive">

    </div>
    
    <br>
  
    <strong>Ingresar al sistema</strong>

    <br>

    <br>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-jpy form-control-feedback"></span>
      
      </div>
      <br>

       <div class="row">
        <div class="col-xs-12">
                          
          <button type="submit" class="btn btn-primary btn-flat">Ingresar</button>
        </div>
       

      </div>
      <br>
      <br>


      <div class="row">
       <div class="col-xs-12">

        <strong>
        Copyright &copy; 2021
        <a href="https://www.thinking-soft.com/" target="_blank">
        <font color="#49b063">Thinking-Soft.</font></a>
        Todos los derechos reservados.
        </strong> 
        
      </div>
      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>


