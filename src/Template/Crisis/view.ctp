<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Crisi'), ['action' => 'edit', $crisi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Crisi'), ['action' => 'delete', $crisi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crisi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Crisis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crisi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="crisis view large-9 medium-8 columns content">
    <h3><?= h($crisi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Abstract') ?></th>
            <td><?= h($crisi->abstract) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($crisi->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($crisi->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($crisi->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Hashtags') ?></th>
            <td><?= h($crisi->hashtags) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $crisi->has('user') ? $this->Html->link($crisi->user->id, ['controller' => 'Users', 'action' => 'view', $crisi->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($crisi->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Severity') ?></th>
            <td><?= $this->Number->format($crisi->severity) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($crisi->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($crisi->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($crisi->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($crisi->modified) ?></td>
        </tr>
    </table>
</div>
