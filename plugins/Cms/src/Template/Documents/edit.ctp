<?php $this->assign('title', 'Editar Documento da Competição'); ?>

<div class="documents form large-10 medium-9 columns">
    <?= $this->Form->create($document) ?>
    <fieldset>
        <h1><i class="fa fa-book"></i> <?= __('Editar Documento da Competição') ?></h1>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary']) ?>

    <?= $this->Form->end() ?>


<form action="<?php echo $this->Url->build(['action' => 'upload_document']); ?>" class="dropzone" id="dropzone-senac" style="margin-top: 20px; margin-bottom: 20px;">
    <input type="hidden" name="document_id" value="<?php echo $document->id; ?>">
    <h2 class="dz-message">Arraste o arquivo a ser enviado aqui. (ou clique aqui)</h2>
</form>

<table id="table-attachments" class="table">
    <thead>
        <tr>
            <th>Arquivo</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($document->document_attachments as $a) : ?>
        <tr>
            <td>
                <img src="<?php echo $this->Url->build('/', true); ?>uploads/<?php echo $a->attachment; ?>" width="150" />
            </td>
            <td>
                <textarea class="input-name" data-id="<?php echo $a->id; ?>"><?php echo $a->name; ?></textarea>
                <div class="clearfix"></div>
                <span class="sucesso label label-success" style="display: none;">Atualizado!</span>
            <td>
                <textarea class="input-description" data-id="<?php echo $a->id; ?>"><?php echo $a->description; ?></textarea>
                <div class="clearfix"></div>
                <span class="sucesso label label-success" style="display: none;">Atualizado!</span>
            </td>
            <td>
                <a href="<?php echo $this->Url->build(['action' => 'delete_attachment', $a->id, $document->id]); ?>" onclick="if(!confirm('Você tem certeza disto?')) { return false; }" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script id="template-novo-arquivo" type="text/x-jsrender">
<tr class="tr-escondido" style="display: none;">
    <td>
        <img src="<?php echo $this->Url->build('/', true); ?>uploads/{{:attachment}}" width="150" />
    <td>
          <textarea class="input-name" data-id="{{:id}}">{{:name}}</textarea>
            <div class="clearfix"></div>
            <span class="sucesso label label-success" style="display: none;">Atualizado!</span>
    </td>
    <td>
          <textarea class="input-description" data-id="{{:id}}">{{:description}}</textarea>
            <div class="clearfix"></div>
            <span class="sucesso label label-success" style="display: none;">Atualizado!</span>
      </td>
    <td>
        <a href="<?php echo $this->Url->build(['action' => 'delete_attachment']); ?>/{{:id}}/{{:document_id}}" onclick="if(!confirm('Você tem certeza disto?')) { return false; }" class="btn btn-danger">
            <i class="fa fa-trash"></i>
        </a>
    </td>
</tr>
</script>

</div>
