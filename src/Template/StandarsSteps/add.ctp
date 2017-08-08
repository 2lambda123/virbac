<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Standars Steps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Standars Lists'), ['controller' => 'StandarsLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Standars List'), ['controller' => 'StandarsLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="standarsSteps form large-9 medium-8 columns content">
    <?= $this->Form->create($standarsStep) ?>
    <fieldset>
        <legend><?= __('Add Standars Step') ?></legend>
        <?php
            echo $this->Form->control('standar_list_id', ['options' => $standarsLists]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
