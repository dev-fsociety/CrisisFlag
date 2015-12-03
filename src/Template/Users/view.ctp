<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crisis'), ['controller' => 'Crisis', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crisi'), ['controller' => 'Crisis', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Infos'), ['controller' => 'Infos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Info'), ['controller' => 'Infos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Organisation') ?></th>
            <td><?= h($user->organisation) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($user->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($user->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Category') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->title) ?></td>
                <td><?= h($articles->body) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td><?= h($articles->user_id) ?></td>
                <td><?= h($articles->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Crisis') ?></h4>
        <?php if (!empty($user->crisis)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Abstract') ?></th>
                <th><?= __('Severity') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Hashtags') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->crisis as $crisis): ?>
            <tr>
                <td><?= h($crisis->id) ?></td>
                <td><?= h($crisis->abstract) ?></td>
                <td><?= h($crisis->severity) ?></td>
                <td><?= h($crisis->longitude) ?></td>
                <td><?= h($crisis->latitude) ?></td>
                <td><?= h($crisis->state) ?></td>
                <td><?= h($crisis->address) ?></td>
                <td><?= h($crisis->type) ?></td>
                <td><?= h($crisis->hashtags) ?></td>
                <td><?= h($crisis->created) ?></td>
                <td><?= h($crisis->modified) ?></td>
                <td><?= h($crisis->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Crisis', 'action' => 'view', $crisis->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Crisis', 'action' => 'edit', $crisis->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Crisis', 'action' => 'delete', $crisis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crisis->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Infos') ?></h4>
        <?php if (!empty($user->infos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Crisis Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->infos as $infos): ?>
            <tr>
                <td><?= h($infos->id) ?></td>
                <td><?= h($infos->title) ?></td>
                <td><?= h($infos->body) ?></td>
                <td><?= h($infos->crisis_id) ?></td>
                <td><?= h($infos->user_id) ?></td>
                <td><?= h($infos->created) ?></td>
                <td><?= h($infos->modified) ?></td>
                <td><?= h($infos->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Infos', 'action' => 'view', $infos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Infos', 'action' => 'edit', $infos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Infos', 'action' => 'delete', $infos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $infos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
