<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message alert alert-warning" onclick="this.classList.add('hidden');"><?= $message ?></div>
