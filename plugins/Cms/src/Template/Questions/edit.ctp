<?php $this->assign('title', 'Editar Dúvida'); ?>

<div class="questions form large-10 medium-9 columns">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <h1><i class="fa fa-question"></i> <?= __('Editar Dúvida') ?></h1>
        <?php
            echo $this->Form->input('name', ['label' => 'Pergunta']);
            echo $this->Form->input('answer', ['class' => 'ckeditor', 'label' => 'Resposta']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
