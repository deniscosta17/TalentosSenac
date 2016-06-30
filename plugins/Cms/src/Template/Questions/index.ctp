<?php $this->assign('title', 'Dúvidas'); ?>

<h1><i class="fa fa-question"></i> <?= __('Dúvidas') ?></h1>

<?= $this->Html->link(__('Adicionar Nova Dúvida'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>

<div class="questions index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name', 'Pergunta') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questions as $question): ?>
        <tr>
            <td><?= $this->Number->format($question->id) ?></td>
            <td><?= h($question->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
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
