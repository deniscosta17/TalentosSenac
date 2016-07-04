
<!--
#################################
    - THEMEPUNCH BANNER -
#################################
-->
<div class="tp-banner-container">
    <div class="tp-banner" >
            <ul>    <!-- SLIDE  -->

            <?php foreach($banners as $b) : ?>
        <!-- SLIDE  -->
        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="http://themepunch.com/revolution/wp-content/uploads/2014/05/video_space_cover-320x200.jpg"  data-saveperformance="off"  data-title="Infinite Possibilities">

            <?php if($b->type == "imagem") : ?>
            <!-- MAIN IMAGE -->
            <img src="<?php echo $this->Url->build('/uploads/' . $b->attachment); ?>"  alt="video_space_cover"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->
          <?php endif; ?>

            <!-- LAYER NR. 1 -->
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
                     data-autoplay="false"
      data-autoplayonlyfirsttime="false"
      data-nextslideatend="true"
     data-volume="mute" data-forceCover="1" data-aspectratio="4:3" data-forcerewind="on"           style="z-index: 2;"
      >


            <?php if($b->type == "video") : ?>
              <?php

              $explode = explode("https://www.youtube.com/watch?v=", $b->attachment);
              $src = $explode[1];

              ?>
<iframe src='http://www.youtube.com/embed/<?php echo $src; ?>?hd=1&wmode=opaque&autoplay=0&controls=0&showinfo=0&origin=<?php echo $this->Url->build('/', true); ?>' width='640' height='360'
                 style='width:640px;height:360px;'>
      </iframe>
          <?php endif; ?>

            </div>
        </li>
      <?php endforeach; ?>

    </ul>
        <div class="tp-bannertimer"></div>
    </div>
</div> <!-- video acaba  aqui -->


<div id="content-cadastro">
  <div class="container container-geral">
    <div class="row pos-r">


    <!--
      ######### BLOCO Noticias ######### -->
    <?php if($formHome == 0): ?>  
    <div class="col-lg-6 col-md-6 border-orange">
      <h2 class="page-title">Notícias <span class="orange-line"></span></h2>

      <section id="articles-list">

        <div class="center-block text-center">

        <?php if(empty($latestArticles->toArray())) : ?>
          <h2 style="font-style: italic;">Em breve</h2>
        <?php endif; ?>

          <?php foreach($latestArticles as $a) : ?>
          <article class="article"> <a href="javascript:;" data-json='<?php echo json_encode($a->toArray()); ?>'>

            <?php if(!empty($a->attachment)) : ?>
              <div class="imgLiquidFill" style="width: 100%; height: 150px;">
                <?php echo $this->Senac->upload($a->attachment); ?>
                </div>
            <?php endif; ?>

            <h3 class="article-name"><?php echo $a->name; ?></h3>
            <div class="article-excerpt"><?php echo $this->Text->truncate(strip_tags($a->excerpt), 150, ['exact' => true]); ?></div>
          </a> </article>
        <?php endforeach; ?>

        </div>

      </section>
    </div>   


     <div class="col-lg-6 col-md-6 border-orange">
      <h2 class="page-title" style="font-size: 26px;">Confira os Resultados <span class="blue-line"></span></h2>

      <div class="text-center">

       <p>Confira a lista de classificados para a Etapa Regional do Talentos Senac 2015.</p>

        <a href="<?php echo $this->Url->build(['controller' => 'Resultados', 'action' => 'index']); ?>" class="btn btn-primary">Confira</a>
      </div>
    </div>

    
    <?php endif; ?>
    <!-- Quando a versao da home sem formulario somente com noticias
      comentar a div do formulario e descomentar a div de noticias. ->



    <!-- div formulario -->
    <?php if($formHome): ?>
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 text-center">

        <div class="center-block">

          <h2 class="page-title">Talentos <span class="line-title"></span></h2>

          <?php echo $this->element("steps"); ?>

        </div> <!-- .center-block -->

    </div>
  <?php endif; ?>
    <!-- div formulario fim -->

  


   
    <!-- Div noticias fim ->


     <!-- .col-lg-6 -->

   </div> <!-- .row -->
  </div> <!-- .container -->
</div>
<!-- Modal -->
<div class="modal fade" id="modal-noticias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titulo-noticia"></h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagem-noticia" style="display: none;" class="img-responsive">

        <div id="corpo-noticia" style="margin-top: 20px; margin-bottom: 20px;"></div>
      </div>
      <div class="modal-footer form">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>
  </div>
</div> <!-- #modal-noticias -->
