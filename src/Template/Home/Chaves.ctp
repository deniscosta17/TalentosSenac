<div class="container container-geral">
  <div class="row pos-r">


    <div class="col-lg-12">
      <h2 class="page-title">CONFIRMAÇÃO<span class="line-title"></span></h2>


       <p style="font-weight:700;position:inherit;left:500px;" >Inscrição Confirmada!</p>


    </div>

    

    <div id="dados-iscricao">
    
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="border-top: 2px solid #ED5C6A" >
         CPF
       </div>
       <div class="col-lg-8 col-md-8 col-xs-12">
         <p style="font-weight:700;"><?= $chaves->cpf; ?></p>
         <!--p style="font-weight:700;">RAFAELLA CHRISTINA OLIVEIRA DA SILVA</p-->
       </div>
       <div id="cpf-confirmacao" class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="border-top: 2px solid #ED5C6A" >
         Nome
       </div>
       <div class="col-lg-4 col-md-4 col-xs-12">
         <p style="font-weight:700;"><?php echo strtoupper ($chaves['name']); ?></p>
         <!--p style="font-weight:700;">159.552.057-05</p-->
       </div>

   </div>

     <div class="clearfix"></div>

      <div id="cod-confirmacao" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <p style="font-weight:700;"><?php echo strtoupper ($chaves['id_key']); ?></p>
        <p style="font-weight:700;">Você irá precisar do código no dia da prova, guarde com você</p>
        

      </div>


  </div>

</div>

 
