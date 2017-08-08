<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Step $step
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Step'), ['action' => 'edit', $step->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Step'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs Orders'), ['controller' => 'JobsOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jobs Order'), ['controller' => 'JobsOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="steps view large-9 medium-8 columns content">
    <h3><?= h($step->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Jobs Order') ?></th>
            <td><?= $step->has('jobs_order') ? $this->Html->link($step->jobs_order->id, ['controller' => 'JobsOrders', 'action' => 'view', $step->jobs_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $step->has('user') ? $this->Html->link($step->user->name, ['controller' => 'Users', 'action' => 'view', $step->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($step->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($step->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($step->id) ?></td>
        </tr>
    </table>
</div>
