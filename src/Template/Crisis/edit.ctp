
<div class="crisis form large-12 medium-12 columns content">
    <?= $this->Form->create($crisi) ?>
    <fieldset>
        <legend><?= __('Éditer la crise') ?></legend>
        <?php
            echo $this->Form->input('abstract', ['label' => 'Résumé']);
            echo $this->Form->input('type', ['label' => 'Type']);
            echo $this->Form->input('hashtags', ['label' => 'Hashtags']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Mettre à jour')) ?>
    <?= $this->Form->end() ?>
</div>
