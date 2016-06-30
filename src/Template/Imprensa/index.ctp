
  <div class="container container-geral">
  <div class="row pos-r">


      <div class="col-lg-12">
        <h2 class="page-title">Imprensa <span class="line-title"></span></h2>

        <h3 class="text-center">Para contato com a imprensa sobre o Talentos Senac 2016:</h3>
      </div>

      <div class="clearfix"></div>

      <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 text-center">
        <strong>Mariana Pupo</strong> <br>
        (21) 3461-4616 - ramal 173 <br>
        mariana.pupo@approach.com.br
      </div>

      <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 text-center">
        <strong>Cintia Magalhães</strong> <br>
        (21) 3461-4616 – ramal 175 <br>
        cintia.magalhaes@approach.com.br
      </div>
    </div>
    <div class="row" style="margin-top: 30px;">

      <div class="col-lg-12 text-center">

        <section id="articles-list" class="grid">

            <?php foreach($clippings as $a) : ?>
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

<?php if(!empty($clipping)) : ?>
  <script type="text/javascript">$(document).ready(function() { $('#modal-noticias').modal('show'); });</script>
<!-- Modal -->
<div class="modal fade in" id="modal-noticias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titulo-noticia"><?php echo $clipping->name; ?></h4>
      </div>
      <div class="modal-body">
      <?php if(!empty($clipping->attachment)) : ?>
        <?php echo $this->Senac->upload($clipping->attachment, ['id' => 'imagem-noticia', 'class' => 'img-responsive']); ?>
      <?php endif; ?>

        <div id="corpo-noticia" style="margin-top: 20px; margin-bottom: 20px;"><?php echo $clipping->content; ?></div>
      </div>
      <div class="modal-footer form">
        <button type="button" class="btn btn-success" onclick="$('#modal-noticias').modal('close');" data-dismiss="modal">Fechar janela</button>
      </div>
    </div>
  </div>
</div> <!-- #modal-noticias -->
<?php endif; ?>
