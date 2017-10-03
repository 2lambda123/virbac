<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Ordenes de Trabajo'); ?>
        </h1>
    </section>
    <?php $this->Flash->render(); ?>
    <section class="content">
        <div class="actions-ribbon">
            <a class="btn btn-app" href="jobs-orders/add" style="font-size: medium;">
                <i class="fa fa-plus"></i>
                <?php echo __('Agregar Orden'); ?>
            </a>
        </div>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th><?= $this->Paginator->sort('standar_list_id', 'Lista') ?></th>
                    <th><?= $this->Paginator->sort('sku') ?></th>
                    <th><?= $this->Paginator->sort('description', 'Descripción') ?></th>
                    <th><?= $this->Paginator->sort('presentation', 'Presentación') ?></th>
                    <th><?= $this->Paginator->sort('job_number', 'Número de orden') ?></th>
                    <th><?= $this->Paginator->sort('pieces', 'Cantidad') ?></th>
                    <th><?= $this->Paginator->sort('creation_date', 'Fecha de fabricación') ?></th>
                    <th><?= $this->Paginator->sort('comment', 'Comentarios') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobsOrders as $jobsOrder): ?>
                    <?php $date = new DateTime($jobsOrder['creation_date']) ?>
                    <tr>
                        <td><?= $this->Number->format($jobsOrder->id) ?></td>
                        <td><?= $jobsOrder->has('standars_list') ? $this->Html->link($jobsOrder->standars_list->name, ['controller' => 'StandarsLists', 'action' => 'view', $jobsOrder->standars_list->id]) : '' ?></td>
                        <td><?= h($jobsOrder->sku) ?></td>
                        <td><?= h($jobsOrder->description) ?></td>
                        <td><?= h($jobsOrder->presentation) ?></td>
                        <td><?= h($jobsOrder->job_number) ?></td>
                        <td><?= $this->Number->format($jobsOrder->pieces) ?></td>
                        <td><?= h($date->format('d-m-Y')) ?></td>
                        <td><?= h($jobsOrder->comment) ?></td>
                        <td class="actions">
                            <a href="jobs-orders/view/<?php echo  $jobsOrder->id; ?>" class="action-btn" title="Ver">
                                <i class="fa fa-fw fa-list-alt"></i>
                            </a>                    
                            <a href="jobs-orders/edit/<?php echo  $jobsOrder->id; ?>" class="action-btn" title="Editar">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <form name="post_<?php echo $jobsOrder->id;?>" style="display:none;" method="post" action="/virbac/jobs-orders/delete/<?php echo $jobsOrder->id;?>">
                                <input type="hidden" name="_method" value="POST">
                            </form>
                            <a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # <?php echo $jobsOrder->id;?>?&quot;)) { document.post_<?php echo $jobsOrder->id;?>.submit(); } event.returnValue = false; return false;" class="action-btn" title="Eliminar">
                                <i class="fa fa-fw fa-trash-o"></i>
                            </a>      
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            </ul>
            <p>
                <?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, Se muestra {{current}} fila(s) de {{count}} en total')]) ?>
            </p>
        </div>
    </section>
</aside>
