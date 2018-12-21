<?php
$urlToCarsAutocompletedemoJson = $this->Url->build([
    "controller" => "Emplacements",
    "action" => "findName",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Emplacements/autocompleteemplacements', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Emplacement[]|\Cake\Collection\CollectionInterface $emplacements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emplacement'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="emplacements index large-9 medium-8 columns content">
    <h3><?= __('Emplacements') ?></h3>
	<fieldset>
    <legend><?= __('Search emplacement name') ?></legend>
    <?php
    echo $this->Form->input('nom_emplacement', ['id' => 'autocomplete']);
    ?>
</fieldset>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_emplacement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('accronyme_emplacement') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emplacements as $emplacement): ?>
            <tr>
                <td><?= $this->Number->format($emplacement->id) ?></td>
                <td><?= h($emplacement->nom_emplacement) ?></td>
                <td><?= h($emplacement->accronyme_emplacement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emplacement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emplacement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emplacement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emplacement->id)]) ?>
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
