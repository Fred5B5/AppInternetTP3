<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
            'base.css',
            'style.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ]);
        ?>
		<?= $this->Html->css([
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
        ],
		['integrity'=>"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO",
		'crossorigin'=>"anonymous"
		]);
        ?>
		
		<?= $this->Html->script([
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'],
		['integrity'=>"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy",
		'crossorigin'=>"anonymous", 'block'=>"bootstrap"
		]);
        ?>
			<?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
			'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
                ], ['block' => 'scriptLibraries']
        );
        ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	<?= $this->fetch('scriptLibraries') ?>
	<?= $this->fetch('bootstrap') ?>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?= $this->fetch('title')?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/AppInternet">Index <span class="sr-only">(current)</span></a>
      </li>
	  <?php
                        $loggeduser = $this->request->getSession()->read('Auth.User');
                        if ($loggeduser) {
                            
							$user = $loggeduser['username'];?>
							<li><?php echo $this->Html->link($user, ['controller' => 'users', 'action' => 'view', $loggeduser['id']], ['class' => 'nav-link']);?></li>
							
							<li><a class="nav-link" href="/AppInternet/users/logout">Logout</a></li>
                            <?php
                        } else {
							?>
							<li><?php echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link']);?></li>
							<li><?php echo $this->Html->link("S'inscrire", ['controller' => 'users', 'action' => 'add'], ['class' => 'nav-link']);?></li>
							<?php
                        }
                        ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/AppInternet/pages/apropos">A Propos</a>
          <a class="dropdown-item" href="/AppInternet/email/confirmation">Confirmation</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/AppInternet/users">Users</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
	<?php if ($loggeduser['typeuser_id'] == '1') { 
	
		echo '<span style="color:red;text-align:center;">Veuillez allez confirmer votre usager pour avoir les acces du Super Utilisateur!</span>';
	
	} ?>
        <?= $this->fetch('content') ?>
		
		<?= $this->fetch('scriptBottom') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
