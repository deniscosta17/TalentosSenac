
<div class="container container-geral">
  <div class="row pos-r">


    <div class="col-lg-12">
      <h2 class="page-title">Resultados <span class="line-title"></span></h2>
    </div>
  </div>

   <?php if(!empty($resultados[$categoria_atual])) : ?>
  <div class="row">
    <?php echo $this->element("form_resultados"); ?>
  </div> <!-- .row -->
    <?php else: ?>
      <div class="col-lg-12 text-center">
        <h2 style="font-style: italic;">Em breve</h2>
      </div>
    <?php endif; ?>


   <?php if(!empty($resultados[$categoria_atual])) : ?>
  <div class="row">

    <div class="col-lg-10 col-lg-offset-1">

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

    </div>
  </div>

    <?php endif; ?>

</div>
