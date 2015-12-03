<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Info'), ['action' => 'edit', $info->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Info'), ['action' => 'delete', $info->id], ['confirm' => __('Are you sure you want to delete # {0}?', $info->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="infos view large-9 medium-8 columns content">
    <h3><?= h($info->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($info->title) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $info->has('user') ? $this->Html->link($info->user->id, ['controller' => 'Users', 'action' => 'view', $info->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($info->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($info->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Crisis Id') ?></th>
            <td><?= $this->Number->format($info->crisis_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($info->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($info->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($info->body)); ?>
    </div>
</div>
