<?php $this->assign('title', 'Nova Notícia'); ?>

<div class="articles form large-10 medium-9 columns">
    <?= $this->Form->create($article, ['type' => 'file']) ?>
    <fieldset>
        <h1> <i class="fa fa-pencil"></i> <?= __('Add Article') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content', ['class' => 'ckeditor']);
            echo $this->Form->input('excerpt');
            echo $this->Form->input('attachment', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
