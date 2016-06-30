<?php $this->assign('title', 'Notícias'); ?>

<h1><i class="fa fa-pencil"></i> <?= __('Notícias') ?></h1>

<?= $this->Html->link(__('Adicionar Nova Notícia'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<div class="articles index large-10 medium-9 columns">
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
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $this->Number->format($article->id) ?></td>
            <td><?= h($article->name) ?></td>
            <td><?= $this->Senac->upload($article->attachment, ['class' => 'img-responsive']) ?></td>
            <td><?= h($article->modified->format("d/m/Y H:i:s")) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id], ['class' => 'button round'] ) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['class' => 'button round alert', 'confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
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
