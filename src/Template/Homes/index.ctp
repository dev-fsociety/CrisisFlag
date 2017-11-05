<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<?php $this->assign('script', 'geoloc.js'); ?>

<?= $this->start('submit-form') ?>
<div class="small-12 medium-6 large-4 columns text-center submit-form">
  <?= $this->Form->create($newCrisis, ['url' => ['controller' => 'Crisis', 'action' => 'add'], 'method' => 'post']); ?>
  <fieldset>
    <legend><?= __('Soumettre une crise') ?></legend>
    <?php
      echo $this->Form->hidden('severity');
      echo $this->Form->hidden('longitude');
      echo $this->Form->hidden('latitude');
      echo $this->Form->hidden('state');
    ?>
    <?= $this->Form->input('abstract', ['label' => 'En quelques mots...']); ?>
    <label class='form-label'>Localisation de la crise :</label>
    <?php
      $types = array('auto' => 'Détection automatique', 'manual' => ' Entrer manuellement');
      $attributes = array('legend' => false, 'label' => true, 'class' => 'radio-loc', 'value' => 'auto');
      echo $this->Form->radio('type', $types, $attributes);
    ?>
    <a id="geolocate" class="button" ><i class="fi-arrow-right large"></i> Localiser mon appareil</a>
    <?= $this->Form->input('address', ['label' => 'Adresse']); ?>
    <?= $this->Form->input('type', array('type' => 'select', 'options' => $categories, 'label' => false, 'empty' => 'Catégorie')); ?>
    <?= $this->Form->input('hashtags', ['placeholder' => '#']); ?>
  </fieldset>
  <div class="small button-group">
    <?= $this->Form->button(__('Soumettre')) ?>
    <?= $this->Form->button('Reset', array('type' => 'reset')); ?>
  </div>
  <?= $this->Form->end() ?>
</div>
<?= $this->end() ?>

