<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Utilisateurs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Ajouter utilisateur') ?></legend>
        <?php
        echo $this->Form->input('username', ['label' => 'Nom d\'utilisateur']);
        echo $this->Form->input('password', ['label' => 'Mot de passe']);
        echo $this->Form->input('description', ['label' => 'Description']);
        echo "<br />";
        echo $this->Form->input('organisation', ['label' => 'Organisation']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
