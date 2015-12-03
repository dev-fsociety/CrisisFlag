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

 $fsociety = "/dev/fsociety - ";
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $fsociety ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Cake default style -->
    <!--<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>-->

    <!-- Foundation style -->
    <?= $this->Html->css('foundation.css') ?>

    <!-- Own style -->
    <?= $this->Html->css('app.css') ?>

    <!-- Footer style -->
    <?= $this->Html->css('footer.css') ?>

    <?= $this->fetch('meta') ?>

    <!-- Page specific style -->
    <?= $this->fetch('css') ?>
</head>
<body>

    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">

            <nav class="tab-bar">
                <div class="left-small">
                    <a role="button" aria-expanded="false" aria-controls="idOfLeftMenu" class="left-off-canvas-toggle menu-icon" ><span></span></a>
                </div>
                <div class="middle tab-bar-section">
                    <a href="#" id="menu-text">Menu</a>
                </div>
            </nav>
            
<!-- Topbar -->
            <nav class="left-off-canvas-menu">
                <ul class="off-canvas-list">
                    <li><label>Menu</label></li>
                    <li><?= $this->Html->link(__('Home'),     ['controller'=>'Home', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Articles'), ['controller'=>'Articles', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Crisis'),   ['controller'=>'Crisis', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Infos'),    ['controller'=>'Infos', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('Users'),    ['controller'=>'Users', 'action' => 'add']) ?></li>
                </ul>
            </nav>

<!-- /Topbar -->


            <?= $this->Flash->render() ?>
            <section class="container clearfix">
                <?= $this->fetch('content') ?>
            </section>


<!-- Footer -->
            <footer class="footer">
              <div class="row">
                <div class="small-12 columns">
                    <p class="slogan">/dev/fsociety</p>
                        <p class="links">
                        
                        <a href="#"><?= $this->Html->link(__('Home'),                ['controller'=>'Home', 'action' => 'index']) ?></a>
                        <a href="#"><?= $this->Html->link(__('About us'),            ['controller'=>'Home', 'action' => 'index'])?></a>
                        <a href="#"><?= $this->Html->link(__('Contact our team'),    ['controller'=>'Home', 'action' => 'index'])?></a>
                       
                        </p>
                    <p class="copywrite">Fsociety all rights reserved © 2015</p>
                </div>
              </div>
            </footer>
<!-- /Footer -->

        </div>
    </div>

    <!-- Foundation (+jquery) scripts -->
    <?= $this->Html->script("vendor/jquery.min.js") ?>
    <?= $this->Html->script("vendor/what-input.min.js") ?>
    <?= $this->Html->script("foundation/foundation.js") ?>
    <?= $this->Html->script("foundation/foundation.topbar.js") ?>

    <!-- Own script -->
    <!-- Topbar -->
    <?= $this->Html->script('foundation/foundation.offcanvas.js') ?>  

    <?= $this->Html->script("app.js") ?>
        



    <!-- Page specific script (always load last) -->
    <?= $this->fetch('script') ?>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
