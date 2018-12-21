<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vol $vol
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vol'), ['action' => 'edit', $vol->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vol'), ['action' => 'delete', $vol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vol->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vols'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vol'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emplacements'), ['controller' => 'Emplacements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emplacement'), ['controller' => 'Emplacements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>

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
<div class="vols view large-9 medium-8 columns content">
    <h3><?= h($vol->id) ?></h3>
	<?= $this->Form->postButton('Print en PDF', ['controller' => 'Vols', 'action' => 'actoionPrintPdf', $vol->id]) ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vol->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emplacementdepart Id') ?></th>
            <td><?= $this->Number->format($vol->emplacementdepart_id) ? $this->Html->link($nomEmplacementun, ['controller' => 'Emplacements', 'action' => 'view', $vol->emplacementdepart_id]) : '' ?></td>></td>
        </tr>
		<tr>
            <th scope="row"><?= __('Emplacementfin Id') ?></th>
            <td><?= $this->Number->format($vol->emplacementfin_id) ? $this->Html->link($nomEmplacementDeux, ['controller' => 'Emplacements', 'action' => 'view', $vol->emplacementfin_id]) : '' ?></td>></td>
        </tr>
        <tr>
            <th scope="row"><?= __('prixeconomique') ?></th>
            <td><?= $this->Number->format($vol->prixeconomique) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('heuredepart') ?></th>
            <td><?= h($vol->heuredepart) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('heurearriver') ?></th>
            <td><?= h($vol->heurearriver) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vol->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vol->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reservations') ?></h4>
        <?php if (!empty($vol->reservations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Vol Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vol->reservations as $reservations): ?>
            <tr>
                <td><?= h($reservations->id) ?></td>
                <td><?= h($reservations->user_id) ?></td>
                <td><?= h($reservations->vol_id) ?></td>
                <td><?= h($reservations->created) ?></td>
                <td><?= h($reservations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
