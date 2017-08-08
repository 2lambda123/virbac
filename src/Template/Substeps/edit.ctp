<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $substep->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $substep->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Substeps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="substeps form large-9 medium-8 columns content">
    <?= $this->Form->create($substep) ?>
    <fieldset>
        <legend><?= __('Edit Substep') ?></legend>
        <?php
            echo $this->Form->control('step_id', ['options' => $steps]);
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
