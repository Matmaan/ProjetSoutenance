<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="container header" style="margin: 0 auto;">
		<img src="../public/assets/img/LOGO_Campeurs_VS_Zombies.png" alt="logo" class="img-responsive logoTop text-center" id="logo">
	</div>

	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $this->url('user_login'); ?>"><?php echo $w_site_name; ?></a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav">
			<?php if ($w_user): ?>
				<!-- Utilisateur connecté -->
				<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Accueil</a></li>
				<li <?= ($w_current_route == 'default_report') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_report'); ?>">Rapports<?=($_SESSION['newReport'] > 0)?"(".$_SESSION['newReport'].")":"";?></a></li>
				<li <?= ($w_current_route == 'default_exploration') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_exploration'); ?>">Exploration</a></li>
			<?php else: ?>
				<!-- Utilisateur non connecté -->
				<li <?= ($w_current_route == 'user_login') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_login'); ?>">Accueil</a></li>
			<?php endif; ?>

				<li <?= ($w_current_route == 'default_classement') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_classement',['page'=>1]); ?>">Classement</a></li>

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php if ($w_user) { // si l'utilisateur est connecté ?>
					<li <?= ($w_current_route == 'default_camp') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_camp'); ?>">Camp</a></li>
					<li <?= ($w_current_route == 'user_profil') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_profil'); ?>">Profil</a></li>
					<li <?= ($w_current_route == 'default_tchat') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('default_tchat'); ?>">Tchat</a></li>
					<li <?= ($w_current_route == 'user_logout') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_logout'); ?>">Déconnexion</a></li>
				<?php } else { ?>
					<li <?= ($w_current_route == 'user_register') ? 'class="active"' : ''; ?>><a href="<?php echo $this->url('user_register'); ?>">Inscription</a></li>
				<?php } ?>
			</ul>
			</div>
	</nav>



	<?= $this->section('main_content') ?>

	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= $this->assetUrl('js/app.js'); ?>"></script>
</body>
</html>
