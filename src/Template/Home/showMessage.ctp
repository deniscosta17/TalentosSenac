<div class="container container-geral">
  <div class="row pos-r">


    <div class="col-lg-12">
      <h2 class="page-title">CONFIRMAÇÃO<span class="line-title"></span></h2>


       <p style="font-weight:700;position:inherit;left:500px;" ><?= $msg['message']; ?></p>


    </div>

    

    <div id="dados-iscricao">
    
       <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="border-top: 2px solid #ED5C6A" >
         Nome
       </div>
       <div class="col-lg-8 col-md-8 col-xs-12">
         <p style="font-weight:700;"><?= $msg['name']; ?></p>
         <!--p style="font-weight:700;">RAFAELLA CHRISTINA OLIVEIRA DA SILVA</p-->
       </div>
      
   </div>

     <div class="clearfix"></div>

      <div id="cod-confirmacao" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <p style="font-weight:700;"><?php echo strtoupper ($msg['id_key']); ?></p>
      </div>


  </div>

</div>

 
