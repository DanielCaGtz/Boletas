<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>
	<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<?php if(intval($controller->check_permisos("allow_view"))>0){ ?>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>Boletas</h3>
					<p>Consulta de boletas</p>
				</div>
				<div class="icon"><i class="ion ion-pie-graph"></i></div>
				<a href="<?= base_url(); ?>consultar" class="small-box-footer">Consultar <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php } if(intval($controller->check_permisos("allow_edit"))>0){ ?>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-green">
				<div class="inner">
					<h3>Editar</h3>
					<p>Editar boletas</p>
				</div>
				<div class="icon"><i class="ion ion-stats-bars"></i></div>
				<a href="<?= base_url(); ?>edicion" class="small-box-footer">Editar <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php } if(intval($controller->check_permisos("allow_add"))>0){ ?>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>Agregar</h3>
					<p>Agregar calificaciones</p>
				</div>
				<div class="icon"><i class="ion ion-clipboard"></i></div>
				<a href="<?= base_url(); ?>registro" class="small-box-footer">Agregar <i class="fa fa-arrow-circle-right"></i></a>
				</div>
		</div>
		<?php } ?>
		</div>
		<div class="row">
			<?php if(intval($controller->check_permisos("allow_materias"))>0){ ?>
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-teal">
				<div class="inner">
					<h3>Materias</h3>
					<p>Ver/agregar materias</p>
				</div>
				<div class="icon"><i class="ion ion-university"></i></div>
				<a href="<?= base_url(); ?>editar_materias" class="small-box-footer">Consultar <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php } ?>
		</div>
		<?php if(intval($controller->check_permisos("allow_publish"))>0){ ?>
		<div class="row">
		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-blue">
				<div class="inner">
					<h3>Publicar</h3>
					<p>Publicar boletas</p>
				</div>
				<div class="icon"><i class="ion ion-university"></i></div>
				<a href="javascript:;" id="publicar_boleta" class="small-box-footer">Publicar <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<img src="<?= base_url(); ?>img/loader.GIF" id="publicar_img" style="display:none;">
		</div>
		<?php } ?>
	</section>
</div>