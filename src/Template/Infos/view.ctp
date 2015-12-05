<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nouvelle information'), ['controller' => 'infos', 'action' => 'add', $info->crisis_id]) ?> </li>
        <li><?= $this->Html->link(__('Éditer l\'information'), ['action' => 'edit', $info->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer l\'information'), ['action' => 'delete', $info->id], ['confirm' => __('Êtes-vous sûr de vouloir supprimer l\'information # {0}?', $info->id)]) ?> </li>
    </ul>
</nav>
<div class="infos view large-9 medium-8 columns content">
    <h2><?= __('Information n°{0} sur la crise n°{1}', $info->id, $info->crisis_id) ?></h2>
    <table class="vertical-table">
        <tr>
            <th><?= __('Numéro') ?></th>
            <td><?= $this->Number->format($info->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Titre') ?></th>
            <td><?= h($info->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Auteur') ?></th>
            <td><?= $info->has('user') ? $this->Html->link($info->user->id, ['controller' => 'Users', 'action' => 'view', $info->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($info->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Identifiant de crise') ?></th>
            <td><?= $this->Number->format($info->crisis_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Créée le') ?></th>
            <td><?= h($info->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modifée le') ?></th>
            <td><?= h($info->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h3><?= __('Information') ?></h3>
        <?= $this->Text->autoParagraph(h($info->body)); ?>
    </div>
</div>
