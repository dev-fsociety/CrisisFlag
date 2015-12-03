<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crisi->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crisi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Crisis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crisis form large-9 medium-8 columns content">
    <?= $this->Form->create($crisi) ?>
    <fieldset>
        <legend><?= __('Edit Crisi') ?></legend>
        <?php
            echo $this->Form->input('abstract');
            echo $this->Form->input('severity');
            echo $this->Form->input('longitude');
            echo $this->Form->input('latitude');
            echo $this->Form->input('state');
            echo $this->Form->input('address');
            echo $this->Form->input('type');
            echo $this->Form->input('hashtags');
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
