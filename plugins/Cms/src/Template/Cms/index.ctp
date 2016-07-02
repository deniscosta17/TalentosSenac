
<h1><i class="fa fa-home"></i> <?= __('Home') ?></h1>

<?php $this->assign('title', 'Home'); ?>

<?php
  if($formHome)
    $formHome = ($formHome->value == '0') ? false : true;
?>
<?php echo $this->Form->create($entitySettings); ?>
<?php echo $this->Form->input("video_url", ['value' => $videoUrl, 'label' => 'URL do Vídeo']);?>
<?php echo $this->Form->input("form_home", ['type' => 'checkbox', 'checked' => $formHome, 'label' => 'Ativar Formulário da Home?']); ?>
<?php echo $this->Form->input("horario_fale_conosco", ['value' => $horarioFaleConosco, 'label' => 'Horário do Fale Conosco', 'type' => 'textarea', 'class' => 'ckeditor']); ?>
<?php echo $this->Form->button("Salvar", ['class' => 'btn btn-primary']); ?>
<?php echo $this->Form->end(); ?>

<div class="form">
    <a href="<?php echo $this->Url->build(['action' => 'exportar_egressos']); ?>" class="btn btn-primary">Exportar egressos (.csv)</a>
    <a href="<?php echo $this->Url->build(['action' => 'exportar_interessados']); ?>" class="btn btn-primary">Exportar interessados (.csv)</a>
</div>
