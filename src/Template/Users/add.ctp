<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crisis'), ['controller' => 'Crisis', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crisi'), ['controller' => 'Crisis', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Infos'), ['controller' => 'Infos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Info'), ['controller' => 'Infos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('description');
            echo $this->Form->input('organisation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
