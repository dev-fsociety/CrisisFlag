<nav class="medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouvel article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Éditer l\'article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer l\'article'), ['action' => 'delete', $article->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'article # {0}?', $article->id)]) ?> </li>
    </ul>
</nav>

<div class="row"  style="margin-top: 50px; margin-bottom: 40px;">
  <div class="articles view medium-10 columns content">
    <div class="panel radius">
        <h3 style="margin-top: 10px; text-align: center;"><?= __($article->title) ?><hr></h3>
        <h7 style="font-size: 80%" class="subheader">Catégorie : <?= h($article->category) ?><hr></h7>
        <h5 class="subheader"><?= __($article->body) ?></h5>
	  </div>
  </div>
</div>

<div class="row">
    <div class="medium-10 columns" style="text-align: right">
      <?= __('User') ?>: <?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?><br>
      <?= __('Created') ?>: <?= h($article->created) ?><br>
			<?= __('Modified') ?>: <?= h($article->modified) ?>
	   </div>
  </div>
