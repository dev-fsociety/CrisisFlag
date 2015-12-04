<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Crises'), '/Crisis') ?></li>
    </ul>
</nav>
<div class="infos index large-9 medium-8 columns content">
    <h3><?= __('Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('crisis_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infos as $info): ?>
            <tr>
                <td><?= $this->Number->format($info->id) ?></td>
                <td><?= h($info->title) ?></td>
                <td><?= $this->Number->format($info->crisis_id) ?></td>
                <td><?= $info->has('user') ? $this->Html->link($info->user->id, ['controller' => 'Users', 'action' => 'view', $info->user->id]) : '' ?></td>
                <td><?= h($info->created) ?></td>
                <td><?= h($info->modified) ?></td>
                <td><?= h($info->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $info->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $info->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id)]) ?>
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
