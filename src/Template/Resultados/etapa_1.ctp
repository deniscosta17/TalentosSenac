
<div class="container container-geral">
  <div class="row pos-r">

    <div class="col-lg-12">
      <h2 class="page-title">Resultados <span class="orange-line"></span></h2>
    </div>
  </div>

  <div class="row">
    <?php echo $this->element("form_resultados"); ?>
  </div> <!-- .row -->

  <div class="row">

    <div class="col-lg-10 col-lg-offset-1">

    <?php if(!empty($resultados[$categoria_atual])) : ?>
      <ul class="resultados">
        <li class="header-resultados">
          <div class="col-lg-2 text-center">
            Classificação
          </div>
          <div class="col-lg-5 text-center">
            Nome
          </div>
          <div class="col-lg-3 text-center">
            Ocupação
          </div>
          <div class="col-lg-2 text-center">
            Unidade
          </div>
          <div class="clearfix"></div>
        </li>
        <?php foreach($resultados[$categoria_atual] as $r) : ?>
        <li class="linha-resultado linha-<?php echo $r['posicao']; ?>" style="<?php if($r['posicao'] >= 20) : ?>display: none;<?php endif; ?>">
          <div class="col-lg-2 text-center">
            <?php echo $r['posicao']; ?>º
          </div>
          <div class="col-lg-5 text-center">
            <?php echo $r['nome']; ?>
          </div>
          <div class="col-lg-3 text-center">
            <?php echo $r['curso']; ?>
          </div>
          <div class="col-lg-2 text-center">
            <?php echo $r['unidade']; ?>
          </div>
        </li>
      <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="alert alert-danger">
        Não há resultados disponíveis para esta categoria.
      </div>
    <?php endif; ?>

    </div>
  </div>
</div>