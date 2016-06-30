
<div class="container container-geral">
  <div class="row pos-r">

    <div class="col-lg-12">
      <h2 class="page-title">Sobre o Talentos <span class="line-title"></span></h2>
    </div>

    <div class="col-lg-12">
      <div class="page-subtitle"><?php echo $page->subname; ?></div>
    </div>
  </div>
  <div class="row">

    <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4 altura-fixa">

            <h3 class="article-name">Etapa 1</h3>


            <?php if(!empty($page->block_1_attachment)) : ?>
            <div class="form-group">
              <?php echo $this->Senac->upload($page->block_1_attachment, ['class' => 'img-responsive']); ?>
            </div>
          <?php endif; ?>

            <div class="article-excerpt"><?php echo $page->block_1; ?></div>
    </div>

    <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4 border-orange altura-fixa">

              <h3 class="article-name">Etapa 2</h3>

            <?php if(!empty($page->block_2_attachment)) : ?>
            <div class="form-group">
              <?php echo $this->Senac->upload($page->block_2_attachment, ['class' => 'img-responsive']); ?>
            </div>
          <?php endif; ?>

              <div class="article-excerpt">
                <?php echo $page->block_2; ?>
              </div>
      </div>

    <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4 altura-fixa">

          <h3 class="article-name">Etapa 3</h3>

            <?php if(!empty($page->block_3_attachment)) : ?>
            <div class="form-group">
              <?php echo $this->Senac->upload($page->block_3_attachment, ['class' => 'img-responsive']); ?>
            </div>
          <?php endif; ?>

              <div class="article-excerpt">
                <?php echo $page->block_3; ?>
              </div>
        </div>
  </div>
  <div class="row" style="margin-top: 40px;">

    <div class="col-lg-12">

          <h3 class="article-name">Como Participar</h3>

              <div class="article-excerpt">
                <?php echo $page->content; ?>
              </div>
    </div>
  </div>
</div>

<!--
<div class="container-depoimentos container-fluid">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 pos-r">

    <div id="carouselDepoimentos" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <?php $i = 1; foreach($testimonials as $t) : ?>
        <li data-target="#carouselDepoimentos" data-slide-to="<?php echo $i - 1; ?>" <?php if($i == 1) : ?>class="active"<?php endif; ?>></li>
      <?php $i++; endforeach; ?>
      </ol>

      <div class="carousel-inner" role="listbox">

        <?php $i = 1; foreach($testimonials as $t) : ?>
        <div class="item <?php if($i == 1) : ?>active<?php endif; ?>">
          <p class="depoimento-frase text-center" style="font-size: 50px;"><?php echo $t->content; ?></p>
          <p class="depoimento-autor text-center"><?php echo $t->name; ?></p>
        </div>
      <?php $i++; endforeach; ?>

      </div>

</div>

    </div>
  </div>
</div>



<div class="tp-banner-container" style="margin-top: 0px;">
    <div class="tp-banner" >
            <ul>

            <?php foreach($banners as $b) : ?>

        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="http://themepunch.com/revolution/wp-content/uploads/2014/05/video_space_cover-320x200.jpg"  data-saveperformance="off"  data-title="Infinite Possibilities">

            <?php if($b->type == "imagem") : ?>

            <img src="<?php echo $this->Url->build('/uploads/' . $b->attachment); ?>"  alt="video_space_cover"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">

          <?php endif; ?>


            <div class="tp-caption tp-fade fadeout fullscreenvideo"
                data-x="0"
                data-y="0"
                data-speed="1000"
                data-start="1100"
                data-easing="Power4.easeOut"
                data-elementdelay="0.01"
                data-endelementdelay="0.1"
                data-endspeed="1500"
                data-endeasing="Power4.easeIn"
                     data-autoplay="true"
      data-autoplayonlyfirsttime="false"
      data-nextslideatend="true"
     data-volume="mute" data-forceCover="1" data-aspectratio="4:3" data-forcerewind="on"           style="z-index: 2;"
      >


            <?php if($b->type == "video") : ?>
              <?php

              $explode = explode("https://www.youtube.com/watch?v=", $b->attachment);
              $src = $explode[1];

              ?>
<iframe src='http://www.youtube.com/embed/<?php echo $src; ?>?hd=1&wmode=opaque&autoplay=1&controls=0&showinfo=0&origin=<?php echo $this->Url->build('/', true); ?>' width='640' height='360'
                 style='width:640px;height:360px;'>
      </iframe>
          <?php endif; ?>

            </div>
        </li>
      <?php endforeach; ?>

    </ul>
        <div class="tp-bannertimer"></div>
    </div>
</div>  -->
