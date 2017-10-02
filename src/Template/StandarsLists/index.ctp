<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Lista'); ?>
        </h1>
    </section>
    <?php $this->Flash->render(); ?>
    <section class="content">
        <div class="actions-ribbon">
            <a class="btn btn-app" href="standars-lists/add" style="font-size: medium;">
                <i class="fa fa-plus"></i>
                <?php echo __('Agregar Lista'); ?>
            </a>
        </div>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($standarsLists as $standarsList): ?>
                    <tr>
                        <td><?= $this->Number->format($standarsList->id) ?></td>
                        <td><?= h($standarsList->name) ?></td>
                        <td class="actions">
                            <a href="standars-lists/view/<?php echo  $standarsList->id; ?>" class="action-btn" title="Ver">
                                <i class="fa fa-fw fa-list-alt"></i>
                            </a>                    
                            <a href="standars-lists/edit/<?php echo  $standarsList->id ?>" class="action-btn" title="Editar">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                            <form name="post_<?php echo $standarsList->id;?>" style="display:none;" method="post" action="/virbac/standars-lists/delete/<?php echo $standarsList->id;?>">
                                <input type="hidden" name="_method" value="POST">
                            </form>
                            <a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # <?php echo $standarsList->id;?>?&quot;)) { document.post_<?php echo $standarsList->id;?>.submit(); } event.returnValue = false; return false;" class="action-btn" title="Eliminar">
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
