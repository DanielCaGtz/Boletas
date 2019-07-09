<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url(); ?>img/user.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?= $this->session->userdata("nombre"); ?></p>
				<a href="<?= base_url(); ?>"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<ul class="sidebar-menu">
			<li class="header">MENÚ PRINCIPAL</li>
			<li class="treeview <?= $utils->consulta_uri(array('home')); ?>">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Home</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?= $utils->consulta_uri(array('home')); ?>"><a href="<?= base_url(); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
				</ul>
			</li>
			<?php if(intval($controller->check_permisos("allow_edit"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('edicion','edicion_sub')); ?>">
				<a href="#">
					<i class="fa fa-bar-chart"></i> <span>Edición de aspectos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?= $utils->consulta_uri(array('edicion')); ?>"><a href="<?= base_url(); ?>edicion"><i class="fa fa-circle-o"></i> Editar/ver aspectos</a></li>
					<li class="<?= $utils->consulta_uri(array('edicion_sub')); ?>"><a href="<?= base_url(); ?>edicion_sub"><i class="fa fa-circle-o"></i> Editar/ver subaspectos</a></li>
				</ul>
			</li>
			<?php } if(intval($controller->check_permisos("allow_materias"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('editar_materias')); ?>">
				<a href="#">
					<i class="fa fa-cubes"></i> <span>Editar materias</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<?php if(intval($controller->check_permisos("allow_materias"))>0){ ?>
					<li class="<?= $utils->consulta_uri(array('editar_materias')); ?>"><a href="<?= base_url() ?>editar_materias"><i class="fa fa-circle-o"></i> Editar/ver materias</a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } if(intval($controller->check_permisos("allow_add"))>0 || intval($controller->check_permisos("allow_view"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('consultar','registro')); ?>">
				<a href="#">
					<i class="fa fa-edit"></i> <span>Consultas de datos</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<?php if(intval($controller->check_permisos("allow_view"))>0){ ?>
					<li class="<?= $utils->consulta_uri(array('consultar')); ?>"><a href="<?= base_url() ?>consultar"><i class="fa fa-circle-o"></i> Consultar boletas</a></li>
					<?php } if(intval($controller->check_permisos("allow_add"))>0){ ?>
					<li class="<?= $utils->consulta_uri(array('registro')); ?>"><a href="<?= base_url() ?>registro"><i class="fa fa-circle-o"></i> Registrar/ver calificaciones</a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } if(intval(USES_PLANEACION)>0){ if(intval($controller->check_permisos("allow_reporte_diario_add"))>0 || intval($controller->check_permisos("allow_reporte_diario_admin"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('agregar_reporte_diario','ver_reporte_diario')); ?>">
				<a href="#">
					<i class="fa fa-edit"></i> <span>Planeación</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<?php if(intval($controller->check_permisos("allow_reporte_diario_add"))>0){ ?>
					<li class="<?= $utils->consulta_uri(array('agregar_reporte_diario')); ?>"><a href="<?= base_url() ?>agregar_reporte_diario"><i class="fa fa-circle-o"></i> Agregar planeación</a></li>
					<?php }if(intval($controller->check_permisos("allow_reporte_diario_admin"))>0){ ?>
					<li class="<?= $utils->consulta_uri(array('ver_reporte_diario')); ?>"><a href="<?= base_url() ?>ver_reporte_diario"><i class="fa fa-circle-o"></i> Ver planeaciones</a></li>
					<?php } ?>
				</ul>
			</li>
			<?php }} if(intval($controller->check_permisos("allow_admin"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('reporte_detalles')); ?>">
				<a href="#">
					<i class="fa fa-bar-chart"></i> <span>Esfuerzo / Detalles reporte</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?= $utils->consulta_uri(array('reporte_detalles')); ?>"><a href="<?= base_url(); ?>reporte_detalles"><i class="fa fa-circle-o"></i> Editar/ver detalles</a></li>
				</ul>
			</li>
			<?php } if(intval($controller->check_permisos("allow_admin_users"))>0){ ?>
			<li class="treeview <?= $utils->consulta_uri(array('ver_usuarios','agregar_usuario')); ?>">
				<a href="#">
					<i class="fa fa-user"></i> <span>Administración de usuarios</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?= $utils->consulta_uri(array('ver_usuarios')); ?>"><a href="<?= base_url(); ?>ver_usuarios"><i class="fa fa-users"></i> Editar usuarios/permisos</a></li>
					<li class="<?= $utils->consulta_uri(array('agregar_usuario')); ?>"><a href="<?= base_url(); ?>agregar_usuario"><i class="fa fa-user-plus"></i> Agregar usuario</a></li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</section>
</aside>
