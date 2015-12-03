<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $info->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'info #{0} ?', $info->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste des informations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des utilisateurs'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nouvel utilisateur'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="infos form large-9 medium-8 columns content">
    <?= $this->Form->create($info) ?>
    <fieldset>
        <legend><?= __('Editer l\'information') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => 'Titre']);
            echo $this->Form->input('body', ['label' => 'Corps du texte']);
            echo $this->Form->input('crisis_id', ['label' => 'ID crise']);
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'ID utilisateur']);
            echo $this->Form->input('type', ['label' => 'Type']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
