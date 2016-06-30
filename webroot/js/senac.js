$(document).ready(function() {

  // jQuery Masked Input
$('#tel').mask("(99) 9999-9999?9")

  var scroll_atual = 20;

  $(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
       var novo_scroll = scroll_atual + 20;

       for (var i = scroll_atual; i <= novo_scroll; i++) {
         $(".linha-" + i).show();
       };

       scroll_atual = novo_scroll;
   }
});

  $(".imgLiquidFill").imgLiquid();

  $("img.lazy").lazyload();

  $(document).on("click", ".img-facebook-share", function() {
    var url = $(this).data("url");

    popup = window.open(url, "facebook_popup", "width=620,height=400,status=no,scrollbars=no,resizable=no");
    popup.focus();

    return false;
  });

  $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });

  $(".validate").validate();

  var conteudo = $("#conteudo-regulamento-geral").clone();
  $("#resposta-ajax").html(conteudo).find("#conteudo-regulamento-geral").show();

  $("#select-documento").change(function() {
    var document_id = $(this).val();

    if(document_id != "") {
      $("#resposta-ajax").slideUp(500, function() {
          $.ajax({
            type: "GET",
            url: baseUrl + "documentos/visualizar/" + document_id,
            success: function(data) {

              $("#resposta-ajax").html(data);
              $("#resposta-ajax").slideDown(500);

            }
          });
      });
    } else {
       $("#resposta-ajax").slideUp(500, function() {

          var conteudo = $("#conteudo-regulamento-geral").clone();
          $("#resposta-ajax").html(conteudo).find("#conteudo-regulamento-geral").show();

          $("#resposta-ajax").slideDown(500);

       });
    }

  });

  $(document).on("submit", ".form-informacoes", function(e) {
    var dados = $(this).serialize();

    $.ajax({
      type: "POST",
      url: baseUrl + "ajax/receber_informacoes",
      data: dados,
      success: function(data) {
        data = jQuery.parseJSON(data);

        if(data.status == "success") {

          $(".form-informacoes").fadeOut(500, function() {

            $("#alertas-informacoes").html("<div class='alert alert-success'>Inscrição realizada com sucesso!</div>").fadeIn(500);
          });
        } else {

          $(".form-informacoes").fadeOut(500, function() {

            $("#alertas-informacoes").html("<div class='alert alert-danger'>Você já é um inscrito.</div>").fadeIn(500);
          });
        }
      }
    });

    return false;
  });

  var questions = {};

  $(".questions a").on("click", function() {
    var question = $(this).data("question");
    var value = $(this).data("value");
    var current_step = $(this).parent().parent().clone().removeClass("step").attr("class").replace("step-", "");
    current_step = (parseInt(current_step) + 1);
    var next_step = $(".step-" + current_step);

    if(next_step.length >= 1) {
      $(this).parent().parent().animate({
        marginLeft: "-500px"
      }, 500, function() {
        $(this).hide();
        $(".step-" + current_step + "-" + value).show().animate({
          marginLeft: "0px"
        }, 1000, function() {
          $("input").first().focus();
        });
      });
    }

    questions[question] = value;

    return false;
  });

  function validarEmail() {
    var email = $("#campo-email").val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var is_valid = regex.test(email);

    if(is_valid) {
      $("#botao-cadastro").prop("disabled", false);
    }
  }
  $("#campo-email").on("keyup", function() {
    validarEmail();
  });

  $("#campo-email").on("blur", function() {
    validarEmail();
  });

  var ocupacoes_por_unidade = {};

  $('.cpf').mask('000.000.000-00', {
    reverse: true,
    onInvalid: function(val, e, f, invalid, options) {

          $("#alertas-cadastro").stop().removeClass().addClass("alert alert-danger").html("CPF inválido.").fadeIn(500);

            $("#campo-nome").val('').prop("disabled", true);
            $("#campo-email").val('').prop("disabled", true);
            $("#botao-cadastro").prop("disabled", true);
    },
    onComplete: function(cpf) {
      $.ajax({
        type: "POST",
        data: {cpf: cpf},
        url: baseUrl + "ajax/validate_cpf",
        success: function(data) {
          data = jQuery.parseJSON(data);

          console.log(data);

          if(data.status == "success") {
            $("#campo-nome").val(data.nome);
            $("#campo-email").prop("disabled", false).focus();
            $("#campo-ocupacao").prop("disabled", false);
            $("#campo-ocupacao option").remove();
            $("#campo-unidade option").remove();
            $("#campo-unidade").append('<option value="">Unidade</option>');
            $("#campo-ocupacao").append('<option value="">Ocupação</option>');

            ocupacoes_por_unidade = data.ocupacoes_por_unidade;

            $.each(data.ocupacoes, function(key, value) {
              $("#campo-ocupacao").append('<option value="' + value + '">' + value + '</option>');
            });

          } else {
            $("#campo-email").val('').prop("disabled", true);
            $("#botao-cadastro").prop("disabled", true);
          }

          $("#alertas-cadastro").stop().fadeOut(500, function() {
            $(this).removeClass().addClass("alert alert-" + data.status).html(data.message).fadeIn(500);
          });
        }
      });
    }
  });

  $(document).on("change", "#campo-ocupacao", function() {
    var value = $(this).val();

    $("#campo-unidade option").remove();
    $("#campo-unidade").append('<option value="">Unidade</option>');

    $.each(ocupacoes_por_unidade[value], function(key, value) {
      $("#campo-unidade").append('<option value="' + value + '">' + value + '</option>');
    });

    $("#campo-unidade").prop("disabled", false).focus();
  });

  $(".article a").on("click", function() {
    var json = $(this).data("json");

    $("#titulo-noticia").html(json.name);
    $("#corpo-noticia").html(json.content);

    if(json.attachment != "") {
      $("#imagem-noticia").show().prop("src", baseUrl + "uploads/" + json.attachment);
    } else {
      $("#imagem-noticia").hide();
    }
    $("#modal-noticias").modal("show");
  });

  $("select.form-control").each(function(index, element) {
    var div = $(this).parent();
    var span = $(div).append("<span class='arrow-orange'></span>");
    $(div).css("position", "relative");
  });

  $('.grid').masonry({
    // options
    itemSelector: '.grid-item',
    percentPosition: true
  });

  $("#mobile-menu").click(function() {
    $("#articles-list").toggleClass("onblur");

    $(".container-menu").stop().toggle(0);

    return false;
  });

  $(".container-geral").click(function() {

    if($("body").hasClass("is-mobile") || $("body").hasClass("is-tablet")) {
      $(".container-menu").stop().hide();
      $("#articles-list").removeClass("onblur");
    }
  });

  $('.tp-banner').revolution({
  	startwidth:1170,
  	startheight:600,
  	fullWidth:"off",
  	fullScreen:"off"
  });

});
