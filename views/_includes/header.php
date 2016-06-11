<?php if ( ! defined('SOURCEPATH')) exit; ?>
<meta charset="utf-8" />
<html>
<head>
	<title>Kronos Imob<?php echo $this->titulo; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/vendor/bootstrap-3.3.6/dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/vendor/bootstrap-3.3.6/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo HOMEURL; ?>/views/_css/main.css" />
</head>
<body>
<div class="all">
<header class="main-header">
	<!--<div class="navbar navbar-fixed-top">-->
	<nav class="navbar navbar-fixed-top topnav" role="navigation">
		<div class="container topnav">
			<!-- Botão p/ visualização mobile -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand topnav">
                    Kronos Imob
                </div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse topnav navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php include "nav.php"; ?>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<div class="container header-content">
		<?php include "banner.php"; ?>
	</div>
</header>