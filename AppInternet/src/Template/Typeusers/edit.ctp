<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typeuser $typeuser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeuser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeuser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Typeusers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeusers form large-9 medium-8 columns content">
    <?= $this->Form->create($typeuser) ?>
    <fieldset>
        <legend><?= __('Edit Typeuser') ?></legend>
        <?php
            echo $this->Form->control('typeusager');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
