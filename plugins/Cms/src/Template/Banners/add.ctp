<div class="banners form large-10 medium-9 columns">
    <?= $this->Form->create($banner, ['type' => 'file']) ?>
    <fieldset>
        <h1><?= __('Add Banner') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type', ['options' => ['imagem' => 'Imagem', 'video' => 'Vídeo'], 'empty' => 'Selecionar', 'class' => 'form-control', 'label' => 'Tipo' ] );
            echo $this->Form->input('attachment', ['class' => 'input-anexo-texto'] );
            echo $this->Form->input('attachment_file', ['type' => 'file', 'style' => 'display: block;', 'class' => 'input-anexo', 'label' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
