<?php $this->assign('title', 'Sobre o Talentos'); ?>

<div class="pages form large-10 medium-9 columns">
    <?= $this->Form->create($page, ['type' => 'file']) ?>
    <fieldset>
        <h1><i class="fa fa-star"></i> <?= __('Sobre o Talentos') ?></h1>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('subname', ['label' => 'Conteúdo', 'type' => 'textarea', 'class' => 'ckeditor']);
            echo $this->Form->input('block_1', ['label' => 'Etapa Local', 'class' => 'ckeditor'] );
            echo $this->Form->input('block_1_attachment', ['label' => 'Etapa Local Anexo', 'type' => 'file']);

            echo $this->Senac->upload($page->block_1_attachment, ['width' => 150]); ?>

            <a href="<?php echo $this->Url->build(['action' => 'delete_attachment', '1', $page->id]); ?>" class="btn btn-primary" style="width: auto !important;">Excluir Imagem</a>
            <?php
            echo $this->Form->input('block_2', ['label' => 'Etapa Regional', 'class' => 'ckeditor'] );
            echo $this->Form->input('block_2_attachment', ['label' => 'Etapa Regional Anexo', 'type' => 'file']);
            echo $this->Senac->upload($page->block_2_attachment, ['width' => 150]); ?>

            <a href="<?php echo $this->Url->build(['action' => 'delete_attachment', '2', $page->id]); ?>" class="btn btn-primary" style="width: auto !important;">Excluir Imagem</a>

            <?php
            echo $this->Form->input('block_3', ['label' => 'Etapa Estadual', 'class' => 'ckeditor'] );
            echo $this->Form->input('block_3_attachment', ['label' => 'Etapa Estadual Anexo', 'type' => 'file']);
            echo $this->Senac->upload($page->block_3_attachment, ['width' => 150]); ?>

            <a href="<?php echo $this->Url->build(['action' => 'delete_attachment', '3', $page->id]); ?>" class="btn btn-primary" style="width: auto !important;">Excluir Imagem</a>

            <?php
            echo $this->Form->input('content', ['label' => 'Como Participar', 'class' => 'ckeditor']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
