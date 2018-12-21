<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List typeusers'), ['controller' => 'typeusers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Typeuser'), ['controller' => 'typeusers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List imageusers'), ['controller' => 'imageusers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Imageuser'), ['controller' => 'imageusers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('prenom_usager');
            echo $this->Form->control('nom_usager');
            echo $this->Form->control('password');
            echo $this->Form->control('typeuser_id', ['options' => $typeusers]);
            echo $this->Form->control('imageuser_id', ['options' => $imageusers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
