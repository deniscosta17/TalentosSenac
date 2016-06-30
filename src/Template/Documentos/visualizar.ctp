


<h3 class="article-name" style="font-size: 32px;"><?php echo $document->name; ?></h3>

<h4 class="article-name" style="font-size: 28px;margin-top:30px;">Regulamento</h4>

<!--<h3 class="article-name">Regulamento</h3>-->

<div class="row">

<div class="col-lg-12 form duas-colunas">
  <!--<div class="article-excerpt">
    <?php echo $document->content; ?>
  </div>-->
</div>

<div class="row">

  <div class="col-lg-12 form">
    <a href="<?php echo $this->Url->build(['action' => 'download', 'regulamento-geral.pdf']); ?>" class="btn btn-green" style="margin-top: 20px;">Download do Regulamento Geral</a>
  </div>

</div>

<div class="clearfix"></div>

<hr>


<div class="row">

<div class="col-lg-6">
  <h3 class="article-name">Data</h3>

  <p class="article-excerpt"><?php echo $document->date; ?></p>

  <h3 class="article-name">Horário</h3>

  <p class="article-excerpt"><?php echo $document->hour; ?></p>

  <h3 class="article-name">Unidade</h3>

  <p class="article-excerpt"><?php echo $document->unity; ?></p>
</div>

  <div class="col-lg-6">
    <h3 class="article-name">Material</h3>

    <div class="article-excerpt">
      <?php echo $document->material; ?>
    </div>

  </div>
</div>
<!---->
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-lg-12">

 <div class="article-excerpt">
    <?php echo $document->content_2; ?>
 </div>

</div>
</div>

<?php if(!empty($document->document_attachments)) : ?>
<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
<div class="col-lg-12">

  <p class="article-excerpt" style="font-weight: bold !important;"><?php echo sizeof($document->document_attachments); ?> arquivo<?php if(sizeof($document->document_attachments) > 1) : ?>s<?php endif; ?> para download:</p>

  <table class="table form">
    <tbody>
    <?php foreach($document->document_attachments as $a) : ?>
      <tr>
        <td><?php

        if (preg_match("/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]\-/", $a->name)) {
          echo substr($a->name, 11, -1);
        } else {
          echo $a->name;
        }

        ?></td>
        <td>Breve descrição | Excepteur sint non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
        <td><a href="<?php echo $this->Url->build(['action' => 'download', $a->attachment]); ?>" class="btn btn-download">Download</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

</div>
</div>
<?php endif; ?>

<?php if(empty($document->document_attachments)) : ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger">
        Não há anexos para este documento.
      </div>
    </div>
  </div>
<?php endif; ?>
