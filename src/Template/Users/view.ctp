<?php $this->assign('css', 'users_view.css'); ?>
<!-- this adds Foundation Icon Fonts!! -->

<div class="row">
    <div class="medium-15 ">
        <div class="profile-card">
            <img src="http://www.demacmedia.com/wp-content/uploads/2014/04/330x330xYeti-Feature-Small-2.png.pagespeed.ic.ASS9EY8apS.png" alt="Yeti">
            <div class="profile-info">
                <h4 class="subheader"><?= h($user->username) ?></h4>
                <p>Organisation : <?= h($user->organisation) ?></p>
                <p><strong>Description - </strong><?= (h($user->description)); ?></p>
                <p><?= h($user->created) ?> | <?= h($user->modified) ?></p>
                <ul class="inline-list" style="margin:0 auto;">
                <?php if($this->request->session()->read('Auth.User.username')) : ?>

                    <div class="edit-button"><?= $this->Html->link(__('Éditer'), ['action' => 'edit', $user->id]); ?></div>

                <?php else : ?>

                    <?= $this->Html->link(__('Retour à larticle'), $this->request->referer(), array('class' => 'expanded button')); ?>

                <?php endif; ?>

            </div>
        </div>
    </div>

</div>

