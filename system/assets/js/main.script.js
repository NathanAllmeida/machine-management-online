var table = "";
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
            "url": 'Maquinas/ListarHistorico/',
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

});
