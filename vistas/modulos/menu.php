<aside class="main-sidebar">
	
	 <section class="sidebar">

		<ul class="sidebar-menu">

			<div class="user-panel">
            	
            	<div class="pull-left image">
              	
              	<?php

					if($_SESSION["foto"] != ""){

						echo '<br><img src="'.$_SESSION["foto"].'">';

					}else{

						echo '<img src="vistas/img/usuarios/default/default.png" alt="User Image">';
					}

					?>
															            	
            	</div>
            
            	<div class="pull-left info">

                	<p class="hidden-xs" style="padding: 15px 0px 0px 10px" ><?php  echo $_SESSION["usuario"]; ?></p>
					
					<a href="inicio" ><p class="hidden-sm" style="padding: 0px 0px 0px 10px"><?php  echo $_SESSION["perfil"]; ?></p></a>
              
            	</div>
          </div>
           

           <li class="header" align="center">Menú Principal</li>
		  
	<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li><a href="inicio"><i class="fa fa-home fa-lg"></i><span> Inicio</span></a></li>

			<li><a href="usuarios"><i class="fa fa-user-md fa-lg"></i><span> Personal</span></a></li>';

	}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview"><a href="#"><i class="fa fa-address-book-o fa-lg"></i><span> Clientes</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

			<ul class="treeview-menu">
					
					<li><a href="clientes"><i class="fa fa-users"></i><span> Administrar clientes</span></a></li>

					<li><a href="antecedentes"><i class="fa fa-heartbeat"></i><span> Antecedentes</span></a></li>

					<li><a href="examen-fisico"><i class="fa fa-stethoscope"></i><span> Exámenes Físicos</span></a></li></ul>';

	}

	if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="treeview"><a href="#"><i class="fa fa-cog fa-lg"></i><span> Administrar</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

			<ul class="treeview-menu">
					
					<li><a href="sedes"><i class="fa fa-building"></i><span> Administrar sedes</span></a></li>

					<li><a href="medios"><i class="fa fa-credit-card"></i><span> Medios de pago</span></a></li>

					<li><a href="proveedores"><i class="fa fa-truck"></i><span> Proveedores</span></a></li></ul>';

	}

		?>
		
		<li class="header" align="center">Comercial</li>

	<?php

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview"><a href="#"><i class="fa fa-medkit fa-lg"></i><span> Servicios</span>
				  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

					<ul class="treeview-menu">
					
					<li><a href="categorias"><i class="fa fa-chevron-right"></i><span> Categorias</span></a></li>

					<li><a href="servicios"><i class="fa fa-chevron-right"></i><span> Crear Servicios</span></a></li></ul>

				  <li class="treeview"><a href="#"><i class="fa fa-dropbox fa-lg"></i><span> Productos</span>
				  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

					<ul class="treeview-menu">
					
					<li><a href="categoriasproductos"><i class="fa fa fa-chevron-right"></i><span> Categorias</span></a></li>

					<li><a href="productos"><i class="fa fa-chevron-right"></i><span> Crear Producto</span></a></li></ul>
				

				  <li class="treeview"><a href="#"><i class="fa fa-shopping-cart fa-lg"></i><span> Ventas</span>
				  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

					<ul class="treeview-menu">
					
					<li><a href="ventas"><i class="fa fa-line-chart"></i><span> Administrar ventas</span></a></li>

					<li><a href="crear-venta"><i class="fa fa-usd fa-lg"></i><span> Crear venta</span></a></li>';

	}

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li><a href="reportes"><i class="fa fa-pie-chart"></i><span> Reporte de ventas</span></a></li></ul>';

	}
	
	?>

		<li class="header" align="center">Agendamiento</li>

		<?php

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li><a href="agendamiento"><i class="fa fa-calendar fa-lg"></i><span></span><span>Calendario</span></a></li>';

	}
	
	?>
		</ul>

	</section>

</aside>