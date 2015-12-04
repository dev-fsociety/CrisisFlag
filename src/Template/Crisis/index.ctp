<div class="row">
  <div class="crisis index large-12 medium-12 small-12 columns content">
    <h3><?= __('Crises') ?></h3>










      <table cellpadding="0" cellspacing="0">
          <thead>
              <tr>
                  <th><?= $this->Paginator->sort('abstract') ?></th>
                  <th><?= $this->Paginator->sort('severity') ?></th>
                  <th><?= $this->Paginator->sort('state') ?></th>
                  <th><?= $this->Paginator->sort('address') ?></th>
                  <th class="actions"><?= __('Actions') ?></th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($crisis as $crisi): ?>
              <tr>
                  <td><?= h($crisi->abstract) ?></td>
                  <td><?= $this->Number->format($crisi->severity) ?></td>
                  <td><?= h($crisi->state) ?></td>
                  <td><?= h($crisi->address) ?></td>
                  <td class="actions">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $crisi->id]) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crisi->id]) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crisi->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer la crise # {0}?', $crisi->id)]) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
      <div class="paginator">
          <ul class="pagination">
              <?= $this->Paginator->prev('< ' . __('previous')) ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(__('next') . ' >') ?>
          </ul>
      </div>
  </div>
</div>
<div class="row">
  <div class="large-12 medium-12 small-12 columns">
    <?= $this->Html->link(__('Nouvelle crise'), ['action' => 'add']) ?>
  </div>


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
