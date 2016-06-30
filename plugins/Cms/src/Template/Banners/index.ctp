
<?= $this->Html->link(__('Adicionar Novo Banner'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<div class="banners index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('type', 'Tipo') ?></th>
            <th><?= $this->Paginator->sort('attachment') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($banners as $banner): ?>
        <tr>
            <td><?= $this->Number->format($banner->id) ?></td>
            <td><?= h($banner->name) ?></td>
            <td><?= h($banner->type) ?></td>
            <td><?= h($banner->attachment) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $banner->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $banner->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?>
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
