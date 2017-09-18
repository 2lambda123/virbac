<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Productos'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></a></li>
            <li class="active"><?php echo __('Productos'); ?></li>
        </ol>
    </section>

    <section class="content">
        <?php $this->Flash->render(); ?>
        <div class="actions-ribbon">
            <a class="btn btn-app" href="products/add" style="font-size: medium;">
                <i class="fa fa-plus"></i>
                <?php echo __(' Agregar producto'); ?>
            </a>
        </div>
        <div class="courses index">
            <table class="table table-condensed table-hover">
            <thead>
                <tr>
                <th scope="col"><?= $this->Paginator->sort('sku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description', 'Descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation', 'Presentación') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->sku) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= h($product->presentation) ?></td>
                <td class="actions">
                    <a href="products/view/<?php echo  $product->sku; ?>" class="action-btn" title="Ver">
                        <i class="fa fa-fw fa-list-alt"></i>
                    </a>                    
                    <a href="products/edit/<?php echo  $product->sku; ?>" class="action-btn" title="Editar">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <form name="post_<?php echo $product->sku;?>" style="display:none;" method="post" action="/virbac/products/delete/<?php echo $product->sku;?>">
                        <input type="hidden" name="_method" value="POST">
                    </form>
                    <a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # <?php echo $product->sku;?>?&quot;)) { document.post_<?php echo  $product->sku;?>.submit(); } event.returnValue = false; return false;" class="action-btn" title="Eliminar">
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, Se muestra {{current}} fila(s) de {{count}} en total')]) ?></p>
    </div>
    </section>
</aside>
