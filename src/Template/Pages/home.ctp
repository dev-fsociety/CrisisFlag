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
    <div class="medium-12 column text-center">
        <h1>/dev/fsociety - Le site rendu</h1>
        <p>Bienvenu sur ce qui deviendra la page d'accueil de notre site !</p>

        <?= $this->Html->link("Cliquez ici pour tester votre installation de cake !",
        ['controller' => 'Pages', 'action' => 'display', "test"], ['class' => 'expended button']); ?>

        <div class="row align-center">
            <div class="column medium-offset-2 medium-4">
                <div class="callout primary large">
                    <p class="text-justify">À l'heure actuelle, ce template intègre le thème par defaut de Foundation ainsi que les script pour JQuery et Foundation.</p>
                </div>
            </div>
            <div class="medium-4 column end">
                <div class="callout success large">
                    <p class="text-justify">Ce template constitut donc notre base de travail. Nous rajouterons éventuellement des choses par la suite et nous (enfin surtout les frontend) définirons un thème (edition du fichier webroot/css/app.css)         pour personnaliser le site</p>
                </div>
            </div>
        </div>
    </div>
</div>
