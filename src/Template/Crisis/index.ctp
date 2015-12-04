<div class="crisis index large-12 medium-12 columns content">
    <h3 style="margin-top: 20px; margin-bottom: 20px; text-align: center"><?= __('Consulter toutes les crises recensées') ?></h3>
    <table cellpadding="0" cellspacing="0" style="margin: 0px auto;" >
        <thead>
            <tr>
                <th width="200"><?= $this->Paginator->sort('abstract', 'Résumé') ?></th>
                <th width="200"><?= $this->Paginator->sort('state', 'État') ?></th>
                <th width="200"><?= $this->Paginator->sort('address', 'Lieu') ?></th>
                <th width="200" class="actions"><?= __('Détails') ?></th>
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
    <hr>
    <div class="paginator">
      <div class="panel" style="text-align: center">
        <ul class="pagination" style="width: 230px; margin: 0px auto;">
            <?= $this->Paginator->prev('<< ' . __('Précédente')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivante') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
      </div>
    </div>
</div>
