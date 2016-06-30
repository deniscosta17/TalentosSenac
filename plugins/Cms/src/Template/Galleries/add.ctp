<?php $this->assign('title', 'Adicionar Nova Imagem'); ?>

<div class="galleries form large-10 medium-9 columns">
    <?= $this->Form->create($gallery, ['type' => 'file']) ?>
    <fieldset>
        <h1><i class="fa fa-picture-o"></i> <?= __('Adicionar Nova Imagem') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('attachment', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
