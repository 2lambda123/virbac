<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Ordenes de Trabajo'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></a></li>
            <li class="active"><?php echo __('Ordenes de Trabajo'); ?></li>
        </ol>
    </section>

    <section class="content">
        <?php $this->Flash->render(); ?>
        <div class="actions-ribbon">
            <a class="btn btn-app" href="jobs-orders/add">
                <i class="fa fa-plus"></i>
                <?php echo __('Orden de trabajo'); ?>
            </a>
        </div>
        <div class="courses index">
            <table class="table table-condensed table-hover">
            <thead>
                <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('standar_list_id', 'Lista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description', 'Descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation', 'Presentación') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_number', 'Número de orden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pieces', 'Cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment', 'Comentatios') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobsOrders as $jobsOrder): ?>
            <tr>
                <td><?= $this->Number->format($jobsOrder->id) ?></td>
                <td><?= $jobsOrder->has('standars_list') ? $this->Html->link($jobsOrder->standars_list->name, ['controller' => 'StandarsLists', 'action' => 'view', $jobsOrder->standars_list->id]) : '' ?></td>
                <td><?= h($jobsOrder->sku) ?></td>
                <td><?= h($jobsOrder->description) ?></td>
                <td><?= h($jobsOrder->presentation) ?></td>
                <td><?= h($jobsOrder->job_number) ?></td>
                <td><?= $this->Number->format($jobsOrder->pieces) ?></td>
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
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, Se muestra {{current}} fila(s) de {{count}} en total')]) ?></p>
    </div>
    </section>
</aside>
