
<div class="container container-geral">
  <div class="row pos-r">

    <div class="col-lg-12">
      <h2 class="page-title">Dúvidas Frequentes <span class="line-title"></span></h2>

    </div>
  </div>
  <div id="container-faqs" class="row">

    <div class="col-lg-12">

  <?php $i = 1; foreach($questions as $q) : ?>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h3 class="article-name"><?php echo $i; ?>. <?php echo $q->name; ?></h3>

          <div class="article-excerpt">
          <?php echo $q->answer; ?>
          </div>

          <hr>
        </div>
      </div>
    <?php $i++; endforeach; ?>

    </div>

  </div>
</div>
