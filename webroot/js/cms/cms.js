Dropzone.autoDiscover = false;

$(document).ready(function() {

    $(document).on("change", "#type", function() {
        var value = $(this).val();

        if(value == "imagem")
        {
            $(".input-anexo").fadeIn(500);
            $(".input-anexo-texto").fadeOut(500);
        } else {
            $(".input-anexo").fadeOut(500);
            $(".input-anexo-texto").fadeIn(500);
        }
    });

    $(document).on("blur", ".input-name", function() {

        var elem = $(this);

        $.ajax({
            type: "POST",
            data: {id: $(elem).data('id'), value: $(elem).val(), field: "name"},
            url: baseUrl + "cms/ajax/update_document_attachment",
            success: function(data) {
                $(elem).parent().find("span.sucesso").fadeIn(500);
            }
        });
    });

    $(document).on("blur", ".input-description", function() {

        var elem = $(this);

        $.ajax({
            type: "POST",
            data: {id: $(elem).data('id'), value: $(elem).val(), field: "description"},
            url: baseUrl + "cms/ajax/update_document_attachment",
            success: function(data) {
                $(elem).parent().find("span.sucesso").fadeIn(500);
            }
        });
    });

    var myDropzone = new Dropzone("#dropzone-senac");
      myDropzone.on("success", function(file, response) {
        response = jQuery.parseJSON(response);

        var template = $.templates("#template-novo-arquivo");
        var html = template.render(response);


        $("#table-attachments tbody").prepend(html);
        $(".tr-escondido").fadeIn(500);
      });

    $(".datepicker").datepicker({
        dateFormat: "dd/mm/yy"
    });
});