<div class="container container-geral">
  <div class="row pos-r">

 
    <div class="col-lg-12">
      <h2 class="page-title">Galeria <span class="line-title"></span></h2>
    </div>
  </div>
  <div class="row">

    <?php foreach($galleries as $g) : ?>
    <div class="col-lg-3 col-md-4 col-xs-12 col-sm-6 content-item-gallery">
          <figure class="item-gallery">

        <a data-toggle="lightbox" href="<?php echo $this->Url->build('/uploads/' . $g->attachment); ?>" data-title="<?php echo $g->name; ?>">
        <?php
          $url2  = $this->Url->build('/', true);
          $url    = $this->Url->build('/uploads/' . $g->attachment, true);
          $url3  = $url2 . 'timthumb.php?w=500&src=' . $url;
        ?>

              <?php echo $this->Html->image("/", ['class' => 'img-responsive img-galeria lazy', 'data-original' => $url3 ]); ?>

              <figcaption>
                  <p><?php echo $g->name; ?></p>
                  <p class="text-center pad-zero"><img class="img-facebook-share" data-url="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($this->Url->build(['action' => 'index', $g->id], true)); ?>" src="<?php echo $this->Url->build('/img/facebook_share.png'); ?>" style="height: 24px;"></p>
              </figcaption>
              </a>
          </figure>
    </div>
  <?php endforeach; ?>

</div>
</div>
