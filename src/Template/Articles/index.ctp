<nav class="medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Liste des Articles'), ['action' => 'index']) ?></li>

        <?php if($this->request->session()->read('Auth.User.id')): ?>

        <li><?= $this->Html->link(__('Nouvel Article'), ['action' => 'add']) ?></li>

       <?php endif; ?>

    </ul>
</nav>

<div class="row">
<h3 style="margin-top: 50px; margin-bottom: 40px; text-align: center;"><?= __('Articles') ?></h3>
  <?php foreach ($articles as $article): ?>
    <div class="articles index medium-4 columns content">
      <div class="panel">
        <h4 class="subheader"><?= $this->Html->link(__($article->title), ['action' => 'view', $article->id]) ?><hr></h4>
        <h5 class="subheader">
          <?php $this->Text->truncate($article->body, 50); ?>
        </h5>
        <em>Catégorie : <?= h($categories[$article->category]) ?><hr></em>

        <?php if($this->request->session()->read('Auth.User.id')): ?>

        <?= $this->Html->link(__('Éditer'), ['action' => 'edit', $article->id], array('class' => 'button secondary radius', 'style' => 'width: 49%;')) ?>
        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], array('class' => 'button secondary radius', 'style' => 'width: 49%;'), ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'article #{0} ?', $article->id)]) ?>

        <?php endif; ?>

      </div>
    </div>
  <?php endforeach; ?>
  <hr>
  <div class="paginator">
    <div class="panel" style="text-align: center">
      <ul class="pagination" style="width: 230px; margin: 0px auto;">
          <?= $this->Paginator->prev('<< ' . __('Précédente')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('Suivante') . ' >>') ?>
      </ul>
      <p><?= $this->Paginator->counter() ?></p>
    </div>
  </div>
</div>
