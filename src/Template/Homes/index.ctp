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

<div class="row">


<?php $home_type = 'active' ?>
    <?php if ($home_type == 'active') { ?>

      <div class="medium-12 column text-center">
        <h2>Latest crisis:</h2>
      </div>

      <!-- plus importante crise -->
        <div class="row text-left">
          <div class="medium-12 large-12 small-12 columns">
            <div class="crisis-panel red radius"> 
              <div class="crisis-panel-label">
                <div class="label-text">
                  <?= $verifiedCrises->first()->severity ?>
                </div>
              </div>
              <div class="crisis-panel-content">
                <p>
                  <h3 class="crisis-panel-title"><?= $verifiedCrises->first()->address ?></h3>
                  <h4 class="crisis-panel-date subheader"><?= $verifiedCrises->first()->created ?></h3>
                </p>
                <p>
                  <h5 class="crisis-panel-state subheader"><?= $verifiedCrises->first()->type ?>:</h5>
                  <h5 class="crisis-panel-state subheader verified-state"><?= $verifiedCrises->first()->state ?></h5>
                </p>
                <p>
                  <?php $HTagsArray = explode(';', $verifiedCrises->first()->hashtags);?>
                  <?php foreach ($HTagsArray as $hashtag): ?>
                    <span class="label secondary round radius">#<?= $hashtag?></span>
                  <?php endforeach; ?>
                </p>
                <p>
                  <?= $verifiedCrises->first()->abstract ?>
                </p>

              </div>
            </div>
          </div>
        </div>

        <!-- Dernières crises + formulaire submit rapide-->
        <div class="row">
          <div class="small-6 large-8 columns">
            <!-- Dernières crises -->
            <div class="panel callout radius spotted-panel">
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
                              <span class="small crisis-panel-title"><?= $crisis->address ?></span>
                              <span class="small crisis-panel-date subheader"><?= $crisis->created ?></span>
                              <span class="small crisis-panel-state subheader"><?= $crisis->type ?>:</span>
                              <span class="small crisis-panel-state subheader spotted-state"><?= $crisis->state ?></span>
                              <br/>
                              <span class="small crisis-panel-abstract"><?php
                              $string = $crisis->abstract;
                              $string = (strlen($string) > 64) ? substr($string,0,64).'...' : $string; echo $string ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php endforeach; ?>
            </div>
            <div class="panel radius verified-panel">
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
                            <span class="small crisis-panel-title"><?= $crisis->address ?></span>
                            <span class="small crisis-panel-date subheader"><?= $crisis->created ?></span>
                            <span class="small crisis-panel-state subheader"><?= $crisis->type ?>:</span>
                            <span class="small crisis-panel-state subheader verified-state"><?= $crisis->state ?></span>
                            <br/>
                            <span class="small crisis-panel-abstract"><?php
                            $string = $crisis->abstract;
                            $string = (strlen($string) > 64) ? substr($string,0,64).'...' : $string; echo $string ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          </div>


          <div class="small-6 large-4 columns text-center submit-form">
            <!-- Formulaire TODO:vraie variable crisis-->

              <?= $this->Form->create($newCrisis, [
   'url' => ['controller' => 'Crisis', 'action' => 'add']
]); ?>
                  <legend><?= __('Submit crisis') ?></legend>
                  <?= $this->Form->input('abstract'); ?>
                  <label class='form-label'>Location:</label>
                  <?php       $types = array('auto' => 'Auto-detect', 'manual' => 'Manual entry');
                              $attributes = array( 'legend' => false,'label' => true,'class' => 'radio-loc', 'value'=>'');
                              echo $this->Form->radio('type', $types, $attributes);
                  ?>
                  <div id='submit_address'><?= $this->Form->input('address'); ?></div>
                  <?= $this->Form->input('type', array('type'=>'select', 'options'=>$types, 'label'=>false, 'empty'=>'Category')); ?>
                  <?= $this->Form->input('hashtags'); ?>
              <?= $this->Form->button(__('Submit')) ?>
              <?= $this->Form->end() ?>            </div>
          </div>

      <?php } else { ?>

      <?php }?>


</div>
