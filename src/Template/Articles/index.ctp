<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nouvel Article'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="row">
<div class="articles index large-3 medium-5 columns content" >
    <h3 style="margin-top: 20px; margin-bottom: 20px;"><?= __('Articles') ?></h3>
    <table cellpadding="0" cellspacing="0">
    Mmdrrrrrrrrrrrrr
</div>
<div class="articles index large-3 medium-5 columns content" >
    <table cellpadding="0" cellspacing="0">
    Mmdrrrrrrrrrrrrr
</div>
<div class="articles index large-3 medium-5 columns content" >
    <table cellpadding="0" cellspacing="0">
    Mmdrrrrrrrrrrrrr
</div>
</div>
<!-- <div class="articles index large-3 medium-9 columns content" >
    <h3 style="margin-top: 20px; margin-bottom: 20px;"><?= __('Articles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', ['label' => 'ID']) ?></th>
                <th><?= $this->Paginator->sort('title', ['label' => 'Titre']) ?></th>
                <th><?= $this->Paginator->sort('created', ['label' => 'Créé le']) ?></th>
                <th><?= $this->Paginator->sort('modified', ['label' => 'Modifié le']) ?></th>
                <th><?= $this->Paginator->sort('user_id', ['label' => 'ID utilisateur']) ?></th>
                <th><?= $this->Paginator->sort('category', ['label' => 'Catégorie']) ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td><?= h($article->modified) ?></td>
                <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                <td><?= h($article->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $article->id]) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'article #{0} ?', $article->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div> -->
