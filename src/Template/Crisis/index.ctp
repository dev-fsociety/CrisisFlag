<div class="crisis index large-12 medium-12 columns content">
    <h3 style="margin-top: 20px; margin-bottom: 20px;"><?= __('Consulter toutes les crises recensée') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('abstract', 'Résumé') ?></th>
                <th><?= $this->Paginator->sort('state', 'État') ?></th>
                <th><?= $this->Paginator->sort('address', 'Lieu') ?></th>
                <th class="actions"><?= __('Détails') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($crisis as $crisi): ?>
            <tr>
                <td><?= h($crisi->abstract) ?></td>
                <td><?= $state_t[$crisi->state] ?></td>
                <td><?= h($crisi->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir le détail'), ['action' => 'view', $crisi->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