<div class="row">
    <?php if($home_type != 'none') { ?>
      <?php
        if($home_type === 'active')
        {
          $frontCrisis = $verifiedCrises->first();
          echo "<div class='medium-12 column text-center'>";
          echo "<h2>Crise confirmée actuelle !</h2>";
          echo "</div>";
        }
        else if($home_type === 'spotted')
        {
          $frontCrisis = $spottedCrises->first();
          echo "<div class='medium-12 column text-center'>";
          echo  "<h2>Dernière crise signalée par la communauté:</h2>";
          echo "</div>";
        }
      ?>
      <!-- Crise la plus importante actuelle -->
      <div class="row text-left">
        <div class="medium-12 large-12 small-12 columns">
          <div class="crisis-panel red radius">
            <div class="crisis-panel-label">
              <div class="label-text">
                <?= $frontCrisis->severity ?>
              </div>
            </div>
            <div class="crisis-panel-content">
              <p>
                <h3 class="crisis-panel-title"><?= $this->Html->link($frontCrisis->address, ['controller' => 'Crisis', 'action' => 'view', $frontCrisis->id]); ?>
                </h3>
                <h4 class="crisis-panel-date subheader"><?= $frontCrisis->created ?></h4>
              </p>
              <p>
                <h5 class="crisis-panel-state subheader"><?= $categories[$frontCrisis->type]; ?></h5>
                <h5 class="crisis-panel-state subheader verified-state"><?= $frontCrisis->state; ?></h5>
                <?php $HTagsArray = explode(';', $frontCrisis->hashtags); ?>

                <?php foreach ($HTagsArray as $hashtag): ?>

                  <span class="label secondary round radius">#<?= $hashtag ?></span>

                <?php endforeach; ?>

              </p>
              <p>
                <?= $frontCrisis->abstract; ?>
              </p>
              <p class='text-center'>
                <?= $this->Html->link(__('Consulter cette crise'), ['controller' => 'Crisis', 'action' => 'view', $frontCrisis->id], ['class' => 'round alert button']); ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Dernières crises + Formulaire submit de crise-->
      <div class="row">
        <div class="small-12 medium-6 large-8 columns show-for-medium-up">
          <!-- Dernières crises -->
          <div class="panel callout radius spotted-panel">
            <div class="row">
              <div class="small-8 large-8 columns">
                <h4 class="subheader">Crises signalées par la communauté:</h4>
              </div>
              <div class="small-2 large-4 columns text-right">
                <?= $this->Html->link(__('Voir plus de crises'), ['controller' => 'Crisis', 'action' => 'index'], ['class' => 'tiny secondary button']); ?>
              </div>
            </div>
            <?php foreach ($spottedCrises as $crisis) : ?>
                <div class="row text-left">
                  <div class="medium-12 large-12 small-12 columns">
                    <div class="crisis-panel red radius small">
                      <div class="crisis-panel-label">
                        <div class="label-text">
                          <?= $crisis->severity ?>
                        </div>
                      </div>
                      <div class="small-crisis-panel-content">
                        <span class="small crisis-panel-title"><?= $this->Html->link($crisis->address, ['controller' => 'Crisis', 'action' => 'view', $crisis->id]); ?></span>
                        <span class="small crisis-panel-date subheader"><?= $crisis->created ?></span>
                        <span class="small crisis-panel-state subheader"><?= $categories[$crisis->type] ?></span>
                        <span class="small crisis-panel-state subheader spotted-state"><?= $crisis->state ?></span>
                        <br/>
                        <span class="small crisis-panel-abstract">
                          <?php $this->Text->truncate($crisis->abstract, 64); ?>
                        </span>
                        <br/>
                        <div class="small button-group">
                          <?= $this->Form->postLink(__(' Vrai'), ['controller' => 'Crisis', 'action' => 'severityIncrement', $crisis->id], ['class' => 'fi-arrow-up medium Success']) ?>
                          <?= $this->Form->postLink(__(' Faux'), ['controller' => 'Crisis', 'action' => 'severityDecrement', $crisis->id], ['class' => 'fi-arrow-down medium Alert']) ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endforeach; ?>
          </div>

          <?php if($verifiedCrises->count() > 0) : ?>

            <div class="panel radius verified-panel">
              <div class="row">
                <div class="small-8 large-8 columns">
                  <h4 class="subheader">Crises confirmées:</h4>
                </div>
                <div class="small-2 large-4 columns text-right">
                  <?= $this->Html->link(__('Voir plus de crises'), ['controller' => 'Crisis', 'action' => 'index'], ['class' => 'tiny secondary button']); ?>
                </div>
              </div>

              <?php foreach ($verifiedCrises as $crisis) : ?>

                <div class="row text-left">
                  <div class="medium-12 large-12 small-12 columns">
                    <div class="crisis-panel red radius small">
                      <div class="crisis-panel-label">
                        <div class="label-text">
                          <?= $crisis->severity ?>
                        </div>
                      </div>
                      <div class="small-crisis-panel-content">
                        <span class="small crisis-panel-title">
                          <?= $this->Html->link($crisis->address, ['controller' => 'Crisis', 'action' => 'view', $crisis->id]); ?>
                        </span>
                        <span class="small crisis-panel-date subheader"><?= $crisis->created ?></span>
                        <span class="small crisis-panel-state subheader"><?= $categories[$crisis->type] ?></span>
                        <span class="small crisis-panel-state subheader verified-state"><?= $crisis->state ?></span>
                        <br/>
                        <span class="small crisis-panel-abstract">
                          <?php $this->Text->truncate($crisis->abstract, 64); ?>
                        </span>
                        <br/>
                        <div class="small button-group">
                          <?= $this->Form->postLink(__('Yes'), ['controller' => 'Crisis','action' => 'severityIncrement', $crisis->id], ['class' => ' fi-arrow-up medium  Success ']) ?>
                          <?= $this->Form->postLink(__('No') , ['controller' => 'Crisis','action' => 'severityDecrement', $crisis->id], ['class' => ' fi-arrow-down medium  Alert ']) ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>

            </div>

          <?php endif; ?>

        </div>

        <?= $this->fetch('submit-form') ?>

      </div>

      <?php } else { ?>

        <?php if($articles->isEmpty() == false) { ?>

          <div class="row">
            <div class="row text-center">
              <h2><br/>Il n'y a pas d'évènement majeur actuellement !</h2>
            </div>
            <div class="row">
              <h3 style="margin-top: 20px; margin-bottom: 30px; text-align: center;"><?= __('Nous vous proposons de jeter un coup d\'œil à nos articles de sensibilisation:') ?></h3>

              <?php if($articles->count() != 0) : ?>

              <div class="articles index small-12 medium-6 large-4 columns content">
                <div class="panel ">
                  <h4 class="home-article title">
                    <?= $this->Html->link(__($articles->toArray()[0]->title), ['controller' => 'articles', 'action' => 'view', $articles->toArray()[0]->id]); ?>
                  </h4>
                  <h5 class="home-article category subheader">
                    <?= $articles->toArray()[0]->created; ?>
                  </h5>
                  <p class="home-article content">
                    <?= $this->Text->truncate($articles->toArray()[0]->body, 600); ?>
                  </p>
                </div>
              </div>

              <?php endif; if($articles->count() > 1) : ?>

              <div class="articles index small-12 medium-6 large-4 columns content">
                <div class="panel">
                  <h4 class="home-article title">
                    <?= $this->Html->link(__($articles->toArray()[1]->title), ['controller' => 'articles', 'action' => 'view', $articles->toArray()[1]->id]); ?>
                  </h4>
                  <h5 class="home-article category subheader">
                    <?= $articles->toArray()[1]->created; ?>
                  </h5>
                  <p class="home-article content">
                    <?= $this->Text->truncate($articles->toArray()[1]->body, 600); ?>
                  </p>
                </div>
              </div>

              <?php endif; ?>

              <?= $this->fetch('submit-form') ?>

            </div>
            <br/>
            <div class="row">
              <div class="small-12 medium-12 large-12 columns">

                <?php $_k = -1; foreach($articles as $article): $_k++; if($_k < 2) : continue; endif; ?>

                  <div class="panel ">
                    <h4 class="home-article title">
                      <?= $this->Html->link(__($article->title), ['controller' => 'articles', 'action' => 'view', $article->id]); ?>
                    </h4>
                    <h5 class="home-article category subheader">
                      <?= $article->created; ?>
                    </h5>
                    <p class="home-article content">
                      <?= $this->Text->truncate($article->body, 256); ?>
                    </p>
                  </div>

                <?php endforeach;?>

              </div>
            </div>

          <?php } else { ?>

            <div class="show-for-medium-up small-12 medium-3 large-4 columns">
              <br/>
            </div>

            <?= $this->fetch('submit-form') ?>

            <div class="show-for-medium-up small-12 medium-3 large-4 columns">
              <br/>
            </div>

          <?php } ?>

      <?php } ?>

</div>
