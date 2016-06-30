<?php $options = ["classificacao_geral" => "Classificação Geral", "1_etapa" => "1ª Etapa", "2_etapa" => "2ª Etapa", "3_etapa" => "3ª Etapa"]; ?>
<?php echo $this->Form->create(null, ['class' => 'form validate', 'type' => 'file']); ?>
<?php echo $this->Form->input("attachment", ['required' => true, "type" => "file"]); ?>
<?php echo $this->Form->input("category", ['required' => true, "label" => "Categoria", "class" => "form-control", "type" => "select", 'empty' => 'Selecionar', "options" => $options ]); ?>
<?php echo $this->Form->submit("Importar", ["class" => "btn btn-primary"]); ?>
<?php echo $this->Form->end(); ?>

<div class="alert alert-warning" style="margin-top: 20px;">
  Apenas arquivos no formato .csv
</div>

 <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-top: 20px;">
  <?php foreach($options as $key => $v) : ?>
    <li role="presentation"><a href="#<?php echo $key; ?>" aria-controls="<?php echo $key; ?>" role="tab" data-toggle="tab"><?php echo $v; ?></a></li>
<?php endforeach; ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
  <?php foreach($options as $key => $v) : ?>
    <div role="tabpanel" class="tab-pane" id="<?php echo $key; ?>">

        <table class="table">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Unidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultados[$key] as $r) : ?>
                    <tr style="font-size: 10px;">
                        <td><?php echo $r['posicao']; ?></td>
                        <td><?php echo $r['nome']; ?></td>
                        <td><?php echo $r['curso']; ?></td>
                        <td><?php echo $r['unidade']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>


    </div>
<?php endforeach; ?>
  </div>
