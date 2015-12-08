<nav class="medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nouvel utilisateur'), ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="row">
    <div class="users index large-12 medium-12 columns content">
        <h3 style="margin-top: 50px; margin-bottom: 40px; text-align: center;"><?= __('Utilisateurs') ?></h3>
        <table cellpadding="0" cellspacing="0" style="margin: 0px auto; width: 100%;">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Numéro']) ?></th>
                    <th><?= $this->Paginator->sort('username', ['label' => 'Identifiant']) ?></th>
                    <th><?= $this->Paginator->sort('password', ['label' => 'Mot de passe']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Créé le']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Modifié le']) ?></th>
                    <th><?= $this->Paginator->sort('organisation', ['label' => 'Organisation']) ?></th>
                    <th class="actions text-center"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($this->Text->truncate($user->password, 16)) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td><?= h($user->organisation) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Aperçu'), ['action' => 'view', $user->id]) ?> |
                        <?= $this->Html->link(__('Éditer'), ['action' => 'edit', $user->id]) ?> |
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'utilisateur #{0} ?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>