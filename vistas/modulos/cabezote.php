 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="vistas/img/plantilla/icono1.png" class="img-responsive"  style="padding: 11px 2px 2px 2px">

		</span>

		<!-- logo normal -->

		<span class="logo-lg">
			
			<img src="vistas/img/plantilla/logo1.png" class="img-responsive" style="padding: 11px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Barra de Navegación</span>

      	
      	</a>

      	<!-- Barra de busqueda -->
		    
       <div class="navbar-custom-menu">
        	
        	<ul class="nav navbar-nav">
        	
        		<li class="dropdown user user-menu" >
          			
          			<div class="container-fluid ">
            
            			<form class="navbar-form navbar-justify" role="search" weight="100">
            	
                		<input type="text" class="form-control"  id="navbar-search-input" placeholder="Buscar" class= "fa fa-search"></i> </input>

                		
                		
                		<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            			
            			</form>
             
             		</div>
	
	            </li>
         
         	 </ul>
      
     

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">

			
				
			<ul class="nav navbar-nav">

				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/default.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>
						
					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">



						
						<li class="user-body">


							<div class="row">
								
								 <div class="pull-right">
								Haga clic para cerrar sesión...
								<a href="salir" class="btn btn-primary btn-flat">Salir</a>

							</div>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>
		 </div>

	</nav>

 </header>

