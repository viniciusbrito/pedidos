$("#input_produto").keyup(function(event){

    $('#list_produto').empty();

    if($(this).val().length < 1) {
        $('#produto_id').val(0);
        return false;
    }

    $('#search_produto').submit();
});

$('#search_produto').on('submit', function(event){
    event.preventDefault();

    var $form = $(this),
        key = $form.find("input[name='key']").val(),
        token = $form.find("input[name='_token']").val(),
        url = $form.attr("action");

    $.ajax({
        url:url,
        type:'post',
        dataType:'json',
        success: function (data) {
            if(data.length == 0)
                $('#list_produto').append(
                    '<a href="#" class="list-group-item" data-toggle="modal" data-target="#myModalNorm"><span class="glyphicon glyphicon-plus"></span> Cadastrar novo produdo</a>'
                );
            else
            {
                for($i = 0; $i < data.length; $i++)
                {
                    $('#list_produto').append('<a href="#'+data[$i].id+'" class="list-group-item produto"><span class="glyphicon glyphicon-plus"></span> '+
                    data[$i].codigo +' - '+
                    data[$i].nome +' - R$ '+
                    data[$i].preco +
                    "</a>");
                }
            }
        },
        data: {key:key, _token:token}
    });
});

$("body").on("click", "a.list-group-item.produto", function(event){
    event.preventDefault();
    var id = $(this).attr('href').split("#")[1];
    var text = $(this).text();
    $('#input_produto').val(text);
    $('#produto_id').val(id);
    $('#list_produto').empty();
    $('#quantidade').focus();
});

/*REVENDEDOR==================================================================================================================== */

$("#input_revendedor").keyup(function(event){

    $('#list_revendedor').empty();

    if($(this).val().length < 1) {
        $('#revendedor_id').val(0);
        return false;
    }

    $('#search_revendedor').submit();
});


$('#search_revendedor').submit(function(event){
    event.preventDefault();

    $('#list_revenderora').empty();

    var $form = $(this),
        key = $form.find("input[name='key']").val(),
        token = $form.find("input[name='_token']").val(),
        url = $form.attr("action");

    $.ajax({
        url:url,
        type:'post',
        dataType:'json',
        success: function (data) {
            for($i = 0; $i < data.length; $i++)
            {
                $('#list_revendedor').append('<a href="#'+data[$i].id+'" class="list-group-item revendedor"><span class="glyphicon glyphicon-plus"></span> '+data[$i].nome +'</a>');
            }
        },
        data: {key:key, _token:token}
    });
});

$("body").on("click", "a.revendedor", function(event){
    event.preventDefault();
    var id = $(this).attr('href').split("#")[1];
    var text = $(this).text();
    $('#input_revendedor').val(text);
    $('#revendedor_id').val(id);
    $('#list_revendedor').empty();
});


$('#removerModal').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

<!-- Form confirm (yes/ok) handler, submits form -->
$('#removerModal').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});


$('#create_produto').on('submit', function(event){

    event.preventDefault();

    var form = $(this),
        data = $("#create_produto :input").serializeArray(),
        url = $(this).attr("action");

    $.post(url,data);
    $(this)[0].reset();
    $("#myModalNorm").modal('toggle');
    $('#list_produto').empty();
    $('#search_produto').submit();
});