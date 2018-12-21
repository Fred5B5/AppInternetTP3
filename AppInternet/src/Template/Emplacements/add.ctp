<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emplacement $emplacement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Emplacements'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="emplacements form large-9 medium-8 columns content">
    <?= $this->Form->create($emplacement) ?>
    <fieldset>
        <legend><?= __('Add Emplacement') ?></legend>
        <?php
            echo $this->Form->control('nom_emplacement');
            echo $this->Form->control('accronyme_emplacement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
