<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typeuser $typeuser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Typeuser'), ['action' => 'edit', $typeuser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Typeuser'), ['action' => 'delete', $typeuser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeuser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Typeusers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Typeuser'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typeusers view large-9 medium-8 columns content">
    <h3><?= h($typeuser->TypeUsager) ?></h3>
    <table class="vertical-table">
        <tr>
		<th scope="row"><?= __('Typeusager') ?></th>
        <td><?= $this->Text->autoParagraph($typeuser->typeusager); ?></td>
		</tr>
		<tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeuser->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($typeuser->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Prenom Usager') ?></th>
                <th scope="col"><?= __('Nom Usager') ?></th>
                <th scope="col"><?= __('Typeuser Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($typeuser->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->prenom_usager) ?></td>
                <td><?= h($users->nom_usager) ?></td>
                <td><?= h($users->typeuser_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
