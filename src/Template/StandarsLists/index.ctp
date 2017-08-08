<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\StandarsList[]|\Cake\Collection\CollectionInterface $standarsLists
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Standars List'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="standarsLists index large-9 medium-8 columns content">
    <h3><?= __('Standars Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($standarsLists as $standarsList): ?>
            <tr>
                <td><?= $this->Number->format($standarsList->id) ?></td>
                <td><?= h($standarsList->name) ?></td>
                <td><?= h($standarsList->description) ?></td>
                <td><?= h($standarsList->presentation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $standarsList->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $standarsList->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $standarsList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $standarsList->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
