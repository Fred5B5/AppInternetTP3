<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\I18n $i18n
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit I18n'), ['action' => 'edit', $i18n->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete I18n'), ['action' => 'delete', $i18n->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18n->id)]) ?> </li>
        <li><?= $this->Html->link(__('List I18n'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New I18n'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="i18n view large-9 medium-8 columns content">
    <h3><?= h($i18n->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Locale') ?></th>
            <td><?= h($i18n->locale) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($i18n->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Field') ?></th>
            <td><?= h($i18n->field) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($i18n->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Key') ?></th>
            <td><?= $this->Number->format($i18n->foreign_key) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($i18n->content)); ?>
    </div>
</div>
