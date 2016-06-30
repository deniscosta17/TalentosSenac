<?php $this->assign('title', 'Fale Conosco'); ?>

<h1><i class="fa fa-question"></i> <?= __('Fale Conosco') ?></h1>

<?= $this->Html->link(__('Exportar para Planilha'), ['action' => 'export'], ['class' => 'btn btn-primary']) ?>

<div class="contacts index large-10 medium-9 columns">
    <table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('phone', 'Telefone') ?></th>
            <th><?= $this->Paginator->sort('unity', 'Unidade') ?></th>
            <th><?= $this->Paginator->sort('subject', 'Assunto') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= $this->Number->format($contact->id) ?></td>
            <td><?= h($contact->name) ?></td>
            <td><?= h($contact->email) ?></td>
            <td><?= h($contact->phone) ?></td>
            <td><?= h($contact->unity) ?></td>
            <td><?= h($contact->subject) ?></td>
            <td><?= h($contact->created) ?></td>
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
