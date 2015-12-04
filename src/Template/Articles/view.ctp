<br/>
<?php $this->set('css','css_view.css');?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">

        <center><li class="heading"><?= __('Actions') ?></li></center>
        <li class="menu_impair"><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li class="menu_pair"><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li class="menu_impair"><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li class="menu_pair"><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li class="menu_impair"><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li class="menu_pair"><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>


    </ul>
</nav>





<div class="articles view large-10 medium-9 columns content">
     
	 
	 <div class="crisis-panel red radius">
              <div class="crisis-panel-label">
                
              </div>
              <div class="crisis-panel-content">

                <p>
                  <h2 class="crisis-panel-title"><?= h($article->title) ?></h2>
                  <h4 class="crisis-panel-date subheader"><?= h($article->category) ?></h4>
                </p>
                
               
                <p>
                  <?= $this->Text->autoParagraph(h($article->body)); ?>
                </p>
				
				
            </div>
             
		</div>	

			<div class="row">
				
				  <div class="small-9 large-9 medium columns"><?= __('User') ?>: <?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></div>
				  <div class="small-3 large-3 columns"><?= __('Created') ?>: <?= h($article->created) ?><br/>
														<?= __('Modified') ?>: <?= h($article->modified) ?>
			 </div>

              
	
	
	
	
	
	
	
	
	
	
	   
	
	
</div>
