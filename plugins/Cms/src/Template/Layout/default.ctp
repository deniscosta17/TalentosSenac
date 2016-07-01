<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?> - CMS Senac Talentos Rio 2015 - por BBlender
    </title>
    <?= $this->Html->meta('icon') ?>

        <!-- Google Fonts -->
      <?= $this->Html->css('http://fonts.googleapis.com/css?family=Roboto:400,700,300'); ?>

      <!-- jQuery -->
      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'); ?>

      <!-- Bootstrap -->
      <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'); ?>
      <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'); ?>

      <!-- Font Awesome -->
      <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); ?>

      <!-- jQuery Mask -->
      <?= $this->Html->script('/vendor/mask-plugin/dist/jquery.mask.min.js') ?>

      <!-- Noty -->
      <?= $this->Html->script('/vendor/noty-2.3.5/js/noty/packaged/jquery.noty.packaged.min.js') ?>

      <!-- jQuery Validate -->
      <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js') ?>
      <?= $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/localization/messages_pt_BR.js') ?>

    <!-- Dropzone -->
    <!-- ?php echo $this->Html->css("/vendor/dropzone.min.css"); ? -->
    <!-- ?php echo $this->Html->script("/vendor/dropzone.min.js"); ? -->
    <?php echo $this->Html->script("https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"); ?>
    <?php echo $this->Html->css("https://rawgit.com/enyo/dropzone/master/dist/dropzone.css"); ?>

    <!-- jsViews -->
    <?php echo $this->Html->script("/vendor/jsviews.min.js"); ?>

    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/ckeditor.js'); ?>
    <?= $this->Html->script('http://cdn.ckeditor.com/4.4.7/standard/adapters/jquery.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->css('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css'); ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'); ?>


    <?= $this->Html->css('cms/cms.min.css') ?>
    <?= $this->Html->script('cms/cms.js') ?>

    <script type="text/javascript">var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <a href="<?php echo $this->Url->build(['controller' => 'cms', 'action' => 'index']); ?>">
                        <?php echo $this->Html->image("logo-cms.png"); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="row">
            <h1>Painel de Controle</h1>
        </div>

        <div class="row">
            <?php if($admin) { ?>
            <div class="col-lg-3 col-sidebar">
                <h2>Usuários Administrativos</h2>

                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">
                    <i class="fa fa-users"></i> Usuários
                </a>
                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>">
                    <i class="fa fa-user-plus"></i> Adicionar Usuário
                </a>
                <a href="<?php echo $this->Url->build(['controller' => 'authentication', 'action' => 'logout']); ?>">
                    <i class="fa fa-times"></i> Sair
                </a>


                <h2 class="h2-home"><a href="<?php echo $this->Url->build(['controller' => 'cms', 'action' => 'index']); ?>"> <i class="fa fa-home"></i> Home </a></h2>
                <h2 class="h2-home"><a href="<?php echo $this->Url->build(['controller' => 'banners', 'action' => 'index']); ?>"> <i class="fa fa-picture-o"></i> Banners </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'documents', 'action' => 'index']); ?>"> <i class="fa fa-book"></i> Documentos da Competição </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'edit', 1]); ?>"> <i class="fa fa-star"></i> Sobre o Talentos </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'articles', 'action' => 'index']); ?>"> <i class="fa fa-pencil"></i> Notícias </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'galleries', 'action' => 'index']); ?>"> <i class="fa fa-picture-o"></i> Galeria </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'results', 'action' => 'index']); ?>"> <i class="fa fa-list-alt"></i> Resultados </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'questions', 'action' => 'index']); ?>"> <i class="fa fa-question"></i> Dúvidas </a></h2>
                <h2><a href="<?php echo $this->Url->build(['controller' => 'b2b', 'action' => 'index']); ?>"> <i class="fa fa-building"></i> Area B2b </a></h2>
                <!-- h2><a href="<?php echo $this->Url->build(['controller' => 'clippings', 'action' => 'index']); ?>"> <i class="fa fa-pencil"></i> Imprensa </a></h2 -->
                <h2><a href="<?php echo $this->Url->build(['controller' => 'contacts', 'action' => 'index']); ?>"> <i class="fa fa-envelope-o"></i> Fale Conosco </a></h2>
            </div>
            <?php } ?>

            <div class="col-lg-9 col-main">
                <?= $this->Flash->render() ?>

                <?= $this->fetch('content') ?>
            </div>
        </div>

    </div>

</body>
</html>
