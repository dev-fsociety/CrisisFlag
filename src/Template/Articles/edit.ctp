<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Supprimer l\'article'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'article #{0} ?', $article->id)]
        )
        ?></li>
        <li><?= $this->Html->link(__('Liste des articles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Éditer l\'article') ?></legend>
        <?php
            echo $this->Form->input('title', ['label' => 'Titre de l\'article']);
            echo $this->Form->input('body', ['label' => 'Corps du texte']);            echo "<br />";
            echo $this->Form->input('category', array('type' => 'select', 'options' => $categories, 'label' => 'Catégorie'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->end() ?>


</div>
