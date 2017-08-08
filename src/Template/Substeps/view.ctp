<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Substep $substep
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Substep'), ['action' => 'edit', $substep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Substep'), ['action' => 'delete', $substep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $substep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Substeps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Substep'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="substeps view large-9 medium-8 columns content">
    <h3><?= h($substep->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Step') ?></th>
            <td><?= $substep->has('step') ? $this->Html->link($substep->step->id, ['controller' => 'Steps', 'action' => 'view', $substep->step->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($substep->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($substep->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($substep->id) ?></td>
        </tr>
    </table>
</div>
