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

<div class="row">
    <?php if ($home_type != 'none') { ?>

      <?php if ($home_type == 'active') {
         $frontCrisis=$verifiedCrises->first();
          echo "<div class='medium-12 column text-center'>";
          echo "<h2>Crise confirmée en cours!</h2>";
          echo "</div>";

        } else if ($home_type=='spotted') {
         $frontCrisis=$spottedCrises->first();
          echo "<div class='medium-12 column text-center'>";
          echo  "<h2>Crise rapportée par la communauté</h2>";
          echo "</div>";
       }?>

          <!-- plus importante crise -->
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
                      <h3 class="crisis-panel-title"><?= $this->Html->link($frontCrisis->address,['controller' => 'Crisis', 'action' => 'view', $frontCrisis->id]); ?></h3>
                      <h4 class="crisis-panel-date subheader"><?= $frontCrisis->created ?></h3>
                    </p>
                    <p>
                      <h5 class="crisis-panel-state subheader"><?= $categories[$frontCrisis->type] ?></h5>
                      <h5 class="crisis-panel-state subheader verified-state"><?= $frontCrisis->state ?></h5>
                      <?php $HTagsArray = explode(';', $frontCrisis->hashtags);?>
                      <?php foreach ($HTagsArray as $hashtag): ?>
                        <span class="label secondary round radius">#<?= $hashtag?></span>
                      <?php endforeach; ?>
                    </p>
                    <p>

                    </p>
                    <p>
                      <?= $frontCrisis->abstract ?>
                    </p>
                   <!-- <p class='text-center'>
                      <?= $this->Html->link(__('Voir la crise'), ['controller'=>'Crisis','action' => 'view',$frontCrisis->id], ['class' => 'expended button']);  ?>
                    </p> -->
                  </div>
                </div>
              </div>
            </div>

              <!-- Dernières crises + formulaire submit rapide-->
              <div class="row">
                <div class="small-12 medium-6 large-8 columns show-for-medium-up">
                  <!-- Dernières crises -->
                  <div class="panel callout radius spotted-panel">
                    <div class="row">
                      <div class="small-8 large-8 columns"><h4 class="subheader">Crises rapportées par la communauté:</h4></div>
                      <div class="small-2 large-4 columns text-right">
                        <?= $this->Html->link(__('Voir plus de crises'), ['controller'=>'Crisis','action' => 'index'], ['class' => 'tiny secondary button']);  ?>
                      </div>
                    </div>

                    <?php foreach ($spottedCrises as $crisis): ?>
                        <div class="row text-left">
                          <div class="medium-12 large-12 small-12 columns">
                            <div class="crisis-panel red radius small">
                              <div class="crisis-panel-label">
                                <div class="label-text">
                                  <?= $crisis->severity ?>
                                </div>
                              </div>
                              <div class="small-crisis-panel-content">
                                    <span class="small crisis-panel-title"><?= $this->Html->link($crisis->address,['controller' => 'Crisis', 'action' => 'view', $crisis->id]); ?></span>
                                    <span class="small crisis-panel-date subheader"><?= $crisis->created ?></span>
                                    <span class="small crisis-panel-state subheader"><?= $categories[$crisis->type] ?></span>
                                    <span class="small crisis-panel-state subheader spotted-state"><?= $crisis->state ?></span>
                                    <br/>
                                    <span class="small crisis-panel-abstract"><?php
                                    $string = $crisis->abstract;
                                    $string = (strlen($string) > 64) ? substr($string,0,64).'...' : $string; echo $string ?></span>
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
                  <div class="panel radius verified-panel">
                    <div class="row">
                      <div class="small-8 large-8 columns"><h4 class="subheader">Crises confirmées:</h4></div>
                      <div class="small-2 large-4 columns text-right">
                        <?= $this->Html->link(__('Voir plus de crises'), ['controller'=>'Crisis','action' => 'index'], ['class' => 'tiny secondary button']);  ?>
                      </div>
                    </div>

                    <?php foreach ($verifiedCrises as $crisis): ?>
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
                                  <span class="small crisis-panel-state subheader">$categories[$crisis->type]</span>
                                  <span class="small crisis-panel-state subheader verified-state"><?= $crisis->state ?></span>
                                  <br/>
                                  <span class="small crisis-panel-abstract"><?php
                                  $string = $crisis->abstract;
                                  $string = (strlen($string) > 64) ? substr($string,0,64).'...' : $string; echo $string ?></span>
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
                </div>
            <div class="small-12 medium-6 large-4 columns text-center submit-form">
              <?= $this->Form->create($newCrisis, ['url' => ['controller' => 'Crisis', 'action' => 'add'], 'method' => 'post']); ?>
              <fieldset>
                  <legend><?= __('Soumettre une crise') ?></legend>
                  <!-- Hidden fields-->
                  <?php echo $this->Form->hidden('severity');
                      echo $this->Form->hidden('longitude');
                      echo $this->Form->hidden('latitude');
                      echo $this->Form->hidden('state');
                   ?>
                  <?=  $this->Form->input('abstract'); ?>
                  <label class='form-label'>Localisation de la crise :</label>
                  <?php       $types = array('auto' => ' Détection automatique', 'manual' => ' Entrer manuellement');
                              $attributes = array( 'legend' => false,'label' => true,'class' => 'radio-loc', 'value'=>'auto');
                              echo $this->Form->radio('type', $types, $attributes);
                  ?>
                  <a id="geolocate" class="button" ><i class="fi-arrow-right large"></i> Localiser mon appareil</a>
                  <?= $this->Form->input('address', ['label' => 'Adresse']); ?>

                  <?= $this->Form->input('type', array('type'=>'select', 'options'=>$categories, 'label'=>false, 'empty'=>'Categorie')); ?>

                  <?= $this->Form->input('hashtags'); ?>
              </fieldset>
              <div class="small button-group">
                <?= $this->Form->button(__('Submit')) ?>

                <a id="reset" class="button">Reset</a>
              </div>

              <?= $this->Form->end() ?>
            </div>
          </div>

      <?php } else { ?>

      <?php if ($articles->isEmpty()==false) { ?>

      <div class="row">

      <div class="row text-center">
        <h2>Il n'y a pas d'évènements majeurs actuellement ! </h2>
      </div>

        <div class="row">
        <h3 style="margin-top: 20px; margin-bottom: 30px; text-align: center;"><?= __('Articles') ?></h3>

            <div class="articles index small-12 medium-6 large-4 columns content">
              <div class="panel ">
                <h4 class="home-article title">
                  <?= $articles->toArray()[0]->title; ?>
                </h4>
                <h5 class="home-article category subheader">
                  <?= $articles->toArray()[0]->created; ?>
                   in
                  <?= $articles->toArray()[0]->category; ?>
                </h5>
                <p class="home-article content">
                  <?= $articles->toArray()[0]->body; ?>
                </p>
              </div>
            </div>
            <div class="articles index small-12 medium-6 large-4 columns content">
              <div class="panel">
                <h4 class="home-article title">
                  <?= $articles->toArray()[1]->title; ?>
                </h4>
                <h5 class="home-article category subheader">
                  <?= $articles->toArray()[1]->created; ?>
                   in
                  <?= $articles->toArray()[1]->category; ?>
                </h5>
                <p class="home-article content">
                  <?= $articles->toArray()[1]->body; ?>
                </p>
              </div>
            </div>


            <div class="small-12 medium-6 large-4 columns text-center submit-form">
              <?= $this->Form->create($newCrisis, ['url' => ['controller' => 'Crisis', 'action' => 'add'], 'method' => 'post']); ?>
              <fieldset>
                  <legend><?= __('Submit crisis') ?></legend>
                  <!-- Hidden fields-->
                  <?php echo $this->Form->hidden('severity');
                      echo $this->Form->hidden('longitude');
                      echo $this->Form->hidden('latitude');
                      echo $this->Form->hidden('state');
                   ?>
                  <?=  $this->Form->input('abstract'); ?>
                  <label class='form-label'>Location:</label>
                  <?php       $types = array('auto' => 'Auto-detect', 'manual' => 'Manual entry');
                              $attributes = array( 'legend' => false,'label' => true,'class' => 'radio-loc', 'value'=>'auto');
                              echo $this->Form->radio('type', $types, $attributes);
                  ?>
                  <a id="geolocate" class="button" ><i class="fi-arrow-right large"></i> GeoMe</a>
                  <?= $this->Form->input('address'); ?>
                  <?php       $types = array('1' => 'Séisme', '2' => 'Zombies'); ?>
                  <?= $this->Form->input('type', array('type'=>'select', 'options'=>$types, 'label'=>false, 'empty'=>'Category')); ?>
                  <?= $this->Form->input('hashtags'); ?>
              </fieldset>
              <div class="small button-group">
                <?= $this->Form->button(__('Submit')) ?>

                <a id="reset" class="button">Reset</a>
              </div>

              <?= $this->Form->end() ?>
            </div>
          </div>
          <br/>
          <div class="row">
            <div class="small-12 medium-12 large-12 columns">

            <?php foreach($articles as $article): ?>
                <div class="panel ">
                  <h4 class="home-article title">
                    <?= $article->title; ?>
                  </h4>
                  <h5 class="home-article category subheader">
                    <?= $article->created; ?>
                     in
                    <?= $article->category; ?>
                  </h5>
                  <p class="home-article content">
                    <?= $article->body; ?>
                  </p>
                </div>
            <?php endforeach;?>
            </div>
          </div>
        <?php } else { ?>
          <div class="show-for-medium-up small-12 medium-3 large-4 columns">
            <br/>
          </div>
          <div class="small-12 medium-6 large-4 columns text-center submit-form">
            <?= $this->Form->create($newCrisis, ['url' => ['controller' => 'Crisis', 'action' => 'add'], 'method' => 'post']); ?>
            <fieldset>
                <legend><?= __('Submit crisis') ?></legend>
                <!-- Hidden fields-->
                <?php echo $this->Form->hidden('severity');
                    echo $this->Form->hidden('longitude');
                    echo $this->Form->hidden('latitude');
                    echo $this->Form->hidden('state');
                 ?>
                <?=  $this->Form->input('abstract'); ?>
                <label class='form-label'>Location:</label>
                <?php       $types = array('auto' => 'Auto-detect', 'manual' => 'Manual entry');
                            $attributes = array( 'legend' => false,'label' => true,'class' => 'radio-loc', 'value'=>'auto');
                            echo $this->Form->radio('type', $types, $attributes);
                ?>
                <a id="geolocate" class="button" ><i class="fi-arrow-right large"></i> GeoMe</a>
                <?= $this->Form->input('address'); ?>
                <?php       $types = array('1' => 'Séisme', '2' => 'Zombies'); ?>
                <?= $this->Form->input('type', array('type'=>'select', 'options'=>$types, 'label'=>false, 'empty'=>'Category')); ?>
                <?= $this->Form->input('hashtags'); ?>
            </fieldset>
            <div class="small button-group">
              <?= $this->Form->button(__('Submit')) ?>

              <a id="reset" class="button">Reset</a>
            </div>
          </div>
            <div class="show-for-medium-up small-12 medium-3 large-4 columns">
              <br/>
            </div>
      <?php }?>



    <?php }?>



</div>
