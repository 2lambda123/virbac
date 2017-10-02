<aside class="right-side">
    <section class="content-header">
        <h1>
            <?php echo __('Usuarios'); ?>
        </h1>
    </section>
    <section class="content">
        <?php $this->Flash->render(); ?>
        <div class="actions-ribbon">
            <a class="btn btn-app" href="users/add" style="font-size: medium;">
                <i class="fa fa-plus"></i>
                <?php echo __('Agrregar Usuario'); ?>
            </a>
        </div>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('email', 'Correo') ?></th>
                <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                <th><?= $this->Paginator->sort('paternal_last_name', 'Apellido Paterno') ?></th>
                <th><?= $this->Paginator->sort('maternal_last_name', 'Apellido Materno') ?></th>
                <th><?= $this->Paginator->sort('access_level', 'Nivel de accesso') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $users): ?>
                <tr>
                    <td><?= $this->Number->format($users->id) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->name) ?></td>
                    <td><?= h($users->paternal_last_name) ?></td>
                    <td><?= h($users->maternal_last_name) ?></td>
                    <td><?= h($users->access_level) ?></td>
                    <td class="actions">
                        <a href="users/view/<?php echo  $users->id; ?>" class="action-btn" title="Ver">
                            <i class="fa fa-fw fa-list-alt"></i>
                        </a>                    
                        <a href="users/edit/<?php echo  $users->id; ?>" class="action-btn" title="Editar">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                        <form name="post_<?php echo $users->id;?>" style="display:none;" method="post" action="/virbac/users/delete/<?php echo $users->id;?>">
                            <input type="hidden" name="_method" value="POST">
                        </form>
                        <a href="#" onclick="if (confirm(&quot;Are you sure you want to delete # <?php echo $users->id;?>?&quot;)) { document.post_<?php echo $users->id;?>.submit(); } event.returnValue = false; return false;" class="action-btn" title="Eliminar">
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
