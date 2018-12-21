<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imageuser $imageuser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List imageusers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List users'), ['controller' => 'users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<h1>Upload File</h1>
<div class="imageuser form large-9 medium-8 columns content">
    <?= $this->Form->create($imageuser, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Ajouter Image') ?></legend>
        <?php
            echo $this->Form->control('imageuser', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
