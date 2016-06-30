<form class="form">


  <div class="row">
      <div class="form-group">
        <div class="col-lg-4 col-lg-offset-1">
          <a href="<?php echo $this->Url->build(['action' => 'index']); ?>" class="btn btn-primary btn-faq <?php if($this->request->action == 'index') : ?>ativo<?php endif; ?> btn-block">Classificação geral</a>
        </div>
        <div class="col-lg-2">
          <a href="<?php echo $this->Url->build(['action' => 'etapa_1']); ?>" class="btn btn-primary btn-faq <?php if($this->request->action == 'etapa_1') : ?>ativo<?php endif; ?> btn-block">Etapa 1</a>
        </div>
        <div class="col-lg-2">
          <a href="<?php echo $this->Url->build(['action' => 'etapa_2']); ?>" class="btn btn-primary btn-faq <?php if($this->request->action == 'etapa_2') : ?>ativo<?php endif; ?> btn-block">Etapa 2</a>
        </div>
        <div class="col-lg-2">
          <a href="<?php echo $this->Url->build(['action' => 'etapa_3']); ?>" class="btn btn-primary btn-faq <?php if($this->request->action == 'etapa_3') : ?>ativo<?php endif; ?> btn-block">Etapa 3</a>
        </div>
        <div class="clearfix"></div>
      </div>
  </div>

    <div class="row">
  <div class="col-lg-12 text-center">
  <hr>
    <h3 class="orange-title">Filtre a sua busca</h3>
  </div>
</div>

        <div class="col-lg-4">
    <div class="form-group">
      <input type="text" placeholder="Buscar" id="input-search" class="form-control">
    </div> <!-- .form-group -->
  </div>

  <div class="col-lg-4">
    <div class="form-group">
      <select class="form-control">
        <option value="">Selecione a ocupação</option>
      </select>
    </div> <!-- .form-group -->
  </div>

  <div class="col-lg-4">
    <div class="form-group">
      <select class="form-control">
        <option value="">Selecione a unidade</option>
      </select>
    </div> <!-- .form-group -->
  </div>

</form>

<?php echo $this->Html->script("/vendor/quicksearch/jquery.quicksearch.js"); ?>

<script type="text/javascript">
  $(document).ready(function() {

    $('#input-search').quicksearch('.resultados li.linha-resultado');

  });
</script>