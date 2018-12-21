<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\I18n[]|\Cake\Collection\CollectionInterface $i18n
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New I18n'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="i18n index large-9 medium-8 columns content">
    <h3><?= __('I18n') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locale') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foreign_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('field') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($i18n as $i18n): ?>
            <tr>
                <td><?= $this->Number->format($i18n->id) ?></td>
                <td><?= h($i18n->locale) ?></td>
                <td><?= h($i18n->model) ?></td>
                <td><?= $this->Number->format($i18n->foreign_key) ?></td>
                <td><?= h($i18n->field) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $i18n->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $i18n->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $i18n->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18n->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
