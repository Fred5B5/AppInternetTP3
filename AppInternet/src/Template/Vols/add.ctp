<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vol $vol
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vols'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Emplacements'), ['controller' => 'Emplacements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emplacement'), ['controller' => 'Emplacements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vols form large-9 medium-8 columns content">
    <?= $this->Form->create($vol) ?>
    <fieldset>
        <legend><?= __('Add Vol') ?></legend>
        <?php
			echo $this->Form->control('emplacementdepart_id', ['options' => $emplacements]);
            echo $this->Form->control('emplacementfin_id', ['options' => $emplacements]);
            echo $this->Form->control('heuredepart');
            echo $this->Form->control('heurearriver');
            echo $this->Form->control('prixeconomique');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
