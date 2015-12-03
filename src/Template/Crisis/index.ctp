<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Crisi'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crisis index large-9 medium-8 columns content">
    <h3><?= __('Crisis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('abstract') ?></th>
                <th><?= $this->Paginator->sort('severity') ?></th>
                <th><?= $this->Paginator->sort('longitude') ?></th>
                <th><?= $this->Paginator->sort('latitude') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($crisis as $crisi): ?>
            <tr>
                <td><?= $this->Number->format($crisi->id) ?></td>
                <td><?= h($crisi->abstract) ?></td>
                <td><?= $this->Number->format($crisi->severity) ?></td>
                <td><?= $this->Number->format($crisi->longitude) ?></td>
                <td><?= $this->Number->format($crisi->latitude) ?></td>
                <td><?= h($crisi->state) ?></td>
                <td><?= h($crisi->address) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $crisi->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crisi->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crisi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crisi->id)]) ?>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
