<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vol[]|\Cake\Collection\CollectionInterface $vols
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vol'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emplacements'), ['controller' => 'Emplacements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emplacement'), ['controller' => 'Emplacements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vols index large-9 medium-8 columns content">
    <h3><?= __('Vols') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emplacementdepart_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emplacementfin_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heuredepart') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heurearriver') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prixeconomique') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vols as $vol): ?>
            <tr>
					<?php 
					$nomEmplacementun;
					$nomEmplacementDeux;
					foreach($emplacements as $emplacementAct ) {
						if ($emplacementAct->id == $vol->emplacementdepart_id) {
							$nomEmplacementun = $emplacementAct->nom_emplacement;
						}
					}
					foreach($emplacements as $emplacementAct ) {
						if ($emplacementAct->id == $vol->emplacementfin_id) {
							$nomEmplacementDeux = $emplacementAct->nom_emplacement;
						}
					}
				
				
				?>
                <td><?= $this->Number->format($vol->id) ?></td>
                <td><?= $this->Number->format($vol->emplacementdepart_id) ? $this->Html->link($nomEmplacementun, ['controller' => 'Emplacements', 'action' => 'view', $vol->emplacementdepart_id]) : '' ?></td>></td>
                <td><?= $this->Number->format($vol->emplacementfin_id) ? $this->Html->link($nomEmplacementDeux, ['controller' => 'Emplacements', 'action' => 'view', $vol->emplacementfin_id]) : '' ?></td>></td>
                <td><?= h($vol->heuredepart) ?></td>
                <td><?= h($vol->heurearriver) ?></td>
                <td><?= $this->Number->format($vol->prixeconomique) ?></td>
                <td><?= h($vol->created) ?></td>
                <td><?= h($vol->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vol->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vol->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vol->id)]) ?>
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
