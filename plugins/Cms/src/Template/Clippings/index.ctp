<?= $this->Html->link(__('Adicionar Nova Imprensa'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<div class="clippings index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($clippings as $clipping): ?>
        <tr>
            <td><?= $this->Number->format($clipping->id) ?></td>
            <td><?= h($clipping->name) ?></td>
            <td><?= h($clipping->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clipping->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clipping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clipping->id)]) ?>
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
