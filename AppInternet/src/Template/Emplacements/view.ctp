<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emplacement $emplacement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emplacement'), ['action' => 'edit', $emplacement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emplacement'), ['action' => 'delete', $emplacement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emplacement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emplacements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emplacement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emplacements view large-9 medium-8 columns content">
    <h3><?= h($emplacement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom Emplacement') ?></th>
            <td><?= h($emplacement->nom_emplacement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accronyme Emplacement') ?></th>
            <td><?= h($emplacement->accronyme_emplacement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($emplacement->id) ?></td>
        </tr>
    </table>
</div>
