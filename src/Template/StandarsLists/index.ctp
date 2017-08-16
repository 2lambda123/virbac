<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Lista'); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-home"></i> <?php echo __('Inicio'); ?></a></li>
            <li class="active"><?php echo __('Lista'); ?></li>
        </ol>
    </section>

    <section class="content">
        <?php $this->Flash->render(); ?>
        <div class="actions-ribbon">
            <a class="btn btn-app" href="standars-lists/add">
                <i class="fa fa-plus"></i>
                <?php echo __('Lista'); ?>
            </a>
        </div>
        <div class="courses index">
            <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description', 'Descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('presentation', 'Presentación') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    </section>
</aside>
