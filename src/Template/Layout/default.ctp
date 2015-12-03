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

    <?= $this->fetch('meta') ?>

    <!-- Page specific style -->
    <?= $this->fetch('css') ?>
</head>
<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">/dev/fsociety : the best device ever!</a></h1>
      </li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="active"><a href="#">Right Button Active</a></li>
        <li class="has-dropdown">
          <a href="#">Right Button Dropdown</a>
          <ul class="dropdown">
            <li class="active"><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
            <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </nav>

    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>

    <!-- Foundation (+jquery) scripts -->
    <?= $this->Html->script("vendor/jquery.min.js") ?>
    <?= $this->Html->script("vendor/what-input.min.js") ?>
    <?= $this->Html->script("foundation/foundation.js") ?>
    <?= $this->Html->script("foundation/foundation.topbar.js") ?>

    <!-- Own script -->
    <?= $this->Html->script("app.js") ?>

    <!-- Page specific script (always load last) -->
    <?= $this->fetch('script') ?>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
