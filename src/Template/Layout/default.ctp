<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Talentos Senac 2016 - <?= $this->fetch('title') ?></title>

  <?php $url2 = $this->Url->build('/', true); ?>
    <?php if(!empty($gallery)) : ?>
      <meta property="og:image" content="<?php $url = $this->Url->build('/uploads/' . $gallery->attachment, true); echo $url2 . 'timthumb.php?w=500&src=' . $url; ?>">
<?php endif; ?>

    <?php if(!empty($article)) : ?>
      <meta property="og:image" content="<?php $url = $this->Url->build('/uploads/' . $article->attachment, true); echo $url2 . 'timthumb.php?w=500&src=' . $url; ?>">
  <?php endif; ?>

  <?= $this->Html->meta('icon') ?>

  <!-- Google Fonts -->
  <?= $this->Html->css('https://fonts.googleapis.com/css?family=Raleway:300,700'); ?>

  <!-- jQuery -->
  <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'); ?>

  <!-- Bootstrap -->
  <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'); ?>
  <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'); ?>

  <!-- Font Awesome -->
  <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); ?>

  <!-- SLIDER REVOLUTION -->
  <?= $this->Html->script('/vendor/rs-plugin/js/jquery.themepunch.plugins.min.js') ?>
  <?= $this->Html->script('/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') ?>
  <?= $this->Html->css('/vendor/rs-plugin/css/extralayers.css') ?>
  <?= $this->Html->css('/vendor/rs-plugin/css/settings.css') ?>

  <!-- Masonry -->
  <?= $this->Html->script('/vendor/masonry.pkgd.min.js') ?>

  <!-- jQuery Mask -->
  <?= $this->Html->script('/vendor/mask-plugin/dist/jquery.mask.min.js') ?>

  <!-- Noty -->
  <?= $this->Html->script('/vendor/noty-2.3.5/js/noty/packaged/jquery.noty.packaged.min.js') ?>

  <!-- Transit -->
  <?= $this->Html->script('/vendor/jquery.transit.min.js') ?>

  <!-- jQuery Validate -->
  <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js') ?>
  <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_pt_BR.js') ?>

  <!-- Bootstrap Lightbox -->
  <?= $this->Html->css('/vendor/lightbox/dist/ekko-lightbox.min.css') ?>
  <?= $this->Html->script('/vendor/lightbox/dist/ekko-lightbox.min.js') ?>

  <!-- Lazyload -->
  <?= $this->Html->script('/vendor/lazyload/jquery.lazyload.min.js') ?>

  <!-- imgLiquid -->
  <?= $this->Html->script('/vendor/imgLiquid/js/imgLiquid-min.js') ?>

  <!-- Senac -->
  <?= $this->Html->css('/css/senac.min.css') ?>
  <?= $this->Html->script('/js/senac.min.js') ?>

  <style>
  .btn-badge {
      display: none
  }
  </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>


    <script type="text/javascript"> window.smartlook||(function(d) { var o=smartlook=function(){ o.api.push(arguments)},s=d.getElementsByTagName('script')[0]; var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript'; c.charset='utf-8';c.src='//rec.getsmartlook.com/bundle.js';s.parentNode.insertBefore(c,s); })(document); smartlook('init', '067991647f97ea02ca8d44a21d31ce7cd82141db'); </script>




</head>
<?php
  require_once WWW_ROOT . 'vendor/mobile-detect/Mobile_Detect.php';
  $detect = new \Mobile_Detect;
?>
<body class="<?php echo $this->request->controller; ?>-<?php echo $this->request->action; ?> <?php if ( $detect->isMobile() ) { echo 'is-mobile '; } ?><?php if ( $detect->isTablet() ) { echo 'is-tablet '; } ?><?php if ( !$detect->isMobile() && !$detect->isTablet() ) { echo 'is-desktop'; } ?>">

<div id="wrap">
<div id="main">
    <header id="header">

     <!-- #logo-top -->
    <div class="container">
      <a id="logo-top" href="/" title="Talentos Senac 2016">
        <img src="<?php echo $this->Url->build('/img/Logo.png'); ?>" width="320">
      </a>

      <div class="row">
          <div class="col-lg-12">
            <nav id="main-navbar">
              <a style="margin-top:0px;" href="#" id="mobile-menu"> <i class="fa fa-bars"></i> </a>

              <div class="container-menu">
                <a href="<?php echo $this->Url->build(['controller' => 'Documentos', 'action' => 'index']); ?>">Documentos da Competição<span></span></a>
                <a href="<?php echo $this->Url->build(['controller' => 'Sobre', 'action' => 'index']); ?>">Sobre o Talentos<span></span></a>
                <a href="<?php echo $this->Url->build(['controller' => 'Noticias', 'action' => 'index']); ?>">Notícias<span></span></a>
                <a href="<?php echo $this->Url->build(['controller' => 'Galeria', 'action' => 'index']); ?>">Galeria<span></span></a>
                <!-- <a href="<?php echo $this->Url->build(['controller' => 'Resultados', 'action' => 'index']); ?>">Resultados<span></span></a> -->
                <a href="<?php echo $this->Url->build(['controller' => 'Faq', 'action' => 'index']); ?>">Dúvidas<span></span></a>
                <!-- <a href="<?php echo $this->Url->build(['controller' => 'Imprensa', 'action' => 'index']); ?>">Imprensa<span></span></a> -->
                <a href="<?php echo $this->Url->build(['controller' => 'Contato', 'action' => 'index']); ?>" class="">Fale Conosco<span></span></a>
              </div> <!-- .container-menu -->

            </nav> <!-- #main-navbar -->
            <div class="clearfix"></div>
          </div> <!-- .col-lg-12 -->
      </div> <!-- .row -->
    </div> <!-- .container -->
  </header> <!-- #header -->

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>
</div> <!-- #main -->
</div> <!-- #wrap -->


    <footer id="footer">
      <a id="selo-senac" href="http://www.rj.senac.br/?utm_source=Hotsite-Talentos&utm_medium=Selo&utm_campaign=Deseja-tornar-aluno" target="_blank"><img src="<?php echo $this->Url->build('/img/selo.png'); ?>"></a>
      <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-left text-center-mobile col-logo">
                <img class=" img-responsive pull-left" src="<?php echo $this->Url->build('/img/Logo_footer.png'); ?>" height="68">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 text-center">
                <p class="">CONECTE-SE CONOSCO:</p>
                <ul class="icons-footer">
                  <li><a href="https://www.facebook.com/senacrj" target="_blank"><img src="<?php echo $this->Url->build('/img/icon-face.png'); ?>" height="45"></a></li>
                  <li><a href="https://www.youtube.com/user/SenacRJ" target="_blank"><img src="<?php echo $this->Url->build('/img/icon-youtube.png'); ?>" height="45"></a></li>
                  <li><a href="https://www.instagram.com/senac_rj/" target="_blank"><img src="<?php echo $this->Url->build('/img/icon-instagram.png'); ?>" height="45"></a></li>
                  <li><a href="https://www.linkedin.com/edu/senac-rj-161052" target="_blank"><img src="<?php echo $this->Url->build('/img/icon-linkedin.png'); ?>" height="45"></a></li>
                  <li><a href="https://twitter.com/senac_rj" target="_blank"><img src="<?php echo $this->Url->build('/img/icon-twitter.png'); ?>" height="45"></a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 show-for-medium-up text-center">
                <ul class="logo-footer">
                  <li><a href="http://www.rj.senac.br/" target="_blank"><img src="<?php echo $this->Url->build('/img/logo-senac-rodape.png'); ?>"></a></li>
                </ul>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">

                <hr style="border: none; border-bottom: 1px solid #FFF !important; margin-top:0;">
                <p>@ COPYRIGHT SENAC RJ 2016</p>

            </div>
        </div>
      </div>
    </footer>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-5378444-23', 'auto');
      ga('send', 'pageview');

    </script>

</body>
</html>
