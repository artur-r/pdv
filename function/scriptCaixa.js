$("#nomeProduto").change(function(){
    //
    var produto = $("#nomeProduto").val()
    $.getJSON("../function/buscaProduto.php?produto="+produto,function(data){
        $.each(data, function(v, valor){
            $("#preco").val(valor.preco_custo);
        });
    });
});

console.log($("#produtoInput").val());
