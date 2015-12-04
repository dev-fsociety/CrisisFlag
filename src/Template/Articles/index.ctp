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
        <h5 class="subheader"><?php $string = $article->body;
                              $string = (strlen($string) > 50) ? substr($string,0,50).' (...)' : $string; echo $string
                              ?>
        </h5>
        <em>Catégorie : <?= h($article->category) ?><hr></em>

        <?php if($this->request->session()->read('Auth.User.id')): ?>

        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $article->id], array('class' => 'button secondary radius', 'style' => 'width: 49%;')) ?>
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
