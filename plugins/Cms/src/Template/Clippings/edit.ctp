<div class="clippings form large-10 medium-9 columns">
    <?= $this->Form->create($clipping, ['type' => 'file']) ?>
    <fieldset>
        <h1><?= __('Editar Imprensa') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content', ['class' => 'ckeditor']);
            echo $this->Form->input('excerpt', ['class' => 'ckeditor']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>
