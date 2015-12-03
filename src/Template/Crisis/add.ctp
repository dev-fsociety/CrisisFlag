<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Crises'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="crisis form large-9 medium-8 columns content">
    <?= $this->Form->create($crisi) ?>
    <fieldset>
        <legend><?= __('Ajouter une crise') ?></legend>
        <?php
            echo $this->Form->input('abstract', ['label' => 'Résumé']);
            echo $this->Form->input('severity', ['label' => 'Gravité']);
            echo $this->Form->input('longitude', ['label' => 'Longitude', 'minLongi' => -180.0000, 'maxLongi' => 180.0000]);
            echo $this->Form->input('latitude', ['label' => 'Latitude', 'minLati' => -90.0000, 'maxLati' => 90.0000]);
            echo $this->Form->input('state', ['label' => 'Etat']);
            echo $this->Form->input('address', ['label' => 'Adresse']);
            echo $this->Form->input('type', ['label' => 'Type']);
            echo $this->Form->input('hashtags', ['label' => 'Hashtags']);
            echo $this->Form->input('user_id', ['options' => $users, 'label' => 'ID utilisateur']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
