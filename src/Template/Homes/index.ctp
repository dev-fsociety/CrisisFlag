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





<?php
if ($home_type == 'active')
{
    echo $home_type;
} else {
    echo "zgeg";
}
?>

      <div class="medium-12 column text-center">
        <h2>Latest crisis:</h2>
      </div>

      <!-- plus importante crise -->
        <div class="row text-left">
          <div class="medium-12 large-12 small-12 columns">
            <div class="crisis-panel red radius">
              <div class="crisis-panel-label">
                <div class="label-text">
                  !!!
                </div>
              </div>
              <div class="crisis-panel-content">

                <p>
                  <h3 class="crisis-panel-title">Crisis location</h3>
                  <h4 class="crisis-panel-date subheader">Crisis date</h3>
                </p>
                <p>
                  <h5 class="crisis-panel-state subheader">Crisis type</h5>
                  <h5 class="crisis-panel-state subheader">Crisis state</h5>
                </p>
                <p>
                  <span class="label secondary round radius">tag 1</span>
                  <span class="label secondary round radius">tag 2</span>
                  <span class="label secondary round radius">tag 3</span>
                  <span class="label secondary round radius">tag 4</span>
                  <span class="label secondary round radius">tag 5</span>
                </p>

                <p>
                  Crisis description. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

              </div>
            </div>
          </div>
        </div>

        <!-- Dernières crises + formulaire submit rapide-->
        <div class="row">
          <div class="small-6 large-8 columns">
            <!-- Dernières crises -->
            <ul>
              <li>Element 1</li>
              <li>Element 2</li>
              <li>Element 3</li>
              <li>Element 4</li>
              <li>Element 5</li>
              <li>Element 6</li>
              <li>Element 7</li>
            </ul>
          </div>


          <div class="small-6 large-4 columns text-center submit-form">
            <!-- Formulaire -->
              <?= $this->Form->create($crisi) ?>
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


</div>
