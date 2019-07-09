<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Sistema de Boletas</title>
		<script type="text/javascript">window.url = {base_url:"<?php echo nombre_ruta_host(); ?>"};</script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo"><a href="<?php echo base_url(); ?>"><b>Sistema de Boletas</b></a></div>
			<center><img src="<?=
					base_url('files/'.$controller->get_data_single_result('url_login', 'url_login', 'constantes',
						array(
							'nombre' => MAIN_LOGO_CONST
						)
					)) ?>"
				style="width:360px;margin-bottom: 20px;"></center>
			<div id="msg_receptor" class="callout" style="display:none;">
				<h4 id="msg1_callout"></h4>
				<span id="msg2_callout"></span>
	    </div>
			<div class="login-box-body">
				<p class="login-box-msg">Inicie sesión</p>
				<form id="login_form" method="post" enctype="multipart/form-data">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Contraseña">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8"><div class="checkbox icheck"><label><input type="checkbox"> Recordar datos</label></div></div>
						<div class="col-xs-4"><button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button></div>
					</div>
				</form>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>js/controllers/login.js"></script>
	</body>
</html>
