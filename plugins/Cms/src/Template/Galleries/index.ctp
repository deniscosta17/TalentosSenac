<?php $this->assign('title', 'Galeria'); ?>

<h1><i class="fa fa-picture-o"></i> <?= __('Galeria') ?></h1>

<?= $this->Html->link(__('Adicionar Nova Imagem'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>


<div class="galleries index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('attachment') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($galleries as $gallery): ?>
        <tr>
            <td><?= $this->Number->format($gallery->id) ?></td>
            <td><?= h($gallery->name) ?></td>
            <td><?= $this->Senac->upload($gallery->attachment, ['width' => 150]); ?></td>
            <td><?= h($gallery->created) ?></td>
            <td><?= h($gallery->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gallery->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gallery->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
