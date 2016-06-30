
<div class="container container-geral">
  <div class="row pos-r">

    <div class="col-lg-12">
      <h2 class="page-title">Documentos da Competição <span class="line-title"></span></h2>
    </div>
  </div>
  <div class="row">

    <div class="col-lg-4">
      <form class="form" action="index.html" method="post">

          <h3 class="article-name" style="color: #19305a;font-weight:normal;">Selecione o seu curso</h3>

        <div id="form-documentos" class="form-group">

          <select id="select-documento" class="form-control" name="">
            <option value="">SELECIONAR</option>
            <?php foreach($documents as $d) : ?>
            <option value="<?php echo $d->id; ?>"><?php echo mb_strtoupper($d->name, "UTF-8"); ?></option>
            <?php endforeach; ?>
          </select> <!-- #select-documento -->
        </div> <!-- .form-group -->

      </form>

    </div>

    <div class="col-lg-8">

    <div id="conteudo-regulamento-geral" style="display: none;">

      <h3 class="article-name" style="font-size: 32px;">Regulamento Geral</h3>

      <p style="font-weight: bold;">Nesta página, você poderá fazer o download do Regulamento Geral da Competição e também dos documentos específicos de cada ocupação participante do Talentos Senac 2016.</p>

      <p>Em 2015 o Senac RJ realizará a 5ª edição da competição Talentos SENAC, que reúne estudantes da rede de Unidades Operativas (UO) do Senac RJ, matriculados nos cursos de Educação Profissional e Tecnológica de diferentes segmentos produtivos, sendo realizada por meio de provas práticas.</p>

      <p>A competição tem uma dupla finalidade: internamente, visa avaliar o desempenho dos estudantes no seu fazer profissional e, a partir da análise dos resultados obtidos, promover a melhoria contínua dos processos de Educação Profissional desenvolvidos pelo Senac RJ, em conformidade com o referencial estratégico de busca da excelência. Além disso, sendo atividade com estreito alinhamento metodológico com os processos de sala de aula, o evento representa a oportunidade para a promoção e disseminação das melhores práticas pedagógicas, enriquecendo e difundindo o capital de conhecimento do Senac RJ.</p>

      <p>Para o público externo, por sua vez, o Talentos SENAC tem o objetivo de apresentar para o mercado de diferentes setores produtivos o desempenho dos seus melhores alunos matriculados ou egressos dos cursos ofertados, representando um canal efetivo para a empregabilidade.</p>
      <div class="form">
        <a onclick="ga('send', 'event', 'Hotsite-Talentos', 'Download', 'Regulamento')" href="<?php echo $this->Url->build(['action' => 'download', 'regulamento-geral.pdf']); ?>" class="btn btn-green" style="margin-top: 20px;">Download do Regulamento Geral</a>

      </div>

    </div>

    <div id="resposta-ajax">
    </div>

    </div>
  </div>
</div>
