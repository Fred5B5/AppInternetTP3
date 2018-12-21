<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imageuser $imageuser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imageuser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imageuser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List imageusers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List users'), ['controller' => 'users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imageusers form large-9 medium-8 columns content">
    <?= $this->Form->create($imageuser) ?>
    <fieldset>
        <legend><?= __('Edit Imageuser') ?></legend>
        <?php
            echo $this->Form->control('emplacementimage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
