
  <div class="container container-geral">
  <div class="row pos-r">


      <div class="col-lg-12">
        <h2 class="page-title">Notícias <span class="line-title"></span></h2>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-12 text-center">


      <?php if(empty($articles->toArray())) : ?>
        <h2 style="font-style: italic;">Em breve</h2>
      <?php endif; ?>

        <section id="articles-list" class="grid">

            <?php foreach($articles as $a) : ?>
            <article class="article grid-item">
              <a href="<?php echo $this->Url->build(['action' => 'index', $a->id]); ?>">

          <?php if(!empty($a->attachment)) : ?>
            <div class="imgLiquidFill" style="width: 100%; height: 150px;">
              <?php echo $this->Senac->upload($a->attachment); ?>
              </div>
          <?php endif; ?>

                <h3 class="article-name"><?php echo $a->name; ?></h3>
                <div class="article-excerpt">
                  <?php
                   echo $this->Text->truncate(strip_tags($a->excerpt), 150, ['exact' => true] ); ?>
                </div>
              </a>

              <hr>
             </article>
           <?php endforeach; ?>

        </section> <!-- #articles-list-->
      </div> <!-- .col-lg-6 -->

    </div> <!-- .row -->
  </div> <!-- .container -->

<?php if(!empty($article)) : ?>
  <script type="text/javascript">$(document).ready(function() { $('#modal-noticias').modal('show'); });</script>
<!-- Modal -->
<div class="modal fade in" id="modal-noticias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titulo-noticia"><?php echo $article->name; ?></h4>
      </div>
      <div class="modal-body">
      <?php if(!empty($article->attachment)) : ?>
        <?php echo $this->Senac->upload($article->attachment, ['id' => 'imagem-noticia', 'class' => 'img-responsive']); ?>
      <?php endif; ?>

        <div id="corpo-noticia" style="margin-top: 20px; margin-bottom: 20px;"><?php echo $article->content; ?></div>
      </div>
      <div class="modal-footer form">
        <button type="button" class="btn btn-success" onclick="$('#modal-noticias').modal('close');" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>
  </div>
</div> <!-- #modal-noticias -->
<?php endif; ?>
