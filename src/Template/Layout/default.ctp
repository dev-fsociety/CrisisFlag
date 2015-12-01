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
    <?= $this->Html->css('foundation.min.css') ?>

    <!-- Own style -->
    <?= $this->Html->css('app.css') ?>

    <?= $this->fetch('meta') ?>

    <!-- Page specific style -->
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">/dev/fsociety : the best device ever!</li>
        </ul>
      </div>

      <div class="top-bar-right">
        <ul class="dropdown menu" data-dropdown-menu>
            <li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
            <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
        </ul>
      </div>
    </div>

    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>

    <!-- Foundation (+jquery) scripts -->
    <?= $this->Html->script("vendor/jquery.min.js") ?>
    <?= $this->Html->script("vendor/what-input.min.js") ?>
    <?= $this->Html->script("foundation.min.js") ?>

    <!-- Own script -->
    <?= $this->Html->script("app.js") ?>

    <!-- Page specific script (always load last) -->
    <?= $this->fetch('script') ?>
</body>
</html>
