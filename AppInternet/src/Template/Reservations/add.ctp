<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Emplacements",
    "action" => "getEmplacements",
    "_ext" => "json"
        ]);
 echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
 echo $this->Html->script('Vols/add', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
 
debug($emplacements/*->toList()*/);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List users'), ['controller' => 'users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vols'), ['controller' => 'Vols', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vol'), ['controller' => 'Vols', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="emplacementsController">
<!-- <div class="reservations form large-9 medium-8 columns content"> -->
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Add Reservation') ?></legend>
		<div>
            Destination: 
            <select name="emplacements_id"
                    id="emplacements-id" 
                    ng-model="emplacement" 
                    ng-options="emplacement.nom_emplacement for emplacement in emplacements track by emplacement.id"
                    >
                <option value=''></option>
            </select>
        </div>
        <div>
            Vols disponible: 
            <select name="vol_id"
                    id="vol-id"
                    ng-disabled="!emplacement"
                    ng-model="vol"
                    ng-options="vol.id for vol in emplacement.vols track by vol.id"
					>
                <option value=''></option>
            </select>
        </div>
        <?php
			//echo $this->Form->control('emplacement_id', ['options' => $emplacements]);
            //echo $this->Form->control('vol_id', ['options' => $vols]);
		?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
