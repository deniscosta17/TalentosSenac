<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Opportunity'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="opportunities index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('excerpt') ?></th>
            <th><?= $this->Paginator->sort('local') ?></th>
            <th><?= $this->Paginator->sort('category') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($opportunities as $opportunity): ?>
        <tr>
            <td><?= $this->Number->format($opportunity->id) ?></td>
            <td><?= h($opportunity->name) ?></td>
            <td><?= $this->Number->format($opportunity->excerpt) ?></td>
            <td><?= h($opportunity->local) ?></td>
            <td><?= h($opportunity->category) ?></td>
            <td><?= h($opportunity->created) ?></td>
            <td><?= h($opportunity->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $opportunity->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $opportunity->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $opportunity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opportunity->id)]) ?>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
