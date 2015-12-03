<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Supprimer la crise'),
                ['action' => 'delete', $crisi->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer la crise #{0} ?', $crisi->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Liste des crises'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Liste des utilisateurs'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nouvel utilisateur'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crisis form large-9 medium-8 columns content">
    <?= $this->Form->create($crisi) ?>
    <fieldset>
        <legend><?= __('Editer la crise') ?></legend>
        <?php
            echo $this->Form->input('abstract', ['label' => 'Résumé']);
            echo $this->Form->input('severity', ['label' => 'Gravité']);
            echo $this->Form->input('longitude', ['label' => 'Longitude', 'minLongi' => -180.0000, 'maxLongi' => 180.0000]);
            echo $this->Form->input('latitude', ['label' => 'Latitude', 'minLati' => -90.0000, 'maxLati' => 90.0000]);
            echo $this->Form->input('state', ['label' => 'Pays']);
            echo $this->Form->input('address', ['label' => 'Adresse']);
            echo $this->Form->input('type', ['label' => 'Type']);
            echo $this->Form->input('hashtags', ['label' => 'Hashtags']);
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'ID utilisateur']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
