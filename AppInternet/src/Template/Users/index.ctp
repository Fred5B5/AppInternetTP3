<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List typeusers'), ['controller' => 'typeusers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Typeuser'), ['controller' => 'typeusers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List imageusers'), ['controller' => 'imageusers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Imageuser'), ['controller' => 'imageusers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom_usager') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_usager') ?></th>
                <th scope="col"><?= $this->Paginator->sort('typeuser_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('imageuser_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->prenom_usager) ?></td>
                <td><?= h($user->nom_usager) ?></td>
                <td><?= $user->has('typeuser') ? $this->Html->link($user->typeuser->id, ['controller' => 'typeusers', 'action' => 'view', $user->typeuser->id]) : '' ?></td>
                <?php $imageid = $this->Number->format($user->imageuser_id);
				$images = $imageusers->toArray();
				$key = array_search($imageid, $images)?>
				<td><img src="/AppInternet/webroot/img/<?= $images[$key]['emplacementimage']?>" alt="CakePHP" /></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
