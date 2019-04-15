var table = "";
var time = 10000;
$(document).ready(function(){
    table = $('#tblMachines').DataTable({
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado.",
            "sInfo": "_TOTAL_ registros",
            "sInfoEmpty": "0 Registros",
            "sInfoFiltered": "(De _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado.",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        "ajax": {
            "url": 'maquinas/ListarHistorico/',
        },
        "columnDefs": [           
            {
                "targets": 3,
                "visible": true,
                "searchable": true
            },
        ],
        "columns": [{"data":"nome_maquina"},{"data": "codigo"}, {"data": "nome_status"}, {"data": "data_status"}]
                 /*"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    
                 }*/
    });
    $("#tempo-simulador").val(time/1000);
    $(document).on('click','#btn-alterar',function(){   
         $("#tempo-simulador").prop('disabled',false);
         $(this).parent().append('<button id="btn-cancelar" class="link link-red"><i class="ti ti-close"></i> Cancelar </button> ');
         $(this).parent().append('<button id="btn-salvar" class="link link"><i class="ti ti-check"></i> Salvar </button>');
         $(this).remove();
    });

    $(document).on('click','#btn-cancelar',function(){            
        $("#tempo-simulador").prop('disabled',true);
        $("#btn-salvar").remove();                 
        $(this).parent().append("<button class='link' id='btn-alterar'><i class='ti ti-reload'></i> Alterar Tempo</button>");
        $(this).remove();
    });

    function Temporizador(){           
        if (time != $("#tempo-simulador").val() * 1000) {
            time = $("#tempo-simulador").val() * 1000;
        }
        var counter = time / 1000;
        var interval_counter = setInterval(function Contador(){            
            if (counter == 0){
                $("#time-counter").text(counter+'s');  
                clearInterval(interval_counter)
            }else{
                $("#time-counter").text(counter+'s');  
                counter--;
            }                  
            return Contador;
        }(),1000)
        $.ajax({
            url: "maquinas/AdicionarHistorico",                    
            beforeSend : function() {

            },
            complete : function() {
                
            },
            success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.result == 'success') {  
                        table.ajax.reload();                        
                    } else{          
                        table.ajax.reload();
                        $.notify("Erro ao adicionar máquina!", "error");
                    }             
            }
        });
        table.ajax.reload();               
        return Temporizador;
    }
    var interval = setInterval(Temporizador(), time);
    $(document).on('click','#btn-salvar',function(){            
        $("#tempo-simulador").prop('disabled',true);
        $("#btn-cancelar").remove();                 
        $(this).parent().append("<button class='link' id='btn-alterar'><i class='ti ti-reload'></i> Alterar Tempo</button>");
        $(this).remove();

        time = $("#tempo-simulador").val() * 1000;
        clearInterval(interval);
        setTimeout(function(){
            var interval = setInterval(Temporizador(), time);
        },$("#time-counter").text().split('s')[0] * 1000);
        $.notify("Tempo alterado com sucesso!", "success");
    });

});
