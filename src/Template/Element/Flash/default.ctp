<?php

$class = '';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>

<div data-alert class="alert-box <?= h($class) ?>" tabindex="0" aria-live="assertive" role="alertdialog">
  <?= h($message) ?>
  <button tabindex="0" class="close" aria-label="Close Alert">&times;</button>
</div>
