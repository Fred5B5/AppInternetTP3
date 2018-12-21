<!doctype html>
<html>
   <head>
    <?php 
		echo $this->Html->script('https://www.google.com/recaptcha/api.js');
	?>
   </head>
        <h1>Login</h1>
		<div>
			<?= $this->Form->create() ?>
			<div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
			<?= $this->Form->control('username') ?>
			<?= $this->Form->control('password') ?>
			<?= $this->Form->button('Connexion') ?>
			<?= $this->Form->end() ?>
		</div>
</html>