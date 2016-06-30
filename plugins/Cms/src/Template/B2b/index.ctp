<?php $this->assign('title', 'Area B2b'); ?>

<h1><i class="fa fa-building"></i> <?= __('Area B2b') ?></h1>

<?= $this->Html->link(__('Adicionar Nova Notícia'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<div class="b2b index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('attachment') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($b2b as $b2bArea): ?>
        <tr>
            <td><?= $this->Number->format($b2b->id) ?></td>
            <td><?= h($b2bArea->name) ?></td>
            <td><?= $this->Senac->upload($b2b->attachment, ['class' => 'img-responsive']) ?></td>
            <td><?= h($b2bArea->modified->format("d/m/Y H:i:s")) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $b2bArea->id], ['class' => 'button round'] ) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $b2bArea->id], ['class' => 'button round alert', 'confirm' => __('Are you sure you want to delete # {0}?', $b2bArea->id)]) ?>
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
