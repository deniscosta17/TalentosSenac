
<div class="container container-geral">
  <div class="row pos-r">
    <div class="col-lg-12">
      <h2 class="page-title">Fale Conosco <span class="line-title"></span></h2>

    </div>

    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 text-center" style="font-size:20px;margin-top:20px; margin-bottom:25px;">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
       magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        mollit anim id est laborum.</p>

    </div>
  </div>

<?php if(!empty($horarioFaleConosco)) : ?>
  <div class="row" style="margin-top: 20px;">
    <div class="col-lg-4 col-lg-offset-4 col-sm-12 col-xs-12 col-md-12 text-center">
      <i class="fa fa-clock-o icone-relogio" style="display: inline-block;position: relative;top: -18px;left: -8px;"></i>
      <div class="p-horario" style="display: inline-block;">
        <?php echo $horarioFaleConosco; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<div id="form-contato" class="row">

<?php echo $this->Form->create($contactEntity, ['class' => 'validate form col-lg-12 col-xs-12']); ?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
          <?php echo $this->Form->input("name", ['label' =>false, 'required' => 'required', 'placeholder' => 'NOME', 'class' => 'form-control']); ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
          <?php echo $this->Form->input("email", ['label' =>false, 'type' => 'text', 'required' => 'required', 'placeholder' => 'E-MAIL', 'class' => 'email form-control']); ?>
        </div>

    </div>
    <div class="clearfix"></div>

  <div class="form-group">



    <?php
      $unidades = [
        'Unidade' => 'Unidade',
        'Centro Politécnico' => 'Centro Politécnico',
        'Faculdade Senac' => 'Faculdade Senac',
        'Unidade Angra dos Reis' => '',
        'Unidade Barra da Tijuca I' => '',
        'Unidade Barra da Tijuca II' => '',
        'Unidade Barra do Piraí' => '',
        'Unidade Barra Mansa' => '',
        'Unidade Bonsucesso' => '',
        'Unidade Botafogo' => '',
        'Unidade Cabo Frio' => '',
        'Unidade Campo Grande' => '',
        'Unidade Campos' => '',
        'Unidade Copacabana' => '',
        'Unidade Duque de Caxias' => '',
        'Unidade Irajá' => '',
        'Unidade Itaguaí' => '',
        'Unidade Itaocara' => '',
        'Unidade Itaperuna' => '',
        'Unidade Macaé I' => '',
        'Unidade Macaé II' => '',
        'Unidade Madureira' => '',
        'Unidade Marechal Floriano' => '',
        'Unidade Miguel Pereira' => '',
        'Unidade Niterói' => '',
        'Unidade Nova Friburgo' => '',
        'Unidade Nova Iguaçu' => '',
        'Unidade Nova Iguaçu I' => '',
        'Unidade Paraíba do Sul' => '',
        'Unidade Petrópolis' => '',
        'Unidade Posto Escola' => '',
        'Unidade Resende' => '',
        'Unidade Rio das Ostras' => '',
        'Unidade Santo Antônio de Pádua' => '',
        'Unidade São Gonçalo' => '',
        'Unidade São João de Meriti' => '',
        'Unidade Teresópolis' => '',
        'Unidade Três Rios' => '',
        'Unidade Volta Redonda' => '',
      ];

      foreach($unidades as $k => $v) {
        $unidades[$k] = $k;
      }
    ?>


    <div class="clearfix"></div>

  </div>

  <div class="form-group">

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="form-group">
        <?php echo $this->Form->input("phone", ['label' =>false, 'type' => 'text', 'required' => 'required', 'placeholder' => 'TELEFONE', 'class' => 'form-control']); ?>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

        <div class="form-group">
        <?php echo $this->Form->input("unity", ['label' =>false, 'type' => 'select', 'required' => 'required', 'class' => 'form-control', 'options' => $unidades ]); ?>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

        <div class="form-group">
          <?php echo $this->Form->input("subject", ['label' =>false, 'type' => 'select', 'required' => 'required', 'class' => 'form-control', 'options' => ['Assunto' => 'Assunto', 'Dúvida' => 'Dúvida', 'Reclamação' => 'Reclamação', 'Sugestão' => 'Sugestão', 'Outros' => 'Outros'] ]); ?>
        </div>
    </div>

    <div class="clearfix"></div>
  </div>
    <div class="form-group col-lg-12 col-lg-12 col-xs-12">
        <?php echo $this->Form->input("message", ['label' =>false, 'type' => 'textarea', 'required' => 'required', 'placeholder' => 'MENSAGEM', 'class' => 'form-control']); ?>
        <div class="clearfix"></div>
    </div>
    <div class="col-lg-4 col-lg-offset-4">
      <button class="btn btn-success btn-block radius btn-center">ENVIAR</button>
    </div>

<?php echo $this->Form->end(); ?>

</div>
</div>
