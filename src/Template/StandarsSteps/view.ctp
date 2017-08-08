<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\StandarsStep $standarsStep
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Standars Step'), ['action' => 'edit', $standarsStep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Standars Step'), ['action' => 'delete', $standarsStep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $standarsStep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Standars Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Standars Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Standars Lists'), ['controller' => 'StandarsLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Standars List'), ['controller' => 'StandarsLists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="standarsSteps view large-9 medium-8 columns content">
    <h3><?= h($standarsStep->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Standars List') ?></th>
            <td><?= $standarsStep->has('standars_list') ? $this->Html->link($standarsStep->standars_list->name, ['controller' => 'StandarsLists', 'action' => 'view', $standarsStep->standars_list->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($standarsStep->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($standarsStep->id) ?></td>
        </tr>
    </table>
</div>
