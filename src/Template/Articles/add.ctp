<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Ajouter article') ?></legend>
        <?php
<<<<<<< HEAD
            echo $this->Form->input('title', ['label' => 'Titre']);
            echo $this->Form->input('body', ['label' => 'Corps du texte']);
            echo $this->Form->input('category', ['label' => 'Catégorie']);
=======
            echo $this->Form->input('title', ['label' => 'Titre de l\'article :']);
            echo $this->Form->input('body', ['label' => 'Corps du texte :']);
            echo $this->Html->link("<br />", '/mycontroller/myaction', array('escape' => false));
            echo $this->Form->input('category', ['label' => 'Catégorie :']);
>>>>>>> ce759fd052f485f58385830fde33b08d3b005256
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>
</div>
