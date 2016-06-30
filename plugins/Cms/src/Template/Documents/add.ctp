<?php $this->assign('title', 'Adicionar Documento da Competição'); ?>

<div class="documents form large-10 medium-9 columns">
    <?= $this->Form->create($document) ?>
    <fieldset>
        <h1><i class="fa fa-book"></i> <?= __('Adicionar Novo Documento') ?></h1>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>

<strong style="color: red;">É necessário salvar antes de enviar os anexos.</strong>