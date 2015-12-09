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

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'CrisisFlag - ' . $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Foundation style -->
    <?= $this->Html->css('foundation.css') ?>

    <!-- Own style -->
    <?= $this->Html->css('app.css') ?>

    <?= $this->Html->css('home_crisisdisplay.css') ?>
    <!--<?= $this->Html->css('crisis_list.css') ?>4<?= $this->Html->css('articles_template.css') ?> -->

    <?= $this->Html->css('foundation-icons.css') ?>
    <?= $this->Html->css('crisis_template.css') ?>
    
    <!-- Topbar style -->
    <?= $this->Html->css('topbar.css') ?>
    <!-- Footer style -->
    <?= $this->Html->css('footer.css') ?>

    <?= $this->fetch('meta') ?>

    <!-- Page specific style -->
    <?php $css = $this->fetch('css');
    if($css != "")
        echo $this->Html->css($css); ?>
</head>
<body>

    <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">

            <nav class="tab-bar">
                <div class="left-small">
                    <a role="button" aria-expanded="false" aria-controls="idOfLeftMenu" class="left-off-canvas-toggle menu-icon" ><span></span></a>
                </div>
                <div class="middle tab-bar-section">
                    <h1><?= $this->Html->link(__('CrisisFlag'), '/', array('style' => 'color: white;')) ?></h1>
                </div>
            </nav>

            <!-- Topbar -->
            <nav class="left-off-canvas-menu">
                <ul class="off-canvas-list">
                    <li><label><?php if($this->request->session()->read("Auth.User")): ?>
                        <?php $username = $this->request->session()->read('Auth.User.username'); 
                        echo "Bienvenue " . $username ;
                        else:
                            echo "Bienvenue invité";
                        endif;
                            ?>
                    </label></li>
                    <li class="topbar-separator"><?= $this->Html->link(__('Accueil'), '/') ?></li>
                    <li><?= $this->Html->link(__('Les crises'),   ['controller'=>'Crisis', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Les articles'), ['controller'=>'Articles', 'action' => 'index']) ?></li>
                    <?php if($this->request->session()->read("Auth.User")): ?>
                    <li class="topbar-separator"><?= $this->Html->link(__('Utilisateurs'), ['controller'=>'Users', 'action' => 'index']) ?></li>
                    
                        <li><?= $this->Html->link(__('Se déconnecter'), ['controller'=>'Users', 'action' => 'logout']) ?></li>
                    <?php else: ?>
                        <li><?= $this->Html->link(__('Se connecter'), ['controller'=>'Users', 'action' => 'login']) ?></li>
                    <?php endif; ?>
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

                    <p><?php echo $this->Html->image('devfsociety.svg', array('alt' => 'CakePHP', 'class' => 'footer-logo'));?></p>
                    <p class="copywrite">Fsociety all rights reserved © 2015</p>

                </div>
              </div>
            </footer>
            <!-- /Footer -->

        </div>
    </div>


    <!-- Foundation (+jquery) scripts -->
    <?= $this->Html->script("vendor/jquery.min.js") ?> 

    <?= $this->Html->script("foundation/foundation.js") ?>
    <?= $this->Html->script("foundation/foundation.alert.js") ?>
    <?= $this->Html->script("foundation/foundation.topbar.js") ?>

    <!-- Own script -->
    <?= $this->Html->script("https://maps.googleapis.com/maps/api/js?key=AIzaSyC5JLLRv_0Innk5EXGfZhPpzGFadWeT5_4&signed_in=true&callback=initMap") ?>

    <!-- Topbar -->
    <?= $this->Html->script('foundation/foundation.offcanvas.js') ?>

    <?= $this->Html->script("app.js") ?>

    <!-- Page specific script (always load last) -->
    <?php $js = $this->fetch('script');
    if($js != "")
        echo $this->Html->script($js) ?>
    <script>
      $(document).foundation();
    </script>
</body>
</html>
