<?php $this->assign('title', 'Documentos da Competição'); ?>

<?= $this->Html->link(__('Adicionar Novo Documento de Competição'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<h1><i class="fa fa-book"></i> <?= __('Documentos da Competição') ?></h1>

<div class="documents index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('date', 'Data') ?></th>
            <th><?= $this->Paginator->sort('hour', 'Hora') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($documents as $document): ?>
        <tr>
            <td><?= $this->Number->format($document->id) ?></td>
            <td><?= h($document->name) ?></td>
            <td><?= h($document->date) ?></td>
            <td><?= h($document->hour) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $document->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id)]) ?>
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
