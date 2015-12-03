
<?php $this->assign('css', 'users_login.css');?>

<div class="formclass">
  <div class="row">
    <div class="medium-6 medium-centered large-4 large-centered columns">
      <form>
        <div class="row column log-in-form">
          <h4 class="text-center">Log in with your administrator account</h4>

          	<?= $this->Form->create(); ?>
          	<?= $this->Form->input('username'); ?>
        	  <?= $this->Form->input('password'); ?>
          	<?= $this->Form->button('Log in !', ['class' => 'log-in-button']); ?>
          	<?= $this->Form->end(); ?>

         	<p class="text-center"><a href="#">Forgot your password?</a></p>   
        </div>
      </form>
    </div>
  </div>
</div>