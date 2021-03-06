<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-5" id="userList">
			<h1>Hello <?=$w_user['username']?></h1>

			<h2>Vos informations :</h2>
			</br>
			<p>Votre pseudo : <?=$w_user['username']?></p>
			<p>Votre adresse Email : <?=$w_user['email']?></p>
			<p>Date de création de votre compte : <?=$w_user['date_create']?></p>
			<p>Date de derniere connexion : <?=date('Y-m-d H:i:s', $w_user['date_last_connexion'])?></p>

			<a class="btn btn-default" href="<?=$this->url('user_update')?>">Modifier mes informations</a>


		</div>
		<?php if ($w_user['role'] == 1): ?>
			<div class="col-md-5 col-md-offset-2" id="userList">
			    <h2>Fonction administrateur :</h2></br>

			    <p><a href="<?=$this->url('admin_users')?>">Liste des utilisateurs</a></p>

			    <p><a href="<?=$this->url('admin_parameters')?>">Paramètres de la partie</a></p>
		    </div>
		<?php endif; ?>
	</div>
</div>
<?php $this->stop('main_content') ?>
