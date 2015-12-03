<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Utilisateurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'Utilisateur ? #{0} ?', $user->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editer utilisateur') ?></legend>
        <?php
            echo $this->Form->input('username', ['label' => 'Nom d\'utilisateur']);
            echo $this->Form->input('password', ['label' => 'Mot de passe']);
            echo $this->Form->input('description', ['label' => 'Description']);
            echo $this->Html->link("<br />", '/mycontroller/myaction', array('escape' => false));
            echo $this->Form->input('organisation', ['label' => 'Organisation']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
