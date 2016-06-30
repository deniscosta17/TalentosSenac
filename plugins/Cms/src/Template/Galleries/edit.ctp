<?php $this->assign('title', 'Editar Imagem'); ?>

<div class="galleries form large-10 medium-9 columns">
    <?= $this->Form->create($gallery, ['type' => 'file']) ?>
    <fieldset>
        <h1><i class="fa fa-picture-o"></i> <?= __('Editar Imagem') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('attachment', ['type' => 'file']);
            echo $this->Senac->upload($gallery->attachment, ['width' => 150]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
