
<?php $this->assign('css', 'users_login.css');?>

<div class="formclass">
  <div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">
        <div class="row column log-in-form">

          <h4 class="text-center">Veuillez renseigner vos identifiants de connexion</h4>

          	<?= $this->Form->create(); ?>
          	<?= $this->Form->input('username', ['label' => 'Nom d\'utilisateur']); ?>
        	 <?= $this->Form->input('password', ['label' => 'Mot de passe']); ?>
          	<?= $this->Form->button('Se connecter', ['class' => 'log-in-button']); ?>
          	<?= $this->Form->end(); ?>

        </div>
    </div>
  </div>
</div>
